# WkKlarnaApiBundle

[![Build Status](https://travis-ci.org/asgoodasnu/klarna-api-bundle.png?branch=master)](https://travis-ci.org/asgoodasnu/klarna-api-bundle) [![Total Downloads](https://poser.pugx.org/asgoodasnu/klarna-api-bundle/d/total.png)](https://packagist.org/packages/asgoodasnu/klarna-api-bundle) [![Latest Stable Version](https://poser.pugx.org/asgoodasnu/klarna-api-bundle/v/stable.png)](https://packagist.org/packages/asgoodasnu/klarna-api-bundle) [![SensioLabsInsight](https://insight.sensiolabs.com/projects/fb4661e3-dec5-4088-922d-6eb6328d2e94/mini.png)](https://insight.sensiolabs.com/projects/fb4661e3-dec5-4088-922d-6eb6328d2e94)

The WkKlarnaApiBundle wraps the Klarna PHPXML Api as a Symfony Bundle 

Installation
----------------------------------------------------------------

Require the bundle and its dependencies with composer:

    $ composer require asgoodasnu/klarna-api-bundle
    
Register the bundle:

```php
// app/AppKernel.php
public function registerBundles()
{
    $bundles = array(
        new Wk\KlarnaApiBundle\WkKlarnaApiBundle(),
    );
}
```

Configure your Klarna settings in your `parameters.yml`:

```yaml
# parameters.yml
wk_klarna_api.merchant_id: 1234567 #My Merchant ID
wk_klarna_api.secret: mySecret #My Secret
wk_klarna_api.country: 81 # see valid country codes below
wk_klarna_api.language: 28 # see valid languages below
wk_klarna_api.currency: 2 # see valid currencies below 
wk_klarna_api.use_sandbox: 0 # use sandbox (set to 1) or live system (set to 0)
```

[Valid country codes](https://developers.klarna.com/sdk-references/xmlrpc_php/class-KlarnaCountry.html)

[Valid languages](https://developers.klarna.com/sdk-references/xmlrpc_php/class-KlarnaLanguage.html)

[Valid currencies](https://developers.klarna.com/sdk-references/xmlrpc_php/class-KlarnaCurrency.html)

Usage
----------------------------------------------------------------
You can get a configured Klarna object from the container:
```PHP
$klarna = $this->get('wk_klarna_api')
```

Read the Klarna documentation for more information about this object.

Dependencies
----------------------------------------------------------------
* `symfony/framework-bundle` - Symfony FrameworkBundle
* `klarna/php-xmlrpc:4.0` - Klarna XML API

PHPUnit Tests
----------------------------------------------------------------
You can run the tests using the following command:

    $ vendor/bin/phpunit

Resources
----------------------------------------------------------------
Symfony 2
> [http://symfony.com](http://symfony.com)

Klarna RPC API
> [https://developers.klarna.com/sdk-references/xmlrpc_php/package-KlarnaAPI.html](https://developers.klarna.com/sdk-references/xmlrpc_php/package-KlarnaAPI.html)

