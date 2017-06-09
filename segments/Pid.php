<?php
/**
 * Created by PhpStorm.
 * User: dayni
 * Date: 5/18/2017
 * Time: 9:40 AM
 */

namespace carlosllorca\hl7messages\Segments;


use carlosllorca\hl7messages\Interfaces\PidInterface;
use yii\base\Object;

class Pid extends Object implements PidInterface
{
    private $fieldSeparator;

    const pidNAME = 'PID';

    /**
     * Set ID - PID
     */
    const pid1 = '1';

    /**Patient ID*/
    public $pid2;

    /**Patient Identifier List*/
    private $_pid3;

    /**Alternate Patient ID - PID*/
    public $pid4;

    /**
     * Patient Name
     * Using: Xpn
     */
    private $_pid5;

    private $pid6;

    /**
     * Patient Date/Time of Birth
     */
    private $pid7;

    /**
     * Administrative Sex
     */
    private $pid8;

    private $pid9;

    private $pid10;

    /**
     * Patient Address
     * Using: XAD: Extended Address
     */
    private $pid11;

    private $pid12;

    private $pid13;

    private $pid14;

    private $pid15;

    private $pid16;

    private $pid17;

    private $pid18;

    private $pid19;

    private $pid20;

    private $pid21;

    private $pid22;

    private $pid23;

    private $pid24;

    private $pid25;

    private $pid26;

    private $pid27;

    private $pid28;

    private $pid29;

    private $pid30;

    private $pid31;

    private $pid32;

    private $pid33;

    private $pid34;

    private $pid35;

    private $pid36;

    private $pid37;

    private $pid38;

    private $pid39;

    /**
     * Pid constructor.
     * @param $fieldSeparator
     * @param $_pid3
     * @param $_pid5
     * @param array $config
     */
    public function __construct($fieldSeparator, $_pid3, $_pid5, $config = [])
    {
        $this->fieldSeparator = $fieldSeparator;
        $this->_pid3 = $_pid3;
        $this->_pid5 = $_pid5;
        parent::__construct($config);
    }

    /**
     * @return string 'Get Patient Identification Segment (PID)'
     */
    public function GetPidSegment()
    {
        return Pid::pidNAME . $this->fieldSeparator . Pid::pid1 . $this->fieldSeparator . $this->getPid2() . $this->fieldSeparator. $this->_pid3
        . $this->fieldSeparator . $this->getPid4() . $this->fieldSeparator. $this->_pid5 . $this->fieldSeparator. $this->getPid6()
        . $this->fieldSeparator . $this->getPid7() . $this->fieldSeparator. $this->getPid8() . $this->fieldSeparator. $this->getPid9()
        . $this->fieldSeparator . $this->getPid10() . $this->fieldSeparator. $this->getPid11()  . $this->fieldSeparator. $this->getPid12() . $this->fieldSeparator. $this->getPid13()
        . $this->fieldSeparator . $this->getPid14() . $this->fieldSeparator. $this->getPid15() . $this->fieldSeparator. $this->getPid16()
        . $this->fieldSeparator . $this->getPid17() . $this->fieldSeparator. $this->getPid18() . $this->fieldSeparator. $this->getPid19()
        . $this->fieldSeparator . $this->getPid21() . $this->fieldSeparator. $this->getPid22() . $this->fieldSeparator. $this->getPid23()
        . $this->fieldSeparator . $this->getPid24() . $this->fieldSeparator. $this->getPid25() . $this->fieldSeparator. $this->getPid26()
        . $this->fieldSeparator . $this->getPid27() . $this->fieldSeparator. $this->getPid28() . $this->fieldSeparator. $this->getPid29()
        . $this->fieldSeparator . $this->getPid31() . $this->fieldSeparator. $this->getPid32() . $this->fieldSeparator. $this->getPid33()
        . $this->fieldSeparator . $this->getPid34() . $this->fieldSeparator. $this->getPid35() . $this->fieldSeparator. $this->getPid36()
        . $this->fieldSeparator . $this->getPid37() . $this->fieldSeparator. $this->getPid38() . $this->fieldSeparator. $this->getPid39();
    }

