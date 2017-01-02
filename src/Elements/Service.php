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
            'Port'          => parent::OPTIONAL,
            'Portlist'      => parent::OPTIONAL,
            'ProtoCode'     => parent::OPTIONAL,
            'ProtoType'     => parent::OPTIONAL,
            'ProtoFlags'    => parent::OPTIONAL,
            'Application'   => parent::OPTIONAL,
        ];
    }

    /**
     * Attribute validation rules
     * @return array
     */
    public function getAttributeRules()
    {
        return [
            'required'  => 'ip_protocol',
            'integer'   => 'ip_protocol',
        ];
    }
}
