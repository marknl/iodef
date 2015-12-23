<?php

namespace Marknl\Iodef\Elements;

use Marknl\Iodef\IodefElement;

class TimeImpact extends IodefElement
{
    public $value = '';

    public function __construct()
    {
        $this->attributes = [
            'severity'      => '',
            'metric'        => '',
            'ext-metric'    => '',
            'duration'      => 'hour',
            'ext-duration'  => '',
        ];
    }

    /**
     * Attribute validation rules
     * @return array
     */
    public function getAttributeRules()
    {
        return [
            'required' => [
                ['metric'],
                ['duration'],
            ],
            'in' => [
                ['severity',
                    [
                        'low',
                        'medium',
                        'high',
                    ],
                ],
                ['metric',
                    [
                        'labor',
                        'elapsed',
                        'downtime',
                        'ext-value',
                    ],
                ],
                ['duration',
                    [
                        'second',
                        'minute',
                        'hour',
                        'day',
                        'month',
                        'quarter',
                        'year',
                        'ext-value',
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
