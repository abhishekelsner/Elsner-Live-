<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class SingleTemplatesTest extends TestCase
{
    private function renderSingleTemplate(string $fileName): string
    {
        $file = dirname(__DIR__, 2) . '/themes/Elsner-Revemp/' . $fileName;
        ob_start();
        include $file;
        return ob_get_clean();
    }

    public function testSinglePhp(): void
    {
        $output = $this->renderSingleTemplate('single.php');
        $this->assertIsString($output);
    }

    public function testSingleCaseStudyPhp(): void
    {
        $output = $this->renderSingleTemplate('single-case-study.php');
        $this->assertIsString($output);
    }

    public function testSinglePortfolioPhp(): void
    {
        $output = $this->renderSingleTemplate('single-portfolio.php');
        $this->assertIsString($output);
    }

    public function testSingleProductPhp(): void
    {
        $output = $this->renderSingleTemplate('single-product.php');
        $this->assertIsString($output);
    }

    public function testSingleSolutionPhp(): void
    {
        $output = $this->renderSingleTemplate('single-solution.php');
        $this->assertIsString($output);
    }
}
