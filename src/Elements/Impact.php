<?php

namespace Marknl\Iodef\Elements;

use Marknl\Iodef\IodefElement;

class Impact extends IodefElement
{
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
            'required' => 'type',
            'regex' => [
                ['lang', '/^([a-zA-Z]{2}|[iI]-[a-zA-Z]+|[xX]-[a-zA-Z]{1,8})(-[a-zA-Z]{1,8})*/i'],
            ],
            'in' => [
                ['severity',
                    [
                        'low',
                        'medium',
                        'high',
                    ],
                ],
                ['completion',
                    [
                        'failed',
                        'succeeded',
                    ],
                ],
                ['type',
                    [
                        'admin',
                        'dos',
                        'file',
                        'info-leak',
                        'misconfiguration',
                        'policy',
                        'recon',
                        'social-engineering',
                        'user',
                        'unknown',
                        'ext-value',
                    ],
                ],
            ],
        ];
    }
}