    /**
     * @param $pid
     * @return array
     */
    public function Deserialize($pid)
    {
        $deserialize = explode($this->fieldSeparator, $pid);
        $this->setPid2($deserialize[2]);
        $this->setPid4($deserialize[4]);
        $this->setPid6($deserialize[6]);
        $this->setPid7($deserialize[7]);
        $this->setPid8($deserialize[8]);
        $this->setPid9($deserialize[9]);
        $this->setPid10($deserialize[10]);
        $this->setPid11($deserialize[11]);
        $this->setPid12($deserialize[12]);
        $this->setPid13($deserialize[13]);
        $this->setPid14($deserialize[14]);
        $this->setPid15($deserialize[15]);
        $this->setPid16($deserialize[16]);
        $this->setPid17($deserialize[17]);
        $this->setPid18($deserialize[18]);
        $this->setPid19($deserialize[19]);
        $this->setPid20($deserialize[20]);
        $this->setPid21($deserialize[21]);
        $this->setPid22($deserialize[22]);
        $this->setPid23($deserialize[23]);
        $this->setPid24($deserialize[24]);
        $this->setPid25($deserialize[25]);
        $this->setPid26($deserialize[26]);
        $this->setPid27($deserialize[27]);
        $this->setPid28($deserialize[28]);
        $this->setPid29($deserialize[29]);
        $this->setPid30($deserialize[30]);
        $this->setPid31($deserialize[31]);
        $this->setPid32($deserialize[32]);
        $this->setPid33($deserialize[33]);
        $this->setPid34($deserialize[34]);
        $this->setPid35($deserialize[35]);
        $this->setPid36($deserialize[36]);
        $this->setPid37($deserialize[37]);
        $this->setPid38($deserialize[38]);
        $this->setPid39($deserialize[39]);
        return $deserialize;

    }


    /**
     * @return mixed
     */
    public function getPid2()
    {
        return is_null($this->pid2) ? "" : $this->pid2;
    }

    /**
     * @param mixed $pid2
     */
    public function setPid2($pid2)
    {
        $this->pid2 = $pid2;
    }

    /**
     * @return mixed
     */
    public function getPid4()
    {
        return is_null($this->pid4) ? "" : $this->pid4;
    }

    /**
     * @param mixed $pid4
     */
    public function setPid4($pid4)
    {
        $this->pid4 = $pid4;
    }

    /**
     * @return mixed
     */
    public function getPid6()
    {
        return is_null($this->pid6) ? "" : $this->pid6;
    }

    /**
     * @param mixed $pid6
     */
    public function setPid6($pid6)
    {
        $this->pid6 = $pid6;
    }

    /**
     * @return mixed
     */
    public function getPid7()
    {
        return is_null($this->pid7) ? "" : $this->pid7;
    }

    /**
     * @param mixed $pid7
     */
    public function setPid7($pid7)
    {
        $this->pid7 = $pid7;
    }

    /**
     * @return mixed
     */
    public function getPid8()
    {
        return is_null($this->pid8) ? "" : $this->pid8;
    }

    /**
     * @param mixed $pid8
     */
    public function setPid8($pid8)
    {
        $this->pid8 = $pid8;
    }

    /**
     * @return mixed
     */
    public function getPid9()
    {
        return is_null($this->pid9) ? "" : $this->pid9;
    }

    /**
     * @param mixed $pid9
     */
    public function setPid9($pid9)
    {
        $this->pid9 = $pid9;
    }

    /**
     * @return mixed
     */
    public function getPid10()
    {
        return is_null($this->pid10) ? "" : $this->pid10;
    }

    /**
     * @param mixed $pid10
     */
    public function setPid10($pid10)
    {
        $this->pid10 = $pid10;
    }

