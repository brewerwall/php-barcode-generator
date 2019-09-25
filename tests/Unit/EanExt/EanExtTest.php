<?php

namespace Test\Unit\EanExt;

use Brewerwall\Barcode\BarcodeGenerator;
use Brewerwall\Barcode\Constants\BarcodeRender;
use Brewerwall\Barcode\Constants\BarcodeType;
use Test\BaseTestCase;

class EanExtTest extends BaseTestCase
{
    const VALID_CODE = '081231723897';

    public function test_EanExt2GeneratesJPGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_EAN_2, BarcodeRender::RENDER_JPG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('JPEG', $generated);
    }

    public function test_EanExt2GeneratesJPGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_EAN_2, BarcodeRender::RENDER_JPG);
        
        $this->assertEquals($this->getFileContents(__DIR__.'/data/Ean2.jpg'), $generator->generate(self::VALID_CODE));
    }

    public function test_EanExt2GeneratesPNGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_EAN_2, BarcodeRender::RENDER_PNG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertEquals('PNG', substr($generated, 1, 3));
    }

    public function test_EanExt2GeneratesPNGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_EAN_2, BarcodeRender::RENDER_PNG);
        
        $this->assertEquals($this->getFileContents(__DIR__.'/data/Ean2.png'), $generator->generate(self::VALID_CODE));
    }

    public function test_EanExt2GeneratesHTMLStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_EAN_2, BarcodeRender::RENDER_HTML);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<div', $generated);
    }

    public function test_EanExt2GeneratesHTMLFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_EAN_2, BarcodeRender::RENDER_HTML);
        
        $this->assertEquals($this->getFileContents(__DIR__.'/data/Ean2.html'), $generator->generate(self::VALID_CODE));
    }

    public function test_EanExt2GeneratesSVGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_EAN_2, BarcodeRender::RENDER_SVG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<svg', $generated);
    }

    public function test_EanExt2GeneratesSVGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_EAN_2, BarcodeRender::RENDER_SVG);
        
        $this->assertEquals($this->getFileContents(__DIR__.'/data/Ean2.svg'), $generator->generate(self::VALID_CODE));
    }

    public function test_EanExt5GeneratesJPGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_EAN_5, BarcodeRender::RENDER_JPG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('JPEG', $generated);
    }

    public function test_EanExt5GeneratesJPGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_EAN_5, BarcodeRender::RENDER_JPG);
        
        $this->assertEquals($this->getFileContents(__DIR__.'/data/Ean5.jpg'), $generator->generate(self::VALID_CODE));
    }

    public function test_EanExt5GeneratesPNGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_EAN_5, BarcodeRender::RENDER_PNG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertEquals('PNG', substr($generated, 1, 3));
    }

    public function test_EanExt5GeneratesPNGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_EAN_5, BarcodeRender::RENDER_PNG);
        
        $this->assertEquals($this->getFileContents(__DIR__.'/data/Ean5.png'), $generator->generate(self::VALID_CODE));
    }

    public function test_EanExt5GeneratesHTMLStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_EAN_5, BarcodeRender::RENDER_HTML);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<div', $generated);
    }

    public function test_EanExt5GeneratesHTMLFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_EAN_5, BarcodeRender::RENDER_HTML);
        
        $this->assertEquals($this->getFileContents(__DIR__.'/data/Ean5.html'), $generator->generate(self::VALID_CODE));
    }

    public function test_EanExt5GeneratesSVGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_EAN_5, BarcodeRender::RENDER_SVG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<svg', $generated);
    }

    public function test_EanExt5GeneratesSVGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_EAN_5, BarcodeRender::RENDER_SVG);
        
        $this->assertEquals($this->getFileContents(__DIR__.'/data/Ean5.svg'), $generator->generate(self::VALID_CODE));
    }
}
