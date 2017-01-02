<?php

namespace Marknl\Iodef\Elements;

use Marknl\Iodef\IodefElement;

class Expectation extends IodefElement
{
    public function __construct()
    {
        $this->attributes = [
            'restriction'   => '',
            'severity'      => '',
            'action'        => '',
            'ext-action'    => '',
        ];

        $this->elements = [
            'Description'   => parent::OPTIONAL_MULTI,
            'StartTime'     => parent::OPTIONAL,
            'EndTime'       => parent::OPTIONAL,
            'Contact'       => parent::OPTIONAL,
        ];
    }

    /**
     * Attribute validation rules
     * @return array
     */
    public function getAttributeRules()
    {
        return [
            'in' => [
                ['restriction',
                    [
                        'default',
                        'public',
                        'need-to-know',
                        'private',
                    ]
                ],
                ['severity',
                    [
                        'low',
                        'medium',
                        'high',
                    ],
                ],
                ['action',
                    [
                        'nothing',
                        'contact-source-site',
                        'contact-target-site',
                        'contact-sender',
                        'investigate',
                        'block-host',
                        'block-network',
                        'block-port',
                        'rate-limit-host',
                        'rate-limit-network',
                        'rate-limit-port',
                        'remediate-other',
                        'status-triage',
                        'status-new-info',
                        'other',
                        'ext-value',
                    ],
                ],
            ],
        ];
    }
}
