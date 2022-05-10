<?php
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

require './autoload.php';

// For test payments we want to enable the sandbox mode. If you want to put live
// payments through then this setting needs changing to `false`.
$enableSandbox = true;

// PayPal settings. Change these to your account details and the relevant URLs
// for your site.
$paypalConfig = [
    'client_id' => '',
    'client_secret' => '',
    'return_url' => 'http://localhost/project/response.php',
    'cancel_url' => 'http://localhost/project/index.php'
];

// Database settings. Change these for your database configuration.
$dbConfig = [
    'host' => 'mysql:host=localhost;dbname=bengmoudproject',
    'username' => 'root',
    'password' => '',
    'option' => array(
        PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8',
            )
];

$apiContext = getApiContext($paypalConfig['client_id'], $paypalConfig['client_secret'], $enableSandbox);

/**
 * Set up a connection to the API
 *
 * @param string $clientId
 * @param string $clientSecret
 * @param bool   $enableSandbox Sandbox mode toggle, true for test payments
 * @return \PayPal\Rest\ApiContext
 */
function getApiContext($clientId, $clientSecret, $enableSandbox = false)
{
    $apiContext = new ApiContext(
        new OAuthTokenCredential($clientId, $clientSecret)
    );

    $apiContext->setConfig([
        'mode' => $enableSandbox ? 'sandbox' : 'live'
    ]);

    return $apiContext;
}
