<?php
/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 8/02/17
 * Time: 13:29
 */
namespace carlosllorca\hl7messages\Segments;
use app\models\PatientRelationship;

/**
 * Class Nk1Segment
 * @package carlosllorca\hl7messages\Segments
 * @property int $id
 * @property string $name1
 * @property string $name2
 * @property string $relationship
 * @property string $address1
 * @property string $address2
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $postal_code
 * @property string $relationship_code
 * @property string $phone
 * @property string $email
 * @property string $publicityCode
 */

class Nk1Segment extends BaseSegment
{
        protected $segmentLength=22;
        public $id;
        public $name1;
        public $name2;
        public $relationship;
        public $address1;
        public $address2;
        public $city;
        public $state;
        public $country;
        public $postal_code;
        public $relationship_code;
        public $phone;
        public $email;
        public $publicityCode;
        public static $relation_types=
            [
                'Associate'=>'ASC',
                'Brother'=>'BRO',
                'Care giver'=>'CGV',
                'Child'=>'CHD',
                'Handicapped dependent'=>'DEP',
                'Life partner'=>'DOM',
                'Emergency contact'=>'EMC',
                'Extended family'=>'EXF',
                'Foster Child'=>'FCH',
                'Friend'=>'FND',
                'Father'=>'FTH',
                'Grandchild'=>'GCH',
                'Guardian'=>'GRD',
                'Grandparent'=>'GRP',
                'Mother'=>'MTH',
                'Natural child'=>'NCH',
                'None'=>'NON',
                'Other adult'=>'OAD',
                'Other'=>'OTH',
                'Stepchild'=>'SCH',
                'Self'=>'SEL',
                'Sibling'=>'SIB',
                'Sister'=>'SIS',
                'Spouse'=>'SPO',
                'Unknown'=>'UNK',
                'Ward of court'=>'WRD',
            ];



    public function rules()
    {
        return [
            [['name1','name2','relationship'], 'required'],
            ['email','email'],
            ['relationship','validateRelationship'],
            [['address1','address2','city','state','country','postal_code', 'phone','email','publicityCode','relationship_code'],'safe']
        ];

    }
    public function validateRelationship($attribute){
        $found=false;
        foreach (self::$relation_types as $clave=>$valor){
            if(strtoupper($clave)==strtoupper($this->relationship)){
                $this->relationship_code=$valor;
                $found=true;
                break;
            }

        }
        if(!$found)
            $this->addError($attribute, 'Invalid relation.');

    }
    public function generateString($count){
        if(!$this->validate())
            throw new ErrorException(json_encode($this->getErrors()));

        $arr=$this->initArray();

        $arr=$this->initArray(22);
        $arr[0]='NK1';
        $arr[1]=$count;
        $arr[2]=$this->name2."^".$this->name1;
        $arr[3]=$this->relationship_code.'^'.$this->relationship.'^HL70063';
        $arr[4]=$this->address1.'^'.$this->address2.'^'.$this->city.'^'.$this->state.'^'.$this->postal_code.'^'.$this->country.'^L';
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
        $arr[5]=$str;
        return implode($this->_hl7Globals['FIELD_SEPARATOR'], $arr)."\n";


    }
    public function loadFromAegishell($relation,$id){
      
        $this->id=$id;
        $this->name1=$relation->keeper->names;
        $this->name2=$relation->keeper->surnames;
        $this->relationship=$relation->relationship->description;
        $this->address1=$relation->keeper->postal_adress;
        $this->address2=$relation->keeper->postal_adress_plus;
        $this->city=$relation->keeper->zipcode->city->name;
        $this->state=$relation->keeper->zipcode->city->state->name;
        $this->country=$relation->keeper->zipcode->city->state->country->name;
        $this->postal_code=$relation->keeper->zipcode->postalCode;
        $this->phone=$relation->keeper->phone_number;
        $this->email=$relation->keeper->email;

    }
    public function loadFromField($arr){


        $field=$this->stringSplit($arr[2],'^');
        $this->name2=$field[0];
        $this->name1=$field[1];
        $field=$this->stringSplit($arr[3],'^');
        $this->relationship_code=$field[0];
        $this->relationship=$field[1];
        $field=$this->stringSplit($arr[4],'^');
        $this->address1=$field[0];
        $this->address2=$field[1];
        $this->city=$field[2];
        $this->state=$field[3];
        $this->postal_code=$field[4];
        $this->country=$field[5];
        if($arr[5]&&strpos($arr[5],"~")>=0){
            $partes=$this->stringSplit($arr[5],"~");
            for($z=0;$z<count($partes);$z++){
                $result=$this->stringSplit($partes[$z],"^");
                $result[1]=='PRN'?$this->phone="(".$result[5].") ".$result[6]:$this->email=$result[3];
            }
        }else if($arr[5]){
            $result=$this->stringSplit($arr[17],"^");
            $result[1]=='PRN'?$this->phone="(".$result[5].") ".$result[6]:$this->email=$result[3];
        }

    }

}