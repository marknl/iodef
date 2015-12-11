<?php

namespace Marknl\Iodef\Elements;

use Marknl\Iodef\Attributes;
use Sabre\Xml\Writer as SabreWriter;

class IncidentId extends SabreWriter
{
    public static function create(&$doc, $data)
    {

        $doc->startElement('IncidentId');
        if (Attributes::validate('IncidentId', $data['attributes'])) {
            $doc->writeAttributes($data['attributes']);
        }
        $doc->write($data['id']);
        $doc->endElement();
    }

    public static function getRules()
    {
        return [
            'name'          => 'required|string',
            'instance'      => 'sometimes|string',
            'restriction'   => 'sometimes|in:public,need-to-know,private,default',
        ];
    }
}
