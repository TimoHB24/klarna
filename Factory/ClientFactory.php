<?php

namespace Wk\KlarnaApiBundle\Factory;

use Klarna;

/**
 * Class ClientFactory
 * @package Wk\KlarnaApiBundle\Factory
 */
class ClientFactory
{
    /**
     * @var Klarna
     */
    private $client;

    /**
     * Returns {@link Klarna} object
     *
     * @param int    $eid        Merchant ID/EID
     * @param string $secret     Secret key/Shared key
     * @param int    $country    {@link KlarnaCountry}
     * @param int    $language   {@link KlarnaLanguage}
     * @param int    $currency   {@link KlarnaCurrency}
     * @param bool   $useSandbox use live system or sandbox
     *
     * @return Klarna
     */
    public function createClient($eid, $secret, $country, $language, $currency, $useSandbox)
    {
        if (!$this->client) {
            $this->client = new Klarna();
            $this->client->config($eid, $secret, $country, $language, $currency, $useSandbox ? Klarna::BETA : Klarna::LIVE);
        }

        return $this->client;
    }
}
