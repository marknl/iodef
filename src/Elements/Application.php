<?php

namespace Marknl\Iodef\Elements;

use Marknl\Iodef\IodefElement;

class Application extends IodefElement
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
            'URL' => parent::OPTIONAL,
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
