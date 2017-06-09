<?php
/**
 * Created by PhpStorm.
 * User: dayni
 * Date: 5/18/2017
 * Time: 4:45 PM
 */

namespace carlosllorca\hl7messages\Encoders;


use dosamigos\qrcode\lib\Enum;

/**
 * Class Itc
 * @package carlosllorca\hl7messages\Encoders
 * Description: 0203: Identifier type
 * Using: $cx3_5
 */
class Itc extends Enum
{
    const _AM ='AM';
    const _AN ='AN';
    const _ANON ='ANON';
    const _ANC ='ANC';
    const _AND ='AND';
    const _ANT ='ANT';
    const _APRN ='APRN';
    const _BA ='BA';
    const _BC ='BC';
    const _BR ='BR';
    const _BRN ='BRN';
    const _CC ='CC';
    const _CY ='CY';
    const _DDS ='DDS';
    const _DEA ='DEA';
    const _DI ='DI';
    const _DFN ='DFN';
    const _DL ='DL';
    const _DN ='DN';
    const _DPM ='DPM';
    const _DO ='DO';
    const _DR ='DR';
    const _DS ='DS';
    const _EI ='EI';
    const _EN ='EN';
    const _FI ='FI';
    const _GI ='GI';
    const _GL ='GL';
    const _GN ='GN';
    const _HC ='HC';
    const _JHN ='JHN';
    const _IND ='IND';
    const _LI ='LI';
    const _LN ='LN';
    const _LR ='LR';
    /**Patient Medicaid Number*/
    const _MA ='MA';
    const _MB ='MB';
    /**Patient Medicare Number*/
    const _MC ='MC';
    const _MCD ='MCD';
    const _MCN ='MCN';
    const _MCR ='MCR';
    const _MD ='MD';
    const _MI ='MI';
    /**Medical Record Number */
    const _MR ='MR';
    const _MRT ='MRT';
    const _MS ='MS';
    const _NE ='NE';
    const _NH ='NH';
    const _NI ='NI';
    const _NII ='NII';
    const _NIIP ='NIIP';
    const _NNxxx ='NNxxx';
    const _NP ='NP';
    const _NPI ='NPI';
    const _OD ='OD';
    const _PA ='PA';
    const _PCN ='PCN';
    const _PE ='PE';
    const _PEN ='PEN';
    /**Patient Internal Identifier*/
    const _PI ='PI';
    const _PN ='PN';
    const _PNT ='PNT';
    const _PPN ='PPN';
    const _PRC ='PRC';
    const _PRN ='PRN';
    /**Patient external identifier*/
    const _PT ='PT';
    const _QA ='QA';
    const _RI ='RI';
    const _RPH ='RPH';
    const _RN ='RN';
    const _RR ='RR';
    const _RRI ='RRI';
    const _SL ='SL';
    const _SN ='SN';
    const _SR ='SR';
    const _SS ='SS';
    const _TAX ='TAX';
    const _TN ='TN';
    const _U ='U';
    const _UPIN ='UPIN';
    const _VN ='VN';
    const _VS ='VS';
    const _WC ='WC';
    const _WCN ='WCN';
    const _XX ='XX';


}