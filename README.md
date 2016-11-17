# Soda-Framework: Omnipay Merhcant Warrior 

**Merchant Warrior API implemention**

[Omnipay](https://github.com/omnipay/omnipay) is a framework agnostic,
multi-gateway payment processing library. This package implements components of the Merchant Warrior Direct API.

## Installation

Omnipay is installed via [Composer](http://getcomposer.org/). To install, simply
add it to your `composer.json` file:

```json
{
    "require": {
        "composer require soda-framework/omnipay-merchant-warrior": "0.1.*"
    }
}
```
## Basic Usage

The following gateways are provided by this package:

* Merchant warrior Direct API (Following methods are done, although currently untested)
    * processAuth
    * processCapture
    * processCard
    
More details of Merchant Warrior's API can be found at [Merchant Warrior](https://dox.merchantwarrior.com/)

For general usage instructions, please see the main
[Omnipay](https://github.com/omnipay/omnipay) repository.
