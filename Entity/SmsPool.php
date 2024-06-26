<?php

namespace N1Creator\SmsRu\Entity;

class SmsPool extends AbstractSms
{

    /**
     * @var Sms[]
     */
    public $messages;

    /**
     * @param Sms[] $messages
     */
    public function __construct(array $messages)
    {
        $this->messages = $messages;
    }
}
