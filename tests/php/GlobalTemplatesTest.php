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
        $html = $this->renderTemplate('themes/Elsner-Revemp/template-parts/global-template/hire-developer-banner-section.php', ['post_id' => 123]);
        $this->assertNotEmpty($html);
        $this->assertStringContainsString('hire-developer-banner', $html);
    }

    public function testHiringStepSectionRendering(): void
    {
        $html = $this->renderTemplate('themes/Elsner-Revemp/template-parts/global-template/hiring-step-section.php', ['post_id' => 123]);
        $this->assertNotEmpty($html);
        $this->assertStringContainsString('hiring-step-wrapper', $html);
    }

    public function testRequestQuoteSectionRendering(): void
    {
        $html = $this->renderTemplate('themes/Elsner-Revemp/template-parts/global-template/request-quote-section.php', ['post_id' => 123]);
        $this->assertNotEmpty($html);
        $this->assertStringContainsString('request-quote', $html);
    }

    public function testTalkToUsSectionRendering(): void
    {
        $html = $this->renderTemplate('themes/Elsner-Revemp/template-parts/global-template/talk-to-us-section.php', ['post_id' => 123]);
        $this->assertNotEmpty($html);
        $this->assertStringContainsString('talk-us-content', $html);
    }

    public function testWhyHireSectionRendering(): void
    {
        $html = $this->renderTemplate('themes/Elsner-Revemp/template-parts/global-template/why-hire-section.php', ['post_id' => 123]);
        $this->assertNotEmpty($html);
        $this->assertStringContainsString('why-hire', $html);
    }

    public function testPostContentRendering(): void
    {
        $html = $this->renderTemplate('themes/Elsner-Revemp/template-parts/single/post-content.php', ['post_id' => 123]);
        $this->assertNotEmpty($html);
        $this->assertStringContainsString('https://www.reddit.com/submit?url=', $html);
    }
}
