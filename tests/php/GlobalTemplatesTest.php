<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class GlobalTemplatesTest extends TestCase
{
    private function renderTemplate(string $relativePath, array $args = [], string $requestUri = '/hire-mern-developer/'): string
    {
        $_SERVER['REQUEST_URI'] = $requestUri;
        $file = dirname(__DIR__, 2) . '/' . $relativePath;
        
        ob_start();
        try {
            include $file;
            return (string) ob_get_clean();
        } catch (\Throwable $e) {
            if (ob_get_level() > 0) {
                ob_end_clean();
            }
            throw $e;
        }
    }

    public function testHireDeveloperBannerSectionRendering(): void
    {
        $html1 = $this->renderTemplate('themes/Elsner-Revemp/template-parts/global-template/hire-developer-banner-section.php', ['post_id' => 123], '/hire-mern-developer/');
        $this->assertNotEmpty($html1);
        $this->assertStringContainsString('hire-developer-banner', $html1);

        $html2 = $this->renderTemplate('themes/Elsner-Revemp/template-parts/global-template/hire-developer-banner-section.php', ['post_id' => 123], '/hire-php-developer/');
        $this->assertNotEmpty($html2);
    }

    public function testHiringStepSectionRendering(): void
    {
        $html1 = $this->renderTemplate('themes/Elsner-Revemp/template-parts/global-template/hiring-step-section.php', ['post_id' => 123], '/hire-mern-developer/');
        $this->assertNotEmpty($html1);
        $this->assertStringContainsString('hiring-step-wrapper', $html1);

        $html2 = $this->renderTemplate('themes/Elsner-Revemp/template-parts/global-template/hiring-step-section.php', ['post_id' => 123], '/hire-magento-developer/');
        $this->assertNotEmpty($html2);

        $html3 = $this->renderTemplate('themes/Elsner-Revemp/template-parts/global-template/hiring-step-section.php', ['post_id' => 123], '/hire-php-developer/');
        $this->assertNotEmpty($html3);
    }

    public function testRequestQuoteSectionRendering(): void
    {
        $html1 = $this->renderTemplate('themes/Elsner-Revemp/template-parts/global-template/request-quote-section.php', ['post_id' => 123], '/hire-mern-developer/');
        $this->assertNotEmpty($html1);
        $this->assertStringContainsString('request-quote', $html1);

        $html2 = $this->renderTemplate('themes/Elsner-Revemp/template-parts/global-template/request-quote-section.php', ['post_id' => 123], '/hire-php-developer/');
        $this->assertNotEmpty($html2);
    }

    public function testTalkToUsSectionRendering(): void
    {
        $html1 = $this->renderTemplate('themes/Elsner-Revemp/template-parts/global-template/talk-to-us-section.php', ['post_id' => 123], '/hire-mern-developer/');
        $this->assertNotEmpty($html1);
        $this->assertStringContainsString('talk-us-content', $html1);

        $html2 = $this->renderTemplate('themes/Elsner-Revemp/template-parts/global-template/talk-to-us-section.php', ['post_id' => 123], '/hire-php-developer/');
        $this->assertNotEmpty($html2);
    }

    public function testWhyHireSectionRendering(): void
    {
        $html1 = $this->renderTemplate('themes/Elsner-Revemp/template-parts/global-template/why-hire-section.php', ['post_id' => 123], '/hire-mern-developer/');
        $this->assertNotEmpty($html1);
        $this->assertStringContainsString('why-hire', $html1);

        $html2 = $this->renderTemplate('themes/Elsner-Revemp/template-parts/global-template/why-hire-section.php', ['post_id' => 123], '/hire-php-developer/');
        $this->assertNotEmpty($html2);
    }

    public function testPostContentRendering(): void
    {
        $html = $this->renderTemplate('themes/Elsner-Revemp/template-parts/single/post-content.php', ['post_id' => 123]);
        $this->assertNotEmpty($html);
        $this->assertStringContainsString('https://www.reddit.com/submit?url=', $html);
    }
}
