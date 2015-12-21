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
            'severity' => 'sometimes|in:low,medium,high',
            'currency' => 'required|string',
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