    /**
     * @return mixed
     */
    public function getPid11()
    {
        return is_null($this->pid11) ? "" : $this->pid11;
    }

    /**
     * @param mixed $pid11
     */
    public function setPid11($pid11)
    {
        $this->pid11 = $pid11;
    }

    /**
     * @return mixed
     */
    public function getPid12()
    {
        return is_null($this->pid12) ? "" : $this->pid12;
    }

    /**
     * @param mixed $pid12
     */
    public function setPid12($pid12)
    {
        $this->pid12 = $pid12;
    }

    /**
     * @return mixed
     */
    public function getPid13()
    {
        return is_null($this->pid13) ? "" : $this->pid13;
    }

    /**
     * @param mixed $pid13
     */
    public function setPid13($pid13)
    {
        $this->pid13 = $pid13;
    }

    /**
     * @return mixed
     */
    public function getPid14()
    {
        return is_null($this->pid14) ? "" : $this->pid14;
    }

    /**
     * @param mixed $pid14
     */
    public function setPid14($pid14)
    {
        $this->pid14 = $pid14;
    }

    /**
     * @return mixed
     */
    public function getPid15()
    {
        return is_null($this->pid15) ? "" : $this->pid15;
    }

    /**
     * @param mixed $pid15
     */
    public function setPid15($pid15)
    {
        $this->pid15 = $pid15;
    }

    /**
     * @return mixed
     */
    public function getPid16()
    {
        return is_null($this->pid16) ? "" : $this->pid16;
    }

    /**
     * @param mixed $pid16
     */
    public function setPid16($pid16)
    {
        $this->pid16 = $pid16;
    }

    /**
     * @return mixed
     */
    public function getPid17()
    {
        return is_null($this->pid17) ? "" : $this->pid17;
    }

    /**
     * @param mixed $pid17
     */
    public function setPid17($pid17)
    {
        $this->pid17 = $pid17;
    }

    /**
     * @return mixed
     */
    public function getPid18()
    {
        return is_null($this->pid18) ? "" : $this->pid18;
    }

    /**
     * @param mixed $pid18
     */
    public function setPid18($pid18)
    {
        $this->pid18 = $pid18;
    }

    /**
     * @return mixed
     */
    public function getPid19()
    {
        return is_null($this->pid19) ? "" : $this->pid19;
    }

    /**
     * @param mixed $pid19
     */
    public function setPid19($pid19)
    {
        $this->pid19 = $pid19;
    }

    /**
     * @return mixed
     */
    public function getPid20()
    {
        return is_null($this->pid20) ? "" : $this->pid20;
    }

    /**
     * @param mixed $pid20
     */
    public function setPid20($pid20)
    {
        $this->pid20 = $pid20;
    }

    /**
     * @return mixed
     */
    public function getPid21()
    {
        return is_null($this->pid21) ? "" : $this->pid21;
    }

    /**
     * @param mixed $pid21
     */
    public function setPid21($pid21)
    {
        $this->pid21 = $pid21;
    }

    /**
     * @return mixed
     */
    public function getPid22()
    {
        return is_null($this->pid22) ? "" : $this->pid22;
    }

    /**
     * @param mixed $pid22
     */
    public function setPid22($pid22)
    {
        $this->pid22 = $pid22;
    }

    /**
     * @return mixed
     */
    public function getPid23()
    {
        return is_null($this->pid23) ? "" : $this->pid23;
    }

    /**
     * @param mixed $pid23
     */
    public function setPid23($pid23)
    {
        $this->pid23 = $pid23;
    }

    /**
     * @return mixed
     */
    public function getPid24()
    {
        return is_null($this->pid24) ? "" : $this->pid24;
    }

    /**
     * @param mixed $pid24
     */
    public function setPid24($pid24)
    {
        $this->pid24 = $pid24;
    }

    /**
     * @return mixed
     */
    public function getPid25()
    {
        return is_null($this->pid25) ? "" : $this->pid25;
    }

