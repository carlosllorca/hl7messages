<?php
/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 8/02/17
 * Time: 13:29
 */
namespace carlosllorca\hl7messages\Segments;

use app\models\Order;
use app\models\PreviousVaccines;
use app\models\VaccineStationPatient;
use yii\base\ErrorException;
use yii\base\Exception;

class OrcSegment extends BaseSegment
{
        protected $segmentLength=12;
        public $orderControl='RE';
        public $placerOrderNumber;
        public $fillerOrderNumber;//codigo de la vacun
        public $enteredByName1;//Quien  puso la vacuna
        public $enteredByName2;//Quien  puso la vacuna
        public $enteredByNPI;

        public $orderingProvider;
        public $orderingProviderOID;
        public $orderingProviderAddress;
        public $orderingFacilityName;
        public $orderingFacilityAddress;
        public $orderingFacilityOID;
        public $orderingFacilityCity;
        public $orderingFacilityState;
        public $orderingFacilityCountry;
        public $orderingFacilityZipCode;







    public function rules()
    {
        return [
            [['orderControl'], 'required'],

            [['placerOrderNumber', 'fillerOrderNumber','enteredByName1','enteredByName2','enteredByNPI',
                'orderingProviderAddress','orderingProvider','orderingProviderOID','orderingFacilityName','orderingFacilityAddress','orderingFacilityOID',
                'orderingFacilityCity','orderingFacilityState','orderingFacilityCountry','orderingFacilityZipCode'
            ],'safe']

        ];
    }
    //ORC|NW|1234^ EHR^1.111.33.3...4^ISO |||||||||1500000000^JONES^JOHN^J^JR^^MD^^NPI&|||||||||SAMPLE HOSPITAL^^^^^^^^^1.1123.333.555.1^ISO|5830NW BARRY RD^201^KANSAS CITY^MO^64154|^^^^^816^4692101|1515 W TRUMAN ROAD^306^INDEPENDENCE^MO^64050<cr>
    public function generateString(){
        if (!$this->validate())
            throw new Exception(json_encode($this->getErrors()));

        $arr=$this->initArray();
        $arr[0]='ORC';
        $arr[1]=$this->orderControl;
        $arr[2]=$this->placerOrderNumber."^^".$this->orderingProviderOID."^ISO";
        $arr[12]=$this->enteredByNPI.'^'.$this->enteredByName2."^".$this->enteredByName1.'^^^^^^^NPI';
        $arr[21]=$this->orderingProvider."^^^^^^^^^".$this->orderingProviderOID."^ISO";
        $arr[22]=$this->orderingFacilityAddress.'^^'.$this->orderingFacilityCity."^".$this->orderingFacilityZipCode."^".$this->orderingFacilityCountry;
        return implode($this->_hl7Globals['FIELD_SEPARATOR'], $arr)."\n";       

    }
    public function loadFromField($arr){


        $this->orderControl=$arr[1];
        $field=$this->stringSplit($arr[2],'^');
        $this->placerOrderNumber=$field[0];
        $this->orderingProviderOID=$field[2];
        $field=$this->stringSplit($arr[12],'^');
        $this->enteredByNPI=$field[0];
        $this->enteredByName2=$field[1];
        $this->enteredByName1=$field[2];
        $field=$this->stringSplit($arr[21],'^');
        $this->orderingProvider=$field[0];
        $this->orderingProviderOID=$field[9];
        $field=$this->stringSplit($arr[22],'^');
        $this->orderingFacilityAddress=$field[0];
        $this->orderingFacilityCity=$field[2];
        $this->orderingFacilityZipCode=$field[3];
        $this->orderingFacilityCountry=$field[4];

    }
    public function generateFormSpecimenSecureOrder($order){
        $this->placerOrderNumber=$order->order_number;
        $this->orderingProviderOID=$order->facility->account_id;
        $order->facility->account->decrypt_sensitive_data();
        $this->orderingProvider=$order->facility->account->account_name;
        $order->facProvPat->facilityUser->userAccount->decrypt_sensitive_data();
        $this->enteredByNPI=$order->facProvPat->facilityUser->userAccount->provider_npi;
        $this->enteredByName1=$order->facProvPat->facilityUser->userAccount->first_name;
        $this->enteredByName2=$order->facProvPat->facilityUser->userAccount->last_name;
        $order->facility->decrypt_sensitive_data();
        $this->orderingFacilityAddress=$order->facility->street_address;
        $this->orderingFacilityCity=$order->facility->getCityName();
        $this->orderingFacilityState=$order->facility->getStateName();
        $this->orderingFacilityCountry=$order->facility->getCountryName();
        $this->orderingFacilityZipCode=$order->facility->zipcode->postalCode;

    }
    public function loadFromAegishell($order){
        if($order instanceof PreviousVaccines){

            $this->placerOrderNumber=$order->id;
           
        }elseif ($order instanceof VaccineStationPatient){
            $this->placerOrderNumber=$order->id;
            $this->enteredByNPI=$order->nurses->licence_number;
            $this->enteredByName2=$order->nurses->surnames;
            $this->enteredByName1=$order->nurses->names;
            $this->orderingFacilityName='Aegishell event Vidapalooza';
            
        }else{
            throw new ErrorException('Type not reconized for this method.');
        }
        

    }
}