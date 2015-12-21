<?php

namespace Marknl\Iodef\Elements;

use Marknl\Iodef\IodefElement;

class OperatingSystem extends IodefElement
{
    public function __construct()
    {
        $this->attributes = [
            'swid'      => '',
            'configid'  => '',
            'vendor'    => '',
            'family'    => '',
            'name'      => '',
            'version'   => '',
            'patch'     => '',
        ];

        $this->elements = [
            'URL' => 'OPTIONAL',
        ];
    }

    /**
     * Attribute validation rules
     * @return array
     */
    public function getAttributeRules()
    {
        return [
            'swid'      => 'sometimes|string',
            'configid'  => 'sometimes|string',
            'vendor'    => 'sometimes|string',
            'family'    => 'sometimes|string',
            'name'      => 'sometimes|string',
            'version'   => 'sometimes|string',
            'patch'     => 'sometimes|string',
        ];
    }
}
