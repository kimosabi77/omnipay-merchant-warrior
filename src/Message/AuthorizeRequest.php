<?php

namespace Omnipay\MerchantWarrior\Message;

use Guzzle\Http\ClientInterface;
use Symfony\Component\HttpFoundation\Request as HttpRequest;

class AuthorizeRequest extends AbstractPaymentRequest
{
    public function __construct(ClientInterface $httpClient, HttpRequest $httpRequest){
        parent::__construct($httpClient, $httpRequest);
        $this->method = 'processAuth';
    }
}