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
        return [];
    }
}
