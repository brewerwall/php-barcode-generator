<?php

namespace Test\Unit\Code11;

use Brewerwall\Barcode\BarcodeGenerator;
use Brewerwall\Barcode\Constants\BarcodeRender;
use Brewerwall\Barcode\Constants\BarcodeType;
use Test\BaseTestCase;

class Code11Test extends BaseTestCase
{
    const VALID_CODE = '081231723897';

    public function test_Code11GeneratesJPGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_11, BarcodeRender::RENDER_JPG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('JPEG', $generated);
    }

    public function test_Code11GeneratesJPGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_11, BarcodeRender::RENDER_JPG);
        
        $this->assertEquals($this->getFileContents(__DIR__.'/data/Code11.jpg'), $generator->generate(self::VALID_CODE));
    }

    public function test_Code11GeneratesPNGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_11, BarcodeRender::RENDER_PNG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertEquals('PNG', substr($generated, 1, 3));
    }

    public function test_Code11GeneratesPNGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_11, BarcodeRender::RENDER_PNG);
        
        $this->assertEquals($this->getFileContents(__DIR__.'/data/Code11.png'), $generator->generate(self::VALID_CODE));
    }

    public function test_Code11GeneratesHTMLStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_11, BarcodeRender::RENDER_HTML);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<div', $generated);
    }

    public function test_Code11GeneratesHTMLFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_11, BarcodeRender::RENDER_HTML);
        
        $this->assertEquals($this->getFileContents(__DIR__.'/data/Code11.html'), $generator->generate(self::VALID_CODE));
    }

    public function test_Code11GeneratesSVGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_11, BarcodeRender::RENDER_SVG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<svg', $generated);
    }

    public function test_Code11GeneratesSVGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_11, BarcodeRender::RENDER_SVG);
        
        $this->assertEquals($this->getFileContents(__DIR__.'/data/Code11.svg'), $generator->generate(self::VALID_CODE));
    }
}
