<?php

namespace Marknl\Iodef\Elements;

use Marknl\Iodef\IodefElement;

class Impact extends IodefElement
{
    public $value = '';

    public function __construct()
    {
        $this->attributes = [
            'lang'          => '',
            'severity'      => '',
            'completion'    => '',
            'type'          => 'unknown',
            'ext-type'      => '',
        ];
    }

    /**
     * Attribute validation rules
     * @return array
     */
    public function getAttributeRules()
    {
        return [
            'lang'          => ['sometimes', 'string', 'regex:/^([a-zA-Z]{2}|[iI]-[a-zA-Z]+|[xX]-[a-zA-Z]{1,8})(-[a-zA-Z]{1,8})*/i'],
            'severity'      => 'sometimes|in:low,medium,high',
            'completion'    => 'sometimes|in:failed,succeeded',
            'type'          => 'required|in:admin,dos,file,info-leak,misconfiguration,policy,recon,social-engineering,user,unknown,ext-value',
            'ext-type'      => 'required_if:type,ext-value|string',
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
