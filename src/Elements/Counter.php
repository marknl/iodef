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
            'type'          => 'required|in:byte,packet,flow,session,alert,message,event,host,site,organization,ext-value',
            'ext-type'      => 'required_if:type,ext-value|string',
            'meaning'       => 'sometimes|string',
            'duration'      => 'sometimes|in:second,minute,hour,day,month,quarter,year,ext-value',
            'ext-duration'  => 'required_if:duration,ext-value|string',
        ];
    }

    /**
     * Value validation rule
     * @return array
     */
    public function getValueRule()
    {
        return [
            'value' => ['required', 'regex:/^-?(?:\d+|\d*\.\d+)$/'],
        ];
    }
}
