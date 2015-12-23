<?php

namespace Marknl\Iodef\Elements;

use Marknl\Iodef\IodefElement;

class RegistryHandle extends IodefElement
{
    public $value = '';

    public function __construct()
    {
        $this->attributes = [
            'registry'      => 'local',
            'ext-registry'  => '',
        ];
    }

    /**
     * Attribute validation rules
     * @return array
     */
    public function getAttributeRules()
    {
        return [
            'in' => [
                ['registry',
                    [
                        'internic',
                        'apnic',
                        'arin',
                        'lacnic',
                        'ripe',
                        'afrinic',
                        'local',
                        'ext-value',
                    ]
                ],
            ],
        ];
    }

    /**
     * Value validation rule
     * @return array
     */
    public function getValueRule()
    {
        return [
            'required' => 'value',
        ];
    }
}
