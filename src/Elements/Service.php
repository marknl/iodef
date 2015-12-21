<?php

namespace Marknl\Iodef\Elements;

use Marknl\Iodef\IodefElement;

class Service extends IodefElement
{
    public function __construct()
    {
        $this->attributes = [
            'ip_protocol' => '',
        ];

        $this->elements = [
            'Port'          => 'OPTIONAL',
            'Portlist'      => 'OPTIONAL',
            'ProtoCode'     => 'OPTIONAL',
            'ProtoType'     => 'OPTIONAL',
            'ProtoFlags'    => 'OPTIONAL',
            'Application'   => 'OPTIONAL',
        ];
    }

    /**
     * Attribute validation rules
     * @return array
     */
    public function getAttributeRules()
    {
        return [
            'ip_protocol' => 'required|integer',
        ];
    }
}
