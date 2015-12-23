<?php

namespace Marknl\Iodef\Elements;

use Marknl\Iodef\IodefElement;

class Counter extends IodefElement
{
    public $value = '';

    public function __construct()
    {
        $this->attributes = [
            'type'          => '',
            'ext-type'      => '',
            'meaning'       => '',
            'duration'      => '',
            'ext-duration'  => '',
        ];
    }

    /**
     * Attribute validation rules
     * @return array
     */
    public static function getAttributeRules()
    {
        return [
            'required' => 'type',
            'in' => [
                ['type',
                    [
                        'byte',
                        'packet',
                        'flow',
                        'session',
                        'alert',
                        'message',
                        'event',
                        'host',
                        'site',
                        'organization',
                        'ext-value',

                    ]
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
            'regex' => [
                ['value', '/^-?(?:\d+|\d*\.\d+)$/']
            ],
        ];
    }
}
