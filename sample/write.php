<?php
$IODEFDocument = new Marknl\Iodef\Elements\IODEFDocument();

    $Incident = new Marknl\Iodef\Elements\Incident();
    $Incident->setAttributes(['purpose' => 'mitigation']);

        $IncidentID = new Marknl\Iodef\Elements\IncidentID();
        $IncidentID->setAttributes(['name' => 'AbuseIO']);
        $IncidentID->value('abuseio-123456');
        $Incident->addChild($IncidentID);

        $AlternativeID = new Marknl\Iodef\Elements\AlternativeID();

            $IncidentID = new Marknl\Iodef\Elements\IncidentID();
            $IncidentID->setAttributes(['name' => 'Shadowserver']);
            $IncidentID->value('shadowcode-834394');
            $AlternativeID->addChild($IncidentID);

            $IncidentID = new Marknl\Iodef\Elements\IncidentID();
            $IncidentID->setAttributes(['name' => 'Blocklist.de', 'restriction' => 'private']);
            $IncidentID->value('blde#30dkd0');
            $AlternativeID->addChild($IncidentID);

        $Incident->addChild($AlternativeID);

        $RelatedActivity = new Marknl\Iodef\Elements\RelatedActivity();

            $IncidentID = new Marknl\Iodef\Elements\IncidentID();
            $IncidentID->setAttributes(['name' => 'Example Incident 1']);
            $IncidentID->value('example-000001');
            $RelatedActivity->addChild($IncidentID);

            $URL = new Marknl\Iodef\Elements\URL();
            $URL->value('http://abuse.io');
            $RelatedActivity->addChild($URL);

        $Incident->addChild($RelatedActivity);

        $DetectTime = new Marknl\Iodef\Elements\DetectTime();
        $DetectTime->value('2015-01-01T01:12:34+01:00');
        $Incident->addChild($DetectTime);

        $ReportTime = new Marknl\Iodef\Elements\ReportTime();
        $ReportTime->value('2015-01-01T02:12:34+01:00');
        $Incident->addChild($ReportTime);

        $Description = new Marknl\Iodef\Elements\Description();
        $Description->value('Sample description for this report.');
        $Incident->addChild($Description);

        $Assessment = new Marknl\Iodef\Elements\Assessment();

            $Impact = new Marknl\Iodef\Elements\Impact();
            $Impact->setAttributes(['severity' => 'high']);
            $Impact->value('Impact value');
            $Assessment->addChild($Impact);

            $TimeImpact = new Marknl\Iodef\Elements\TimeImpact();
            $TimeImpact->setAttributes(['metric' => 'downtime']);
            $TimeImpact->value('2');
            $Assessment->addChild($TimeImpact);

            $MonetaryImpact = new Marknl\Iodef\Elements\MonetaryImpact();
            $MonetaryImpact->setAttributes(['currency' => 'EUR']);
            $MonetaryImpact->value('10.00');
            $Assessment->addChild($MonetaryImpact);

            $Counter = new Marknl\Iodef\Elements\Counter();
            $Counter->setAttributes(['type' => 'packet', 'meaning' => 'Amount of Packets from source']);
            $Counter->value('2439879534');
            $Assessment->addChild($Counter);

            $Counter = new Marknl\Iodef\Elements\Counter();
            $Counter->setAttributes(['type' => 'flow', 'meaning' => 'Amount of Flows to target']);
            $Counter->value('234246');
            $Assessment->addChild($Counter);

            $Confidence = new Marknl\Iodef\Elements\Confidence();
            $Confidence->setAttributes(['rating' => 'numeric']);
            $Confidence->value('10');
            $Assessment->addChild($Confidence);

            $AdditionalData = new Marknl\Iodef\Elements\AdditionalData();
            $AdditionalData->setAttributes(['dtype' => 'xml']);
            $AdditionalData->value('<xml><root><node>item 1</node></root></xml>');
            $Assessment->addChild($AdditionalData);

            $AdditionalData = new Marknl\Iodef\Elements\AdditionalData();
            $AdditionalData->setAttributes(['dtype' => 'url', 'meaning' => 'original notifier']);
            $AdditionalData->value('http://abuse.io');
            $Assessment->addChild($AdditionalData);

        $Incident->addChild($Assessment);

        $Method = new Marknl\Iodef\Elements\Method();
        $Method->setAttributes(['restriction' => 'private']);

            $Reference = new Marknl\Iodef\Elements\Reference();

                $ReferenceName = new Marknl\Iodef\Elements\ReferenceName();
                $ReferenceName->value('nmap');
                $Reference->addChild($ReferenceName);

                $URL = new Marknl\Iodef\Elements\URL();
                $URL->value('http://nmap.toolsite.example.com');
                $Reference->addChild($URL);

                $Description = new Marknl\Iodef\Elements\Description();
                $Description->value('Reference to the scanning tool "nmap"');
                $Reference->addChild($Description);

            $Method->addChild($Reference);

            $Description = new Marknl\Iodef\Elements\Description();
            $Description->value('Description for this Method.');
            $Method->addChild($Description);

            $AdditionalData = new Marknl\Iodef\Elements\AdditionalData();
            $AdditionalData->setAttributes(['dtype' => 'integer', 'meaning' => 'sample data']);
            $AdditionalData->value('11');
            $Method->addChild($AdditionalData);

        $Incident->addChild($Method);

        $Contact = new Marknl\Iodef\Elements\Contact();
        $Contact->setAttributes(['role' => 'creator', 'type' => 'organization']);

            $ContactName = new Marknl\Iodef\Elements\ContactName();
            $ContactName->value('Example.com CSIRT');
            $Contact->addChild($ContactName);

            $Description = new Marknl\Iodef\Elements\Description();
            $Description->value('Sample description for this contact.');
            $Contact->addChild($Description);

            $RegistryHandle = new Marknl\Iodef\Elements\RegistryHandle();
            $RegistryHandle->setAttributes(['registry' => 'arin']);
            $RegistryHandle->value('example-com');
            $Contact->addChild($RegistryHandle);

            $PostalAddress = new Marknl\Iodef\Elements\PostalAddress();
            $PostalAddress->value('Examplestreet 12');
            $Contact->addChild($PostalAddress);

            $Email = new Marknl\Iodef\Elements\Email();
            $Email->value('contact@csirt.example.com');
            $Contact->addChild($Email);

            $Telephone = new Marknl\Iodef\Elements\Telephone();
            $Telephone->value('+31201234561');
            $Contact->addChild($Telephone);

            $Fax = new Marknl\Iodef\Elements\Fax();
            $Fax->value('+31201234562');
            $Contact->addChild($Fax);

            $Timezone = new Marknl\Iodef\Elements\Timezone();
            $Timezone->value('+01:00');
            $Contact->addChild($Timezone);

            $Contact2 = new Marknl\Iodef\Elements\Contact();
            $Contact2->setAttributes(['role' => 'tech', 'type' => 'organization']);

                $ContactName = new Marknl\Iodef\Elements\ContactName();
                $ContactName->value('Techie Sjaak');
                $Contact2->addChild($ContactName);

                $Email = new Marknl\Iodef\Elements\Email();
                $Email->value('sjaak@tech.example.com');
                $Contact2->addChild($Email);

            $Contact->addChild($Contact2);

            $AdditionalData = new Marknl\Iodef\Elements\AdditionalData();
            $AdditionalData->setAttributes(['dtype' => 'ext-value', 'ext-dtype' => 'custom-type', 'restriction' => 'need-to-know']);
            $AdditionalData->value('Some additional information about this contact.');
            $Contact->addChild($AdditionalData);

        $Incident->addChild($Contact);

        $EventData = new Marknl\Iodef\Elements\EventData();

            $Description = new Marknl\Iodef\Elements\Description();
            $Description->value('Sample description event.');
            $EventData->addChild($Description);

            $DetectTime = new Marknl\Iodef\Elements\DetectTime();
            $DetectTime->value('2015-01-01T01:12:33+01:00');
            $EventData->addChild($DetectTime);

            $StartTime = new Marknl\Iodef\Elements\StartTime();
            $StartTime->value('2015-01-01T02:10:34+01:00');
            $EventData->addChild($StartTime);

            $Assessment = new Marknl\Iodef\Elements\Assessment();

                $Impact = new Marknl\Iodef\Elements\Impact();
                $Impact->setAttributes(['type' => 'recon', 'completion' => 'succeeded']);
                $Impact->value('Impact value');
                $Assessment->addChild($Impact);

            $EventData->addChild($Assessment);

            $Flow = new Marknl\Iodef\Elements\Flow();

                $System = new Marknl\Iodef\Elements\System();

                    $Node = new Marknl\Iodef\Elements\Node();

                        $NodeName = new Marknl\Iodef\Elements\NodeName();
                        $NodeName->value('Source Node Name');
                        $Node->addChild($NodeName);

                        $Address = new Marknl\Iodef\Elements\Address();
                        $Address->value('192.0.2.240');
                        $Node->addChild($Address);

                        $Location = new Marknl\Iodef\Elements\Location();
                        $Location->value('Basement: Rack12 / U5');
                        $Node->addChild($Location);

                        $DateTime = new Marknl\Iodef\Elements\DateTime();
                        $DateTime->value('2001-09-13T18:11:21+02:00');
                        $Node->addChild($DateTime);

                        $NodeRole = new Marknl\Iodef\Elements\NodeRole();
                        $NodeRole->setAttributes(['category' => 'server-public']);
                        $NodeRole->value('Annoying server');
                        $Node->addChild($NodeRole);

                    $System->addChild($Node);

                    $Service = new Marknl\Iodef\Elements\Service();
                    $Service->setAttributes(['ip_protocol' => 6]);

                        $Port = new Marknl\Iodef\Elements\Port();
                        $Port->value('445');
                        $Service->addChild($Port);

                        $Portlist = new Marknl\Iodef\Elements\Portlist();
                        $Portlist->value('2,5-15,30,32,40-50,55-60');
                        $Service->addChild($Portlist);

                        $Application = new Marknl\Iodef\Elements\Application();
                        $Application->setAttributes(['vendor' => 'Microsoft', 'name' => 'Office365', 'version' => '11.1']);

                            $URL = new Marknl\Iodef\Elements\URL();
                            $URL->value('http://www.microsoft.com');
                            $Application->addChild($URL);

                        $Service->addChild($Application);

                    $System->addChild($Service);

                    $OperatingSystem = new Marknl\Iodef\Elements\OperatingSystem();
                    $OperatingSystem->setAttributes(['vendor' => 'CentOS', 'name' => 'CentOS', 'version' => '6.3']);
                    $System->addChild($OperatingSystem);

                $Flow->addChild($System);

            $EventData->addChild($Flow);

            $Expectation = new Marknl\Iodef\Elements\Expectation();
            $Expectation->setAttributes(['action' => 'contact-source-site', 'severity' => 'medium']);

                $Description = new Marknl\Iodef\Elements\Description();
                $Description->value('Expected to contact source.');
                $Expectation->addChild($Description);

            $EventData->addChild($Expectation);

            $Record = new Marknl\Iodef\Elements\Record();
            $Record->setAttributes(['restriction' => 'private']);

                $RecordData = new Marknl\Iodef\Elements\RecordData();

                    $DateTime = new Marknl\Iodef\Elements\DateTime();
                    $DateTime->value('2001-09-13T18:11:21+02:00');
                    $RecordData->addChild($DateTime);

                    $Description = new Marknl\Iodef\Elements\Description();
                    $Description->value('Web-server logs');
                    $RecordData->addChild($Description);

                    $RecordPattern = new Marknl\Iodef\Elements\RecordPattern();
                    $RecordPattern->value('/[a-Z]+/');
                    $RecordData->addChild($RecordPattern);

                    $RecordItem = new Marknl\Iodef\Elements\RecordItem();
                    $RecordItem->value('192.0.2.1 - - [13/Sep/2001:18:11:21 +0200] "GET /default.ida?XXXXXX');
                    $RecordData->addChild($RecordItem);

                    $RecordItem = new Marknl\Iodef\Elements\RecordItem();
                    $RecordItem->setAttributes(['dtype' => 'url']);
                    $RecordItem->value('http://mylogs.example.com/logs/httpd_access');
                    $RecordData->addChild($RecordItem);

                $Record->addChild($RecordData);

            $EventData->addChild($Record);

        $Incident->addChild($EventData);

        $History = new Marknl\Iodef\Elements\History();

            $HistoryItem = new Marknl\Iodef\Elements\HistoryItem();

                $DateTime = new Marknl\Iodef\Elements\DateTime();
                $DateTime->value('2001-09-13T18:11:21+02:00');
                $HistoryItem->addChild($DateTime);

            $History->addChild($HistoryItem);

        $Incident->addChild($History);

    $IODEFDocument->addChild($Incident);

$iodef = new Marknl\Iodef\Writer();
$iodef->write([
    [
        'name' => 'IODEF-Document',
        'attributes' => $IODEFDocument->getAttributes(),
        'value' => $IODEFDocument,
    ]
]);
return Response::make($iodef->outputMemory(), '200')->header('Content-Type', 'text/xml');
