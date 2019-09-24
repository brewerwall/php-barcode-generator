<?php

namespace Test\Unit\Codabar;

use Brewerwall\Barcode\BarcodeGenerator;
use Brewerwall\Barcode\Constants\BarcodeRender;
use Brewerwall\Barcode\Constants\BarcodeType;
use Test\BaseTestCase;

class CodabarTest extends BaseTestCase
{
    const VALID_CODE = '081231723897';

    public function test_CodabarGeneratesJPGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODABAR, BarcodeRender::RENDER_JPG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('JPEG', $generated);
    }

    public function test_CodabarGeneratesJPGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODABAR, BarcodeRender::RENDER_JPG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/Codabar.jpg'), $generator->generate(self::VALID_CODE));
    }

    public function test_CodabarGeneratesPNGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODABAR, BarcodeRender::RENDER_PNG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertEquals('PNG', substr($generated, 1, 3));
    }

    public function test_CodabarGeneratesPNGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODABAR, BarcodeRender::RENDER_PNG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/Codabar.png'), $generator->generate(self::VALID_CODE));
    }

    public function test_CodabarGeneratesHTMLStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODABAR, BarcodeRender::RENDER_HTML);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<div', $generated);
    }

    public function test_CodabarGeneratesHTMLFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODABAR, BarcodeRender::RENDER_HTML);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/Codabar.html'), $generator->generate(self::VALID_CODE));
    }

    public function test_CodabarGeneratesSVGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODABAR, BarcodeRender::RENDER_SVG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<svg', $generated);
    }

    public function test_CodabarGeneratesSVGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODABAR, BarcodeRender::RENDER_SVG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/Codabar.svg'), $generator->generate(self::VALID_CODE));
    }
}
