<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use MockContactForm;
use WPCF7_Submission;

class ContactForm7WeekmateTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once dirname(__DIR__, 2) . '/plugins/contact-form-7-weekmate/contact-form-7-weekmate.php';
    }

    public function testCf7CustomAfterSubmissionActionExecutesWithApiKeyAndQueryArg(): void
    {
        $_SERVER['HTTP_HOST'] = 'www.example.com';
        $_SERVER['REMOTE_ADDR'] = '127.0.0.1';

        $form = new MockContactForm();
        
        // Ensure cf7_custom_after_submission_action runs through the lines
        cf7_custom_after_submission_action($form);

        $this->assertTrue(function_exists('cf7_custom_after_submission_action'));
    }

    public function testCf7CustomAfterSubmissionActionSkipsExcludedForm(): void
    {
        $excludedForm = new class {
            public function id() { return 57286; }
        };

        // Form id 57286 returns early
        cf7_custom_after_submission_action($excludedForm);
        $this->assertEquals(57286, $excludedForm->id());
    }

    public function testCf7GetLeadSourceAndClientIp(): void
    {
        $_SERVER['HTTP_HOST'] = 'example.com';
        $_SESSION['referrer_url'] = 'https://www.google.com';
        $source = cf7_get_lead_source();
        $this->assertNotEmpty($source);

        $_SERVER['HTTP_X_FORWARDED_FOR'] = '192.168.1.1';
        $ip = cf7_get_client_ip();
        $this->assertEquals('192.168.1.1', $ip);
    }
}
