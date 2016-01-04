<?php

namespace Marknl\Iodef\Elements;

use Marknl\Iodef\IodefElement;

class Address extends IodefElement
{
    public $value = '';

    public function __construct()
    {
        $this->attributes = [
            'category'      => 'ipv4-addr',
            'ext-category'  => '',
            'vlan-name'     => '',
            'vlan-num'      => '',
        ];
    }

    /**
     * Attribute validation rules
     * @return array
     */
    public function getAttributeRules()
    {
        return [
            'required' => 'category',
            'in' => [
                ['category',
                    [
                        'asn',
                        'atm',
                        'e-mail',
                        'ipv4-addr',
                        'ipv4-net',
                        'ipv4-net-mask',
                        'ipv6-addr',
                        'ipv6-net',
                        'ipv6-net-mask',
                        'mac',
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
