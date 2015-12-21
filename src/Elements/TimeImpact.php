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
            'severity'      => 'sometimes|in:low,medium,high',
            'metric'        => 'required|in:labor,elapsed,downtime,ext-value',
            'ext-metric'    => 'required_if:metric,ext-value|string',
            'duration'      => 'required|in:second,minute,hour,day,month,quarter,year,ext-value',
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
