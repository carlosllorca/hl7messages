<?php
/**
 * Created by PhpStorm.
 * User: dayni
 * Date: 5/16/2017
 * Time: 1:31 PM
 */

namespace carlosllorca\hl7messages\Encoders;

use dosamigos\qrcode\lib\Enum;

/**
 * Class Msg1
 * @package carlosllorca\hl7messages\Encoders
 * Description: 0076 Message type
 */
class Msg1 extends Enum
{
    const __default = self::OML;

    const ACK = 'ACK';
    const ADR = 'ADR';
    const ADT = 'ADT';
    const BAR = 'BAR';
    const CRM = 'CRM';
    const BPS = 'BPS';
    const BRP = 'BRP';
    const BRT = 'BRT';
    const BTS = 'BTS';
    const CSU = 'CSU';
    const DFT = 'DFT';
    const DOC = 'DOC';
    const DSR = 'DSR';
    const EAC = 'EAC';
    const EAN = 'EAN';
    const EAR = 'EAR';
    const EDR = 'EDR';
    const EQQ = 'EQQ';
    const ERP = 'ERP';
    const ESR = 'ESR';
    const ESU = 'ESU';
    const INR = 'INR';
    const INU = 'INU';
    const LSR = 'LSR';
    const LSU = 'LSU';
    const MCF = 'MCF';
    const MDM = 'MDM';
    const MFD = 'MFD';
    const MFK = 'MFK';
    const MFN = 'MFN';
    const MFQ = 'MFQ';
    const MFR = 'MFR';
    const NMD = 'NMD';
    const NMQ = 'NMQ';
    const NMR = 'NMR';
    const OMB = 'OMB';
    const OMD = 'OMD';
    const OMG = 'OMG';
    const OMI = 'OMI';
    /** Laboratory order message */
    const OML = 'OML';
    const OMN = 'OMN';
    const OMP = 'OMP';
    const OMS = 'OMS';
    const ORB = 'ORB';
    const ORD = 'ORD';
    const ORF = 'ORF';
    const ORG = 'ORG';
    const ORI = 'ORI';
    /** Laboratory acknowledgment message (unsolicited)*/
    const ORL = 'ORL';
    const ORM = 'ORM';
    const ORN = 'ORN';
    const ORP = 'ORP';
    const ORR = 'ORR';
    const ORS = 'ORS';
    /**Unsolicited transmission of an observation message*/
    const ORU = 'ORU';
    const OSQ = 'OSQ';
    const OSR = 'OSR';
    const OUL = 'OUL';
    const PEX = 'PEX';
    const PGL = 'PGL';
    const PIN = 'PIN';
    const PMU = 'PMU';
    const PPG = 'PPG';
    const PPP = 'PPP';
    const PPR = 'PPR';
    const PPT = 'PPT';
    const PPV = 'PPV';
    const PRR = 'PRR';
    const PTR = 'PTR';
    const QBP = 'QBP';
    const QCK = 'QCK';
    const QCN = 'QCN';
    const QRY = 'QRY';
    const QSB = 'QSB';
    const QSX = 'QSX';
    const QVR = 'QVR';
    const RAR = 'RAR';
    const RAS = 'RAS';
    const RCI = 'RCI';
    const RCL = 'RCL';
    const RDE = 'RDE';
    const RDR = 'RDR';
    const RDS = 'RDS';
    const RDY = 'RDY';
    const REF = 'REF';
    const RER = 'RER';
    const RGR = 'RGR';
    const RGV = 'RGV';
    const ROR = 'ROR';
    const RPA = 'RPA';
    const RPI = 'RPI';
    const RPL = 'RPL';
    const RPR = 'RPR';
    const RQA = 'RQA';
    const RQC = 'RQC';
    const RQI = 'RQI';
    const RQP = 'RQP';
    const RQQ = 'RQQ';
    const RRA = 'RRA';
    const RRD = 'RRD';
    const RRE = 'RRE';
    const RRG = 'RRG';
    const RRI = 'RRI';
    const RSP = 'RSP';
    const RTB = 'RTB';
    const SIU = 'SIU';
    const SPQ = 'SPQ';
    const SQM = 'SQM';
    const SQR = 'SQR';
    const SRM = 'SRM';
    const SRR = 'SRR';
    const SSR = 'SSR';
    const SSU = 'SSU';
    const SUR = 'SUR';
    const TBR = 'TBR';
    const TCR = 'TCR';
    const TCU = 'TCU';
    const UDM = 'UDM';
    const VQQ = 'VQQ';
    const VXQ = 'VXQ';
    const VXR = 'VXR';
    const VXU = 'VXU';
    const VXX = 'VXX';

}