# Omnipay Merchant Warrior 

**Merchant Warrior API implemention**

[Omnipay](https://github.com/omnipay/omnipay) is a framework agnostic,
multi-gateway payment processing library. This package implements components of the Merchant Warrior Direct API.

## Installation

Omnipay is installed via [Composer](http://getcomposer.org/). To install, simply
add it to your `composer.json` file:

```json
{
    "require": {
        "composer require kimoslim/omnipay-merchant-warrior": "dev-master"
    }
}
```
## Basic Usage

The following gateways are provided by this package:

* Merchant warrior Direct API (Following methods are done, although currently untested)
    * processAuth
    * processCapture
    * processCard
    
### Purchase Example    
```
$gateway = Omnipay::create('MerchantWarrior');
$gateway->setMerchantUUID('merchant UUID');
$gateway->setApiKey('API KEY');
$gateway->setApiPassphrase('API PASS');

$card = new CreditCard(array(
    'firstName'          => 'Joe',
    'lastName'           => 'Bloggs',
    'number'             => '4444333322221111',
    'expiryMonth'        => '01',
    'expiryYear'         => '2019',
    'billingAddress1'    => 'street',
    'billingCountry'     => 'AU',
    'billingCity'        => 'SUBURB',
    'billingPostcode'    => 'POSTCODE',
    'billingState'       => 'STATE',
    'email'              => 'me@emailaddress.com',
));
$purchase = [
    'amount'            => '1.00',
    'currency'          => 'AUD',
    'transactionType'   => 'Purchase',
    'transactionId'     => 'TRANSACTION ID',
    'transactionProduct'=> 'Test Transaction Description',
    'card'              => $card
];
$request = $gateway->purchase($purchase);
$response = $request->send();
if ($response->isSuccessful()) {
    // insert the transaction
    $txn_id = $response->getTransactionReference();
    $auth_code = $response->getAuthCode();
    $message = $response->getMessage();
    echo 'Payment successful: TXN ID - '.$txn_id.' auth code: '.$auth_code.' message:'.$message.PHP_EOL;
}
else
{
    echo 'Credit Card Failed: '.$response->getMessage().PHP_EOL;
}
```

### Authorize Example 
```
$authorize = [
    'amount'            => '1.00',
    'currency'          => 'AUD',
    'transactionType'   => 'Authorize',
    'transactionId'     => 'TRANSACTION ID',
    'transactionProduct'=> 'Test Authorisation Description',
    'card'              => $card
];
$request = $gateway->authorize($authorize);
$response = $request->send();
if ($response->isSuccessful()) {
    // insert the transaction
    $txn_id = $response->getTransactionReference();
    $auth_code = $response->getAuthCode();
    $message = $response->getMessage();
    echo 'Payment successful: TXN ID - '.$txn_id.' auth code: '.$auth_code.' message:'.$message.PHP_EOL;
}
else
{
    echo 'Credit Card Failed: '.$response->getMessage().PHP_EOL;
}
```

More details of Merchant Warrior's API can be found at [Merchant Warrior](https://dox.merchantwarrior.com/)

For general usage instructions, please see the main
[Omnipay](https://github.com/omnipay/omnipay) repository.
