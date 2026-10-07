<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\RunInSeparateProcess;
use PHPUnit\Framework\Attributes\PreserveGlobalState;
use MockContactForm;

class TemplatePartsFunctionsTest extends TestCase
{
    #[RunInSeparateProcess]
    #[PreserveGlobalState(false)]
    public function testAddSerialNumberMailInTemplatePartsFunctions(): void
    {
        require_once dirname(__DIR__, 2) . '/tests/bootstrap.php';
        require_once dirname(__DIR__, 2) . '/themes/Elsner-Revemp/template-parts/functions.php';

        $form = new MockContactForm(array(
            'mail' => array('subject' => 'Free Quote')
        ));

        $result = add_serial_number_mail($form);

        $this->assertNotNull($result);
        $mail = $result->prop('mail');
        $this->assertStringContainsString('Free Quote #', $mail['subject']);
        $this->assertMatchesRegularExpression('/Free Quote #\d{6}/', $mail['subject']);
    }
}
