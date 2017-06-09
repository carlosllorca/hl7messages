<?php
/**
 * Created by PhpStorm.
 * User: dayni
 * Date: 5/16/2017
 * Time: 10:20 AM
 */
namespace carlosllorca\hl7messages\Segments ;
    use carlosllorca\hl7messages\Encoders\Msg;
    use carlosllorca\hl7messages\Encoders\Msg1;
    use carlosllorca\hl7messages\Encoders\Msg2;
    use carlosllorca\hl7messages\Encoders\Msg3;
    use carlosllorca\hl7messages\Interfaces\MsgInterface;
    use carlosllorca\hl7messages\Interfaces\MshInterface;
    use yii\base\Object;

    class Msh extends Object implements MshInterface
    {
        const mshNAME = 'MSH';

        const msh1 = '|';

        const msh2 = '^~\&';

        /**
         * 'Sending Application'
         */
        public $msh3;

        public $msh4;

        public $msh5;

        public $msh6;

        private $_msh7;

        public $msh8;

        private $_msh9;

        private $_msh10;

        /**
         * Using: Pt1, 0103: Processing ID
         */
        private $_msh11;

        /**
         *Using: VID: Version Identifier
         */
        private $_msh12;

        public $msh13;

        public $msh14;

        /**
         * Using: Msh0155
         */
        public $msh15;

        public $msh16;

        public $msh17;

        public $msh18;

        public $msh19;

        public $msh20;

        public $msh21;

        /**
         * Msh constructor.
         * @param $_msh7
         * @param MsgInterface $_msh9
         * @param $_msh10
         * @param $_msh11
         * @param $_msh12
         * @param array $config
         * @internal param $Vid1 'Version ID' $_msh12
         */
        public function __construct($_msh7, MsgInterface $_msh9,  $_msh10,  $_msh11,  $_msh12, $config = [])
        {
            $this->_msh7 = $_msh7;
            $this->_msh9 = $_msh9;
            $this->_msh10 = $_msh10;
            $this->_msh11 = $_msh11;
            $this->_msh12 = $_msh12;
            parent::__construct($config);

        }


        /**
         * @return string 'Sending Application'
         */
        public function getMsh3()
        {
            return is_null($this->msh3) ? "" : $this->msh3;
        }

        /**
         * @param 'Sending Application' $Msh3
         */
        public function setMsh3($msh3)
        {
            $this->msh3 = $msh3;
        }

        /**
         * @return string 'Sending Facility'
         */
        public function getMsh4()
        {
            return is_null($this->msh4) ? "" : $this->msh4;
        }

        /**
         * @param 'Sending Facility' $Msh4
         */
        public function setMsh4($msh4)
        {
            /**Sending Facility*/
            $this->msh4 = $msh4;
        }

        /**
         * @return string 'Receiving Application'
         */
        public function getMsh5()
        {
            return is_null($this->msh5) ? "" : $this->msh5;
        }

        /**
         * @param 'Receiving Application' $Msh5
         */
        public function setMsh5($msh5)
        {
            $this->msh5 = $msh5;
        }

        /**
         * @return string 'Receiving Facility'
         */
        public function getMsh6()
        {
            return is_null($this->msh6) ? "" : $this->msh6;
        }

        /**
         * @param 'Receiving Facility' $Msh6
         */
        public function setMsh6($msh6)
        {
            $this->msh6 = $msh6;
        }

        /**
         * @return string 'Security'
         */
        public function getMsh8()
        {
            return is_null($this->msh8) ? "" : $this->msh8;
        }

        /**
         * @param 'Security' $Msh8
         */
        public function setMsh8($msh8)
        {
            $this->msh8 = $msh8;
        }

        /**
         * @return string 'Sequence Number'
         */
        public function getMsh13()
        {
            return is_null($this->msh13) ? "" : $this->msh13;
        }

        /**
         * @param 'Sequence Number' $Msh13
         */
        public function setMsh13($msh13)
        {
            $this->msh13 = $msh13;
        }

        /**
         * @return string 'Continuation Pointer'
         */
        public function getMsh14()
        {
            return is_null($this->msh14) ? "" : $this->msh14;
        }

        /**
         * @param 'Continuation Pointer' $Msh14
         */
        public function setMsh14($msh14)
        {
            $this->msh14 = $msh14;
        }

        /**
         * @return string 'Accept Acknowledgment Type'
         */
        public function getMsh15()
        {
            return is_null($this->msh15) ? "" : $this->msh15;
        }

        /**
         * @param 'Accept Acknowledgment Type' $Msh15
         */
        public function setMsh15($msh15)
        {
            $this->msh15 = $msh15;
        }

        /**
         * @return string 'Application Acknowledgment Type'
         */
        public function getMsh16()
        {
            return is_null($this->msh16) ? "" : $this->msh16;
        }

        /**
         * @param 'Application Acknowledgment Type' $Msh16
         */
        public function setMsh16($msh16)
        {
            $this->msh16 = $msh16;
        }

        /**
         * @return string 'Country Code'
         */
        public function getMsh17()
        {
            return is_null($this->msh17) ? "" : $this->msh17;
        }

        /**
         * @param 'Country Code' $Msh17
         */
        public function setMsh17($msh17)
        {
            $this->msh17 = $msh17;
        }

        /**
         * @return string 'Character Set'
         */
        public function getMsh18()
        {
            return is_null($this->msh18) ? "" : $this->msh18;
        }

        /**
         * @param 'Character Set' $Msh18
         */
        public function setMsh18($msh18)
        {
            $this->msh18 = $msh18;
        }

        /**
         * @return string 'Principal Language Of Message'
         */
        public function getMsh19()
        {
            return is_null($this->msh19) ? "" : $this->msh19;
        }

        /**
         * @param 'Principal Language Of Message' $Msh19
         */
        public function setMsh19($msh19)
        {
            $this->msh19 = $msh19;
        }

        /**
         * @return string 'Alternate Character Set Handling Scheme'
         */
        public function getMsh20()
        {
            return is_null($this->msh20) ? "" : $this->msh20;
        }

        /**
         * @param 'Alternate Character Set Handling Scheme' $Msh20
         */
        public function setMsh20($msh20)
        {
            $this->msh20 = $msh20;
        }

        /**
         * @return string 'Message Profile Identifier'
         */
        public function getMsh21()
        {
            return is_null($this->msh21) ? "" : $this->msh21;
        }

        /**
         * @param 'Message Profile Identifier' $Msh21
         */
        public function setMsh21($msh21)
        {
            $this->msh21 = $msh21;
        }


        /** Get Message header segment - MSH **/
        function GetMshSegment()
        {
            $mshSegment = Msh::mshNAME . Msh::msh1 . Msh::msh2 . Msh::msh1 . $this->getMsh3()
                . Msh::msh1 . $this->getMsh4() . Msh::msh1 . $this->getMsh5() . Msh::msh1 . $this->getMsh6()
            . Msh::msh1 . $this->_msh7 . Msh::msh1 . $this->getMsh8() . Msh::msh1 . $this->_msh9->GetMessageType()
            . Msh::msh1 . $this->_msh10 . Msh::msh1 . $this->_msh11 . Msh::msh1 . $this->_msh12
            . Msh::msh1 . $this->getMsh13() . Msh::msh1 . $this->getMsh14() . Msh::msh1 . $this->getMsh15()
            . Msh::msh1 . $this->getMsh16() . Msh::msh1 . $this->getMsh17() . Msh::msh1 . $this->getMsh19()
            . Msh::msh1 . $this->getMsh20() . Msh::msh1 . $this->getMsh21();
            return $mshSegment;
        }

        /**
         * @param $msh
         * @return array
         */
        function Deserialize($msh)
        {
            $deserialize = explode("|", $msh);
            $this->setMsh3($deserialize[3]);
            $this->setMsh4($deserialize[4]);
            $this->setMsh5($deserialize[5]);
            $this->setMsh6($deserialize[6]);
            $this->_msh11 = $deserialize[11];
            $this->_msh12 = $deserialize[12];
            $this->_msh7 = $deserialize[7];
            $this->setMsh8($deserialize[8]);
            $deserializeMsh9 = explode("^", $deserialize[9]);
            $this->_msh9 = new Msg("^", new Msg1($deserializeMsh9[0]),new Msg2($deserializeMsh9[1]),new Msg3($deserializeMsh9[2]));
            $this->_msh10 = $deserialize[10];
            $this->setMsh13($deserialize[13]);
            $this->setMsh14($deserialize[14]);
            $this->setMsh15($deserialize[15]);
            $this->setMsh16($deserialize[16]);
            $this->setMsh17($deserialize[17]);
            $this->setMsh18($deserialize[18]);
            $this->setMsh19($deserialize[19]);
            $this->setMsh20($deserialize[20]);
            $this->setMsh21($deserialize[21]);
            return $deserialize;
        }
    }



