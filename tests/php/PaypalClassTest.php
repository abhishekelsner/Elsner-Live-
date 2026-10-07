<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use MyPayPal;

class PaypalClassTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        if (!defined('PPL_API_USER')) {
            define('PPL_API_USER', 'test_user');
        }
        if (!defined('PPL_API_PASSWORD')) {
            define('PPL_API_PASSWORD', 'test_password');
        }
        if (!defined('PPL_API_SIGNATURE')) {
            define('PPL_API_SIGNATURE', 'test_signature');
        }
        if (!defined('PPL_MODE')) {
            define('PPL_MODE', 'sandbox');
        }

        require_once dirname(__DIR__, 2) . '/themes/Elsner-Revemp/inc/paypal/paypal.class.php';
    }

    public function testPaypalClassInstantiation(): void
    {
        $paypal = new MyPayPal();
        $this->assertInstanceOf(MyPayPal::class, $paypal);
    }

    public function testPPHttpPostExecutesSslVerificationOptions(): void
    {
        $paypal = new MyPayPal();
        // Invoke PPHttpPost with sandbox parameters which executes CURLOPT_SSL_VERIFYPEER and CURLOPT_SSL_VERIFYHOST
        $response = $paypal->PPHttpPost('GetExpressCheckoutDetails', '&TOKEN=TEST_TOKEN');
        $this->assertIsArray($response);
    }
}
