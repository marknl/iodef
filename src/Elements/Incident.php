<?php

namespace Marknl\Iodef\Elements;

use Marknl\Iodef\Attributes;
use Sabre\Xml\Writer as SabreWriter;

class Incident extends SabreWriter
{
    public static function create(&$doc, $data)
    {

        $doc->startElement('Incident');
        if (Attributes::validate('Incident', $data['attributes'])) {
            $doc->writeAttributes($data['attributes']);
        }
        IncidentId::create($doc, $data['id']);
        $doc->endElement();
    }

    public static function getRules()
    {
        return [
            'purpose'       => 'required|in:traceback,mitigation,reporting,other,ext-value',
            'ext-purpose'   => 'required_if:purpose,ext-value|string',
            'lang'          => 'sometimes|string|max:3',
            'restriction'   => 'sometimes|in:public,need-to-know,private,default',
        ];
    }
}
