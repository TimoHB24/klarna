<?php

namespace WK\KlarnaApiBundle\Tests\Factory;

use Klarna;
use KlarnaCountry;
use KlarnaCurrency;
use KlarnaLanguage;
use PHPUnit_Framework_TestCase;
use Wk\KlarnaApiBundle\Factory\ClientFactory;

// what a hack for travis
$GLOBALS['xmlrpcName'] = 'This is a Test';
$GLOBALS['xmlrpcVersion'] = '0.0';

/**
 * Class WkKlarnaApiClientFactoryTest
 */
class WkKlarnaApiClientFactoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * This function tests if the factory returns a correct Klarna client
     *
     * @param bool $useSandbox
     * @param int  $mode
     *
     * @dataProvider provideGetClient
     */
    public function testGetClient($useSandbox, $mode)
    {
        $factory = new ClientFactory();

        $eid = 815;
        $secret = 'aSecret';
        $country = KlarnaCountry::DE;
        $language = KlarnaLanguage::DE;
        $currency = KlarnaCurrency::EUR;

        $klarna = $factory->createClient($eid, $secret, $country, $language, $currency, $useSandbox);

        $this->assertInstanceOf('Klarna', $klarna);

        $this->assertAttributeEquals($eid, '_eid', $klarna);
        $this->assertAttributeEquals($secret, '_secret', $klarna);
        $this->assertAttributeEquals($country, '_country', $klarna);
        $this->assertAttributeEquals($language, '_language', $klarna);
        $this->assertAttributeEquals($currency, '_currency', $klarna);
        $this->assertAttributeEquals($mode, 'mode', $klarna);
    }

    /**
     * @return array
     */
    public function provideGetClient() {
        return [
            [true, Klarna::BETA],
            [false, Klarna::LIVE],
        ];
    }
}
