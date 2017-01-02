<?php

namespace Marknl\Iodef\Elements;

use Marknl\Iodef\IodefElement;

class Contact extends IodefElement
{
    public function __construct()
    {
        $this->attributes = [
            'role'          => '',
            'ext-role'      => '',
            'type'          => '',
            'ext-type'      => '',
            'restriction'   => '',
        ];

        $this->elements = [
            'ContactName'       => parent::OPTIONAL,
            'Description'       => parent::OPTIONAL_MULTI,
            'RegistryHandle'    => parent::OPTIONAL_MULTI,
            'PostalAddress'     => parent::OPTIONAL,
            'Email'             => parent::OPTIONAL_MULTI,
            'Telephone'         => parent::OPTIONAL_MULTI,
            'Fax'               => parent::OPTIONAL,
            'Timezone'          => parent::OPTIONAL,
            'Contact'           => parent::OPTIONAL_MULTI,
            'AdditionalData'    => parent::OPTIONAL_MULTI,
        ];
    }

    /**
     * Attribute validation rules
     * @return array
     */
    public function getAttributeRules()
    {
        return [
            'required' => [
                ['role'],
                ['type']
            ],
            'in' => [
                ['role',
                    [
                        'creator',
                        'admin',
                        'tech',
                        'irt',
                        'cc',
                        'ext-value',
                    ]
                ],
                ['type',
                    [
                        'person',
                        'organization',
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
}
