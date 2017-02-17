<?php

namespace carlosllorca\hl7messages\Segments;

use app\models\Order;
use yii\base\ErrorException;
use yii\base\Exception;

class ObrSegment extends BaseSegment
{

    public $id;
    public $facility_OID;
    public $facility_npi;
    public $facility_phone;
    public $facility_email;
    public $physician_name1;
    public $physician_name2;
    public $physician_npi;
    protected $segmentLength=32;
    public $orderNumber;
    public $universal_type_id="ISO";
    public $prefix_order;
    public $alternative_code;
    public $order_datetime;
    public $order_description;
    public function rules()
    {
        return [
            [['id','orderNumber','facility_OID','universal_type_id','prefix_order'], 'required'],
            [['placerOrderNumber','facility_phone','facility_email','physician_name1','physician_name2','physician_npi','order_datetime','order_description', 'fillerOrderNumber','enteredBy','orderingProvider','facility_npi'],'safe']

        ];


    }
    public function generateString()
    {
        if(!$this->validate())
            throw new ErrorException(json_encode($this->getErrors()));

        $arr=$this->initArray();
        $arr[0]='OBR';
        $arr[1]=$this->id;
        $arr[2]=$this->orderNumber."^".$this->facility_npi."^".$this->facility_OID."^".$this->universal_type_id;
        $arr[4]=$this->prefix_order."^".$this->order_description.'^^^L' ;
        $arr[7]=$this->order_datetime;
        $arr[16]=$this->physician_npi."^".$this->physician_name2.'^'.$this->physician_name1;
        $str='';
        if($this->facility_phone&& $this->facility_phone!='')
        {
            $code=substr($this->facility_phone,1,3);
            $number=str_replace("-","",substr($this->facility_phone,5,-1));
            $str='^PRN^^^^'.$code.'^'.$number;
        }
        if($this->facility_email&& $this->facility_email!=''){
            $str==""?$str='^NET^^'.$this->facility_email.'^^^':$str.='~^NET^^'.$this->facility_email.'^^^';
        }
        $arr[17]=$str;
        return implode($this->_hl7Globals['FIELD_SEPARATOR'], $arr)."\n";

    }
    public function loadFormField($arr)
    {

        $this->id=$arr[1];
        $field=$this->stringSplit($arr[2],'^');
        $this->orderNumber=$field[0];
        $this->facility_npi=$field[1];
        $this->facility_OID=$field[2];
        $this->universal_type_id=$field[3];
        $field=$this->stringSplit($arr[4],'^');
        $this->prefix_order=$field[0];
        $this->order_description=$field[1];
        $this->order_datetime=$arr[7];
        $field=$this->stringSplit($arr[16],'^');
        $this->physician_npi=$arr[0];
        $this->physician_name2=$arr[1];
        $this->physician_name1=$arr[2];

        if($arr[17]&&strpos($arr[17],"~")>=0){
            $partes=$this->stringSplit($arr[17],"~");
            for($z=0;$z<count($partes);$z++){
                $result=$this->stringSplit($partes[$z],"^");
                $result[1]=='PRN'?$this->facility_phone="(".$result[5].") ".$result[6]:$this->facility_email=$result[3];
            }
        }else if($arr[17]){
            $result=$this->stringSplit($arr[17],"^");
            $result[1]=='PRN'?$this->facility_phone="(".$result[5].") ".$result[6]:$this->facility_email=$result[3];
        }

    }
    public function generateFromSpecimenSecureOrder($order,$total){
        //$order=new Order();
        $this->id=$total;
        $this->facility_OID=$order->facility->id;
        $order->facility->decrypt_sensitive_data();
        $this->facility_npi=$order->facility->npi;
        $this->facility_phone=$order->facility->phone_number;
        $this->facility_email=$order->facility->email_address;

        $this->physician_name1=$order->facProvPat->facilityUser->userAccount->first_name;
        $this->physician_name2=$order->facProvPat->facilityUser->userAccount->last_name;
        $this->physician_npi=$order->facProvPat->facilityUser->userAccount->provider_npi;
        $this->orderNumber=$order->order_number;
        $this->prefix_order='SS';
        $this->order_datetime=$order->reported_date_time;
    }
}