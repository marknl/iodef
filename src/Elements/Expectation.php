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
            'Description'   => 'OPTIONAL_MULTI',
            'StartTime'     => 'OPTIONAL',
            'EndTime'       => 'OPTIONAL',
            'Contact'       => 'OPTIONAL',
        ];
    }

    /**
     * Attribute validation rules
     * @return array
     */
    public function getAttributeRules()
    {
        return [
            'restriction'   => 'sometimes|in:public,need-to-know,private,default',
            'severity'      => 'sometimes|in:low,medium,high',
            'action'        => 'sometimes|in:nothing,contact-source-site,contact-target-site,contact-sender,investigate,block-host,block-network,block-port,rate-limit-host,rate-limit-network,rate-limit-port,remediate-other,status-triage,status-new-info,other,ext-value',
            'ext-action'    => 'required_if:action,ext-value',
        ];
    }
}
