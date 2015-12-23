<?php

namespace Marknl\Iodef\Elements;

use Marknl\Iodef\IodefElement;

class IncidentID extends IodefElement
{
    public $value = '';

    public function __construct()
    {
        $this->attributes = [
            'name'          => '',
            'instance'      => '',
            'restriction'   => 'public',
        ];
    }

    /**
     * Attribute validation rules
     * @return array
     */
    public function getAttributeRules()
    {
        return [
            'required' => 'name',
            'in' => [
                ['restriction',
                    [
                        'default',
                        'public',
                        'need-to-know',
                        'private'
                    ],
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
