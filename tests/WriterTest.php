<?php

//namespace Marknl\Iodef\Tests;

class WriterTest extends PHPUnit_Framework_TestCase
{
    public function testWriter()
    {
        $this->document = new Marknl\Iodef\Elements\IODEFDocument();

        $Incident = new Marknl\Iodef\Elements\Incident();
        $Incident->setAttributes(['purpose' => 'mitigation']);

            $IncidentID = new Marknl\Iodef\Elements\IncidentID();
            $IncidentID->setAttributes(['name' => 'csirt.example.com']);
            $IncidentID->value('908711');
            $Incident->addChild($IncidentID);

            $ReportTime = new Marknl\Iodef\Elements\ReportTime();
            $ReportTime->value('2006-06-08T05:44:53-05:00');
            $Incident->addChild($ReportTime);

            $Description = new Marknl\Iodef\Elements\Description();
            $Description->value('Large bot-net');
            $Incident->addChild($Description);

            $Assessment = new Marknl\Iodef\Elements\Assessment();

                $Impact = new Marknl\Iodef\Elements\Impact();
                $Impact->setAttributes(['type' => 'dos', 'severity' => 'high', 'completion' => 'succeeded']);
                $Assessment->addChild($Impact);

            $Method = new Marknl\Iodef\Elements\Method();

                $Reference = new Marknl\Iodef\Elements\Reference();

                    $ReferenceName = new Marknl\Iodef\Elements\ReferenceName();
                    $ReferenceName->value('GT Bot');
                    $Reference->addChild($ReferenceName);

                $Method->addChild($Reference);

                $Reference = new Marknl\Iodef\Elements\Reference();

                    $ReferenceName = new Marknl\Iodef\Elements\ReferenceName();
                    $ReferenceName->value('CA-2003-22');
                    $Reference->addChild($ReferenceName);

                    $URL = new Marknl\Iodef\Elements\URL();
                    $URL->value('http://www.cert.org/advisories/CA-2003-22.html');
                    $Reference->addChild($URL);

                    $Description = new Marknl\Iodef\Elements\Description();
                    $Description->value('Root compromise via this IE vulnerability to install the GT Bot');
                    $Reference->addChild($Description);

                $Method->addChild($Reference);

            $Contact = new Marknl\Iodef\Elements\Contact();
            $Contact->setAttributes(['role' => 'irt', 'type' => 'person']);

                $ContactName = new Marknl\Iodef\Elements\ContactName();
                $ContactName->value('Joe Smith');
                $Contact->addChild($ContactName);

                $Email = new Marknl\Iodef\Elements\Email();
                $Email->value('jsmith@csirt.example.com');
                $Contact->addChild($Email);

            $Incident->addChild($Contact);

            $EventData = new Marknl\Iodef\Elements\EventData();

                $Description = new Marknl\Iodef\Elements\Description();
                $Description->value('These hosts are compromised and acting as bots communicating with irc.example.com.');
                $EventData->addChild($Description);

                $Flow = new Marknl\Iodef\Elements\Flow();

                    $System = new Marknl\Iodef\Elements\System();
                    $System->setAttributes(['category' => 'source']);

                        $Node = new Marknl\Iodef\Elements\Node();

                            $Address = new Marknl\Iodef\Elements\Address();
                            $Address->setAttributes(['category' => 'ipv4-addr']);
                            $Address->value('192.0.2.3');
                            $Node->addChild($Address);

                        $System->addChild($Node);

                        $Counter = new Marknl\Iodef\Elements\Counter();
                        $Counter->setAttributes(['type' => 'byte', 'duration' => 'second']);
                        $Counter->value(250000);
                        $System->addChild($Counter);

                        $Description = new Marknl\Iodef\Elements\Description();
                        $Description->value('Sample description for this contact.');
                        $System->addChild($Description);

                    $Flow->addChild($System);

                $Flow = new Marknl\Iodef\Elements\Flow();

                    $System = new Marknl\Iodef\Elements\System();
                    $System->setAttributes(['category' => 'intermediate']);

                        $Node = new Marknl\Iodef\Elements\Node();

                            $NodeName = new Marknl\Iodef\Elements\NodeName();
                            $NodeName->value('irc.example.com');
                            $Node->addChild($NodeName);

                            $Address = new Marknl\Iodef\Elements\Address();
                            $Address->setAttributes(['category' => 'ipv4-addr']);
                            $Address->value('192.0.2.20');
                            $Node->addChild($Address);

                            $DateTime = new Marknl\Iodef\Elements\DateTime();
                            $DateTime->value('2006-06-08T01:01:03-05:00');
                            $Node->addChild($DateTime);

                        $System->addChild($Node);

                        $Description = new Marknl\Iodef\Elements\Description();
                        $Description->value('IRC server on #give-me-cmd channel');
                        $System->addChild($Description);

                    $Flow->addChild($System);

                $Expectation = new Marknl\Iodef\Elements\Expectation();
                $Expectation->setAttributes(['action' => 'investigate']);

                    $Description = new Marknl\Iodef\Elements\Description();
                    $Description->value('Confirm the source and take machines off-line and remediate');
                    $Expectation->addChild($Description);

                $EventData->addChild($Expectation);

            $Incident->addChild($EventData);

        $this->document->addChild($Incident);

        $iodef = new Marknl\Iodef\Writer();
        $iodef->write([
            [
                'name' => 'IODEF-Document',
                'attributes' => $this->document->getAttributes(),
                'value' => $this->document,
            ]
        ]);

        echo $iodef->outputMemory();
    }
}
