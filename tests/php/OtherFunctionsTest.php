<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\RunInSeparateProcess;
use PHPUnit\Framework\Attributes\PreserveGlobalState;
use MockContactForm;

class OtherFunctionsTest extends TestCase
{
    #[RunInSeparateProcess]
    #[PreserveGlobalState(false)]
    public function testAddSerialNumberMailInOtherFunctions(): void
    {
        require_once dirname(__DIR__, 2) . '/tests/bootstrap.php';
        require_once dirname(__DIR__, 2) . '/themes/Elsner-Revemp/functions/other-functions.php';

        $form = new MockContactForm(array(
            'mail' => array('subject' => 'Inquiry')
        ));

        $result = add_serial_number_mail($form);

        $this->assertNotNull($result);
        $mail = $result->prop('mail');
        $this->assertStringContainsString('Inquiry #', $mail['subject']);
        $this->assertMatchesRegularExpression('/Inquiry #\d{6}/', $mail['subject']);
    }
}
