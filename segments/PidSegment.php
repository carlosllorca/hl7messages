<?php


namespace carlosllorca\hl7messages\Segments;
use app\models\Patient;
use yii\base\ErrorException;
use yii\base\Exception;

/**
 * This is the model class for PID segments. If you need add new segment add  a public attribute and use it in
 * Hl7v2 class. Methods
 *
 * @property string $patientId
 *
 * @property Patient $subject
 **/

class PidSegment extends BaseSegment
{
        protected $segmentLength=30;
        public $patientId;
        public $patientName1;
        public $patientName2;
        public $date_birth;
        public $sex;
        public $race;
        public $address;
        public $address1;
        public $city;
        public $state;
        public $zipCode;
        public $phone;
        public $email;
        public $ss_number;
        public $country;
        public $ethnicGroup;
        public $origin;

    public function rules()
    {
        return [
            [['patientId', 'patientName1','patientName2','date_birth','sex'], 'required'],
            ['email','email'],
            [['patientId', 'patientName1','patientName2','date_birth',
                'sex','race','address','address1','city','state','country','zipCode','phone',
            'email','ethnicGroup','ss_number','origin'],'safe']

        ];
    }
    

    public function generateBySpecimenSecurePatient($subject){

        $subject->decrypt_sensitive_data();

        $this->patientId=1;
        $this->patientName1=$subject->firts_name;
        $this->patientName2=$subject->last_name1;
        $this->date_birth=Date('Ymd',strtotime($subject->date_birth));
        $this->sex=$subject->gender->description;
        $this->race=$subject->race->description;
        $this->address=$subject->postal_adress;
        $this->address1=$subject->postal_adress_plus;
        $this->city=$subject->zipcode->city->name;
        $this->state=$subject->zipcode->city->state->name;
        $this->country=$subject->zipcode->city->state->country->name;
        $this->zipCode=$subject->zip_code;
        $this->phone=$subject->zip_code;
        $this->email=$subject->email;
        $this->ss_number=$subject->social_security_number;
        $this->ethnicGroup=$subject->ethnicOrigin->description;
        $this->origin=$subject->origin0->name;        
            
    }
    //PID|1||987654321A^^^XYZSPHL&2.16.840.1.114222.4.1.10412&ISO^PI^XYZSPHLLab1&2.16.840.1.114222.4.1.10412.1&ISO~45AQ12345^^^Napa General
//Hosp&2.16.840.1.113883.19.3.2.1&ISO^MR^Napa General
//HospLab&2.16.840.1.222.4.1.10412.013&ISO||Everyman^Adam^A^^^^L^^^^^^^BS|Mum^Martha^M^^^^M|19640619|M||2106-
//3^White^CDCREC^W^White^L^2.5.1^|2222 Home Street^^Napa^CA^94558^USA^C^^06055||^PRN^PH^^1^707^2272608|||||||||2186-5^Not Hispanic or
//Latino^CDCREC^N^Not Hispanic^L^2.5.1^2010||||||||N|||201102081000-0700|LastUpdater^2.16.840.1.113883.19.3.1^ISO<cr>
    public function generateString(){
        
        if(!$this->validate()){
            throw new ErrorException(json_encode($this->getErrors()));
        }
        $arr=$this->initArray();
        $arr[0]='PID';
        $arr[3]=$this->patientId;
        $arr[5]=$this->patientName2."^".$this->patientName1;
        $arr[7]=$this->date_birth;
        $arr[8]=$this->sex;
        $arr[10]=$this->race;
        $arr[11]=$this->address.'^'.$this->address1.'^'.$this->city.'^'.$this->state.'^'.$this->zipCode.'^'.$this->country.'^L';
        $str='';
        if($this->phone&& $this->phone!='')
        {
            $code=substr($this->phone,1,3);
            $number=str_replace("-","",substr($this->phone,5,-1));
            $str='^PRN^^^^'.$code.'^'.$number;
        }
        if($this->email&& $this->email!=''){
            $str==""?$str='^NET^^'.$this->email.'^^^':$str.='~^NET^^'.$this->email.'^^^';
        }
        $arr[13]=$str;
        $arr[19]=str_replace([' ','(',')','-'],'',$this->ss_number);
        $arr[22]=$this->ethnicGroup;
        $arr[23]=$this->origin;

        return  implode($this->_hl7Globals['FIELD_SEPARATOR'], $arr)."\n";
        

    }
    public function loadPidSegment($arr){
        $this->patientId=$arr[3];
        $result=$this->stringSplit($arr[5],"^");
        $this->patientName2=$result[0];
        $this->patientName1=$result[1];
        $this->date_birth=date('Y-m-d',strtotime($arr[7]));
        $this->sex=$arr[8];
        $this->race=$arr[10];
        $result=$this->stringSplit($arr[11],"^");
        $this->address=$result[0];
        $this->address1=$result[1];
        $this->city=$result[2];
        $this->state=$result[3];
        $this->zipCode=$result[4];
        $this->country=$result[5];
        if($arr[13]&&strpos($arr[13],"~")>=0){
            $partes=$this->stringSplit($arr[13],"~");
            for($z=0;$z<count($partes);$z++){
                $result=$this->stringSplit($partes[$z],"^");
                $result[1]=='PRN'?$this->phone="(".$result[5].") ".$result[6]:$this->email=$result[3];
            }
        }else if($arr[13]){
            $result=$this->stringSplit($arr[13],"^");
            $result[1]=='PRN'?$this->phone="(".$result[5].") ".$result[6]:$this->email=$result[3];
        }
        $this->ss_number=$arr[19];
        $this->ethnicGroup=$arr[22];
        $this->origin=$arr[23];
        
    }
}