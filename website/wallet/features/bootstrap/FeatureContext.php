<?php

use Behat\Behat\Context\Context;
use PHPUnit\Framework\Assert as Assertions;

class FeatureContext implements Context
{
    const BASE_URL = "http://lemp-nginx/";

    private $client;
    private $currentWalletAmount = [];
    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client();
    }

    /**
     * @Given Get current wallet amout of user :arg1
     */
    public function getCurrentWalletAmoutOfUser($arg1)
    {
        $url = self::BASE_URL . 'api/get-balance/' . $arg1;
        $res = $this->client->request('GET', $url);
        $resBody = json_decode($res->getBody(), true);
        $balance = $resBody['balance'];

        $this->currentWalletAmount['user-' . $arg1] = $balance;
    }

    /**
     * @When Add :arg1 dollars to the user wallet with userId :arg2
     */
    public function addDollarsToTheUserWalletWithUserid($arg1, $arg2)
    {
        $url = self::BASE_URL . 'api/add-money';
        $this->client->request('POST', $url, [
            'form_params' => [
                'user_id' => $arg2,
                'amount' => $arg1,
            ]
        ]);
    }

    /**
     * @Then user with userId :arg1 should have :arg2 dollars more to the wallet
     */
    public function userWithUseridShouldHaveDollarsMoreToTheWallet($arg1, $arg2)
    {
        $url = self::BASE_URL . 'api/get-balance/' . $arg1;
        $res = $this->client->request('GET', $url);
        $resBody = json_decode($res->getBody(), true);
        $balance = $resBody['balance'];

        if (isset($this->currentWalletAmount['user-' . $arg1])) {
            Assertions::assertEquals($balance, $this->currentWalletAmount['user-' . $arg1] + (int)$arg2);
        } else {
            Assertions::assertEquals($balance, (int)$arg2);
        }
    }
}
