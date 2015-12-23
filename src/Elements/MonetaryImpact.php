<?php

namespace Marknl\Iodef\Elements;

use Marknl\Iodef\IodefElement;

class MonetaryImpact extends IodefElement
{
    public $value = '';

    public function __construct()
    {
        $this->attributes = [
            'severity' => '',
            'currency' => '',
        ];
    }

    /**
     * Attribute validation rules
     * @return array
     */
    public function getAttributeRules()
    {
        return [
            'required' => 'currency',
            'in' => [
                ['severity',
                    [
                        'low',
                        'medium',
                        'high',
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
            'regex' => [
                ['value', '/^-?(?:\d+|\d*\.\d+)$/']
            ],
        ];
    }
}
