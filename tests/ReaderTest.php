<?php


class ReaderTest extends \PHPUnit\Framework\TestCase
{
    public function testReader()
    {
        $xml = file_get_contents(__DIR__.'/iodef.xml');

        $XMLDoc = new Marknl\Iodef\Reader($xml);
        $iodef_read = $XMLDoc->parse();

        // The value for the 'action' attribute is expected to be 'investigate'.
        $expectation_attributes = $iodef_read['value']->Incident[0]->EventData[0]->Expectation[0]->getAttributes();
        $this->assertEquals('investigate', $expectation_attributes['action']);

        // This object has required attributes
        $this->assertObjectHasAttribute('attributes', $iodef_read['value']->Incident[0]);

        // IncidentID should have this value.
        $this->assertEquals(908711, $iodef_read['value']->Incident[0]->IncidentID->value);

        // There should be 2 reference entries.
        $this->assertCount(2, $iodef_read['value']->Incident[0]->Method[0]->Reference);

        // This object MUST have a value.
        $this->assertObjectHasAttribute('value', $iodef_read['value']->Incident[0]->ReportTime);

        $iodef_write = new Marknl\Iodef\Writer();
        $iodef_write->write([
            [
                'name' => 'IODEF-Document',
                'attributes' => $iodef_read['value']->getAttributes(),
                'value' => $iodef_read['value'],
            ]
        ]);

        $expected = new DOMDocument;
        $expected->loadXML(file_get_contents(__DIR__.'/iodef.xml'));

        $actual = new DOMDocument;
        $actual->loadXML($iodef_write->outputMemory());

        $this->assertEqualXMLStructure($expected->firstChild, $actual->firstChild, true);
    }
}
