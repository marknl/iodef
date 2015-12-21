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
            'category'      => 'required|in:asn,atm,e-mail,ipv4-addr,ipv4-net,ipv4-net-mask,ipv6-addr,ipv6-net,ipv6-net-mask,mac,ext-value',
            'ext-category'  => 'required_if:category,ext-value|string',
            'vlan-name'     => 'sometimes|string',
            'vlan-num'      => 'sometimes|string',
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
