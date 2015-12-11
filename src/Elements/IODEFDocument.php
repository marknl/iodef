<?php

namespace Marknl\Iodef\Elements;

use Marknl\Iodef\Attributes;
use Sabre\Xml\Writer as SabreWriter;

class IODEFDocument extends SabreWriter
{
    public static function create(&$doc, $data)
    {
        $doc->namespaceMap = [
            'urn:ietf:params:xml:ns:iodef-1.0' => '',
            'http://www.w3.org/2001/XMLSchema-instance' => 'xsi',
        ];

        $doc->startElement('IODEF-Document');
        if (Attributes::validate('IODEFDocument', $data['document']['attributes'])) {
            $doc->writeAttributes($data['document']['attributes']);
        }

        foreach ($data['incidents'] as $incident) {
            Incident::create($doc, $incident);
        }

        $doc->endElement();
    }

    public static function getRules()
    {
        return [
            'version'   => 'required|string',
            'lang'      => 'required|string|max:3',
            'formatid'  => 'sometimes|string',
        ];
    }
}
