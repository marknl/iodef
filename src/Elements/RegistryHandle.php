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
            'registry'          => 'required|in:internic,apnic,arin,lacnic,ripe,afrinic,local,ext-value',
            'ext-registry'      => 'required_if:registry,ext-value|string',
        ];
    }

    /**
     * Value validation rule
     * @return array
     */
    public function getValueRule()
    {
        return [
            'value' => 'required|string',
        ];
    }
}
