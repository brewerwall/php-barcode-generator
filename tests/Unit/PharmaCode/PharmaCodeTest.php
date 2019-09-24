<?php

namespace Test\Unit\PharmaCode;

use Brewerwall\Barcode\BarcodeGenerator;
use Brewerwall\Barcode\Constants\BarcodeRender;
use Brewerwall\Barcode\Constants\BarcodeType;
use Test\BaseTestCase;

class PharmaCodeTest extends BaseTestCase
{
    const VALID_CODE = '081231723897';

    public function test_PharmaCodeGeneratesJPGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_PHARMA_CODE, BarcodeRender::RENDER_JPG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('JPEG', $generated);
    }

    public function test_PharmaCodeGeneratesJPGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_PHARMA_CODE, BarcodeRender::RENDER_JPG);
        
        $this->assertEquals($this->getFileContents(__DIR__.'/data/PharmaCode.jpg'), $generator->generate(self::VALID_CODE));
    }

    public function test_PharmaCodeGeneratesPNGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_PHARMA_CODE, BarcodeRender::RENDER_PNG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertEquals('PNG', substr($generated, 1, 3));
    }

    public function test_PharmaCodeGeneratesPNGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_PHARMA_CODE, BarcodeRender::RENDER_PNG);
        
        $this->assertEquals($this->getFileContents(__DIR__.'/data/PharmaCode.png'), $generator->generate(self::VALID_CODE));
    }

    public function test_PharmaCodeGeneratesHTMLStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_PHARMA_CODE, BarcodeRender::RENDER_HTML);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<div', $generated);
    }

    public function test_PharmaCodeGeneratesHTMLFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_PHARMA_CODE, BarcodeRender::RENDER_HTML);
        
        $this->assertEquals($this->getFileContents(__DIR__.'/data/PharmaCode.html'), $generator->generate(self::VALID_CODE));
    }

    public function test_PharmaCodeGeneratesSVGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_PHARMA_CODE, BarcodeRender::RENDER_SVG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<svg', $generated);
    }

    public function test_PharmaCodeGeneratesSVGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_PHARMA_CODE, BarcodeRender::RENDER_SVG);
        
        $this->assertEquals($this->getFileContents(__DIR__.'/data/PharmaCode.svg'), $generator->generate(self::VALID_CODE));
    }
}