    /**
     * @param mixed $pid25
     */
    public function setPid25($pid25)
    {
        $this->pid25 = $pid25;
    }

    /**
     * @return mixed
     */
    public function getPid26()
    {
        return is_null($this->pid26) ? "" : $this->pid26;
    }

    /**
     * @param mixed $pid26
     */
    public function setPid26($pid26)
    {
        $this->pid26 = $pid26;
    }

    /**
     * @return mixed
     */
    public function getPid27()
    {
        return is_null($this->pid27) ? "" : $this->pid27;
    }

    /**
     * @param mixed $pid27
     */
    public function setPid27($pid27)
    {
        $this->pid27 = $pid27;
    }

    /**
     * @return mixed
     */
    public function getPid28()
    {
        return is_null($this->pid28) ? "" : $this->pid28;
    }

    /**
     * @param mixed $pid28
     */
    public function setPid28($pid28)
    {
        $this->pid28 = $pid28;
    }

    /**
     * @return mixed
     */
    public function getPid29()
    {
        return is_null($this->pid29) ? "" : $this->pid29;
    }

    /**
     * @param mixed $pid29
     */
    public function setPid29($pid29)
    {
        $this->pid29 = $pid29;
    }

    /**
     * @return mixed
     */
    public function getPid30()
    {
        return is_null($this->pid30) ? "" : $this->pid30;
    }

    /**
     * @param mixed $pid30
     */
    public function setPid30($pid30)
    {
        $this->pid30 = $pid30;
    }

    /**
     * @return mixed
     */
    public function getPid31()
    {
        return is_null($this->pid31) ? "" : $this->pid31;
    }

    /**
     * @param mixed $pid31
     */
    public function setPid31($pid31)
    {
        $this->pid31 = $pid31;
    }

    /**
     * @return mixed
     */
    public function getPid32()
    {
        return is_null($this->pid32) ? "" : $this->pid32;
    }

    /**
     * @param mixed $pid32
     */
    public function setPid32($pid32)
    {
        $this->pid32 = $pid32;
    }

    /**
     * @return mixed
     */
    public function getPid33()
    {
        return is_null($this->pid33) ? "" : $this->pid33;
    }

    /**
     * @param mixed $pid33
     */
    public function setPid33($pid33)
    {
        $this->pid33 = $pid33;
    }

    /**
     * @return mixed
     */
    public function getPid34()
    {
        return is_null($this->pid34) ? "" : $this->pid34;
    }

    /**
     * @param mixed $pid34
     */
    public function setPid34($pid34)
    {
        $this->pid34 = $pid34;
    }

    /**
     * @return mixed
     */
    public function getPid35()
    {
        return is_null($this->pid35) ? "" : $this->pid35;
    }

    /**
     * @param mixed $pid35
     */
    public function setPid35($pid35)
    {
        $this->pid35 = $pid35;
    }

    /**
     * @return mixed
     */
    public function getPid36()
    {
        return is_null($this->pid36) ? "" : $this->pid36;
    }

    /**
     * @param mixed $pid36
     */
    public function setPid36($pid36)
    {
        $this->pid36 = $pid36;
    }

    /**
     * @return mixed
     */
    public function getPid37()
    {
        return is_null($this->pid37) ? "" : $this->pid37;
    }

    /**
     * @param mixed $pid37
     */
    public function setPid37($pid37)
    {
        $this->pid37 = $pid37;
    }

    /**
     * @return mixed
     */
    public function getPid38()
    {
        return is_null($this->pid38) ? "" : $this->pid38;
    }

    /**
     * @param mixed $pid38
     */
    public function setPid38($pid38)
    {
        $this->pid38 = $pid38;
    }

    /**
     * @return mixed
     */
    public function getPid39()
    {
        return is_null($this->pid39) ? "" : $this->pid39;
    }

    /**
     * @param mixed $pid39
     */
    public function setPid39($pid39)
    {
        $this->pid39 = $pid39;
    }

}