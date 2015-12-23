<?php

namespace Marknl\Iodef\Elements;

use Marknl\Iodef\IodefElement;

class RecordItem extends IodefElement
{
    public $value = '';

    public function __construct()
    {
        $this->attributes = [
            'dtype'         => 'string',
            'ext-dtype'     => '',
            'meaning'       => '',
            'formatid'      => '',
            'restriction'   => '',
        ];
    }

    /**
     * Attribute validation rules
     * @return array
     */
    public function getAttributeRules()
    {
        return [
            'required' => 'dtype',
            'in' => [
                ['dtype',
                    [
                        'boolean',
                        'byte',
                        'character',
                        'date-time',
                        'integer',
                        'portlist',
                        'real',
                        'string',
                        'file',
                        'frame',
                        'packet',
                        'ipv4-packet',
                        'ipv6-packet',
                        'path',
                        'url',
                        'csv',
                        'winreg',
                        'xml',
                        'ext-value',
                    ]
                ],
                ['restriction',
                    [
                        'default',
                        'public',
                        'need-to-know',
                        'private',
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
        return [];
    }
}
