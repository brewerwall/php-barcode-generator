<?php

namespace Test\Unit\Code93;

use Brewerwall\Barcode\BarcodeGenerator;
use Brewerwall\Barcode\Constants\BarcodeRender;
use Brewerwall\Barcode\Constants\BarcodeType;
use Test\BaseTestCase;

class Code93Test extends BaseTestCase
{
    const VALID_CODE = '081231723897';

    public function test_Code93GeneratesJPGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_93, BarcodeRender::RENDER_JPG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('JPEG', $generated);
    }

    public function test_Code93GeneratesJPGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_93, BarcodeRender::RENDER_JPG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/Code93.jpg'), $generator->generate(self::VALID_CODE));
    }

    public function test_Code93GeneratesPNGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_93, BarcodeRender::RENDER_PNG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertEquals('PNG', substr($generated, 1, 3));
    }

    public function test_Code93GeneratesPNGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_93, BarcodeRender::RENDER_PNG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/Code93.png'), $generator->generate(self::VALID_CODE));
    }

    public function test_Code93GeneratesHTMLStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_93, BarcodeRender::RENDER_HTML);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<div', $generated);
    }

    public function test_Code93GeneratesHTMLFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_93, BarcodeRender::RENDER_HTML);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/Code93.html'), $generator->generate(self::VALID_CODE));
    }

    public function test_Code93GeneratesSVGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_93, BarcodeRender::RENDER_SVG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<svg', $generated);
    }

    public function test_Code93GeneratesSVGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_93, BarcodeRender::RENDER_SVG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/Code93.svg'), $generator->generate(self::VALID_CODE));
    }
}
