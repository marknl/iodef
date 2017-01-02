<?php

namespace Marknl\Iodef;

use Sabre\Xml\Reader as SabreReader;

/**
 * IODEF Reading
 *
 * @copyright Copyright (C) 2015-2016 Marknl (www.e-rave.nl)
 * @author Mark Stunnenberg <mark@e-rave.nl>
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
class Reader extends SabreReader
{
    /**
     * Constructor
     * @param string $xml XML formatted string
     */
    public function __construct($xml)
    {
        $this->elementMap = [
            '{urn:ietf:params:xml:ns:iodef-1.0}AdditionalData'  => 'Marknl\Iodef\Elements\AdditionalData',
            '{urn:ietf:params:xml:ns:iodef-1.0}Address'         => 'Marknl\Iodef\Elements\Address',
            '{urn:ietf:params:xml:ns:iodef-1.0}AlternativeID'   => 'Marknl\Iodef\Elements\AlternativeID',
            '{urn:ietf:params:xml:ns:iodef-1.0}Application'     => 'Marknl\Iodef\Elements\Application',
            '{urn:ietf:params:xml:ns:iodef-1.0}Assessment'      => 'Marknl\Iodef\Elements\Assessment',
            '{urn:ietf:params:xml:ns:iodef-1.0}Confidence'      => 'Marknl\Iodef\Elements\Confidence',
            '{urn:ietf:params:xml:ns:iodef-1.0}Contact'         => 'Marknl\Iodef\Elements\Contact',
            '{urn:ietf:params:xml:ns:iodef-1.0}ContactName'     => 'Marknl\Iodef\Elements\ContactName',
            '{urn:ietf:params:xml:ns:iodef-1.0}Counter'         => 'Marknl\Iodef\Elements\Counter',
            '{urn:ietf:params:xml:ns:iodef-1.0}DateTime'        => 'Marknl\Iodef\Elements\DateTime',
            '{urn:ietf:params:xml:ns:iodef-1.0}Description'     => 'Marknl\Iodef\Elements\Description',
            '{urn:ietf:params:xml:ns:iodef-1.0}DetectTime'      => 'Marknl\Iodef\Elements\DetectTime',
            '{urn:ietf:params:xml:ns:iodef-1.0}Email'           => 'Marknl\Iodef\Elements\Email',
            '{urn:ietf:params:xml:ns:iodef-1.0}EndTime'         => 'Marknl\Iodef\Elements\EndTime',
            '{urn:ietf:params:xml:ns:iodef-1.0}EventData'       => 'Marknl\Iodef\Elements\EventData',
            '{urn:ietf:params:xml:ns:iodef-1.0}Expectation'     => 'Marknl\Iodef\Elements\Expectation',
            '{urn:ietf:params:xml:ns:iodef-1.0}Fax'             => 'Marknl\Iodef\Elements\Fax',
            '{urn:ietf:params:xml:ns:iodef-1.0}Flow'            => 'Marknl\Iodef\Elements\Flow',
            '{urn:ietf:params:xml:ns:iodef-1.0}History'         => 'Marknl\Iodef\Elements\History',
            '{urn:ietf:params:xml:ns:iodef-1.0}HistoryItem'     => 'Marknl\Iodef\Elements\HistoryItem',
            '{urn:ietf:params:xml:ns:iodef-1.0}Impact'          => 'Marknl\Iodef\Elements\Impact',
            '{urn:ietf:params:xml:ns:iodef-1.0}Incident'        => 'Marknl\Iodef\Elements\Incident',
            '{urn:ietf:params:xml:ns:iodef-1.0}IncidentID'      => 'Marknl\Iodef\Elements\IncidentID',
            '{urn:ietf:params:xml:ns:iodef-1.0}IODEF-Document'  => 'Marknl\Iodef\Elements\IODEFDocument',
            '{urn:ietf:params:xml:ns:iodef-1.0}Location'        => 'Marknl\Iodef\Elements\Location',
            '{urn:ietf:params:xml:ns:iodef-1.0}Method'          => 'Marknl\Iodef\Elements\Method',
            '{urn:ietf:params:xml:ns:iodef-1.0}MonetaryImpact'  => 'Marknl\Iodef\Elements\MonetaryImpact',
            '{urn:ietf:params:xml:ns:iodef-1.0}Node'            => 'Marknl\Iodef\Elements\Node',
            '{urn:ietf:params:xml:ns:iodef-1.0}NodeName'        => 'Marknl\Iodef\Elements\NodeName',
            '{urn:ietf:params:xml:ns:iodef-1.0}NodeRole'        => 'Marknl\Iodef\Elements\NodeRole',
            '{urn:ietf:params:xml:ns:iodef-1.0}OperatingSystem' => 'Marknl\Iodef\Elements\OperatingSystem',
            '{urn:ietf:params:xml:ns:iodef-1.0}Port'            => 'Marknl\Iodef\Elements\Port',
            '{urn:ietf:params:xml:ns:iodef-1.0}Portlist'        => 'Marknl\Iodef\Elements\Portlist',
            '{urn:ietf:params:xml:ns:iodef-1.0}PostalAddress'   => 'Marknl\Iodef\Elements\PostalAddress',
            '{urn:ietf:params:xml:ns:iodef-1.0}ProtoCode'       => 'Marknl\Iodef\Elements\ProtoCode',
            '{urn:ietf:params:xml:ns:iodef-1.0}ProtoFlags'      => 'Marknl\Iodef\Elements\ProtoFlags',
            '{urn:ietf:params:xml:ns:iodef-1.0}ProtoType'       => 'Marknl\Iodef\Elements\ProtoType',
            '{urn:ietf:params:xml:ns:iodef-1.0}Record'          => 'Marknl\Iodef\Elements\Record',
            '{urn:ietf:params:xml:ns:iodef-1.0}RecordData'      => 'Marknl\Iodef\Elements\RecordData',
            '{urn:ietf:params:xml:ns:iodef-1.0}RecordItem'      => 'Marknl\Iodef\Elements\RecordItem',
            '{urn:ietf:params:xml:ns:iodef-1.0}RecordPattern'   => 'Marknl\Iodef\Elements\RecordPattern',
            '{urn:ietf:params:xml:ns:iodef-1.0}Reference'       => 'Marknl\Iodef\Elements\Reference',
            '{urn:ietf:params:xml:ns:iodef-1.0}ReferenceName'   => 'Marknl\Iodef\Elements\ReferenceName',
            '{urn:ietf:params:xml:ns:iodef-1.0}RegistryHandle'  => 'Marknl\Iodef\Elements\RegistryHandle',
            '{urn:ietf:params:xml:ns:iodef-1.0}RelatedActivity' => 'Marknl\Iodef\Elements\RelatedActivity',
            '{urn:ietf:params:xml:ns:iodef-1.0}ReportTime'      => 'Marknl\Iodef\Elements\ReportTime',
            '{urn:ietf:params:xml:ns:iodef-1.0}Service'         => 'Marknl\Iodef\Elements\Service',
            '{urn:ietf:params:xml:ns:iodef-1.0}StartTime'       => 'Marknl\Iodef\Elements\StartTime',
            '{urn:ietf:params:xml:ns:iodef-1.0}System'          => 'Marknl\Iodef\Elements\System',
            '{urn:ietf:params:xml:ns:iodef-1.0}Telephone'       => 'Marknl\Iodef\Elements\Telephone',
            '{urn:ietf:params:xml:ns:iodef-1.0}TimeImpact'      => 'Marknl\Iodef\Elements\TimeImpact',
            '{urn:ietf:params:xml:ns:iodef-1.0}Timezone'        => 'Marknl\Iodef\Elements\Timezone',
            '{urn:ietf:params:xml:ns:iodef-1.0}URL'             => 'Marknl\Iodef\Elements\URL',
        ];

        $this->xml($xml);
    }
}
