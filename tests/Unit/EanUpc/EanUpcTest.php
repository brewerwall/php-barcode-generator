<?php

namespace Test\Unit\EanUpc;

use Brewerwall\Barcode\BarcodeGenerator;
use Brewerwall\Barcode\Constants\BarcodeRender;
use Brewerwall\Barcode\Constants\BarcodeType;
use Test\BaseTestCase;

class EanUpcTest extends BaseTestCase
{
    const VALID_CODE_EAN_8 = '96385074';
    const VALID_CODE_EAN_13 = '5901234123457';
    const VALID_CODE_UPC_A = '8123175';
    const VALID_CODE_UPC_E = '8123175';

    public function test_EanUpc8GeneratesJPGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_EAN_8, BarcodeRender::RENDER_JPG);
        $generated = $generator->generate(self::VALID_CODE_EAN_8);

        $this->assertContains('JPEG', $generated);
    }

    public function test_EanUpc8GeneratesJPGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_EAN_8, BarcodeRender::RENDER_JPG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/Ean8.jpg'), $generator->generate(self::VALID_CODE_EAN_8));
    }

    public function test_EanUpc8GeneratesPNGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_EAN_8, BarcodeRender::RENDER_PNG);
        $generated = $generator->generate(self::VALID_CODE_EAN_8);

        $this->assertEquals('PNG', substr($generated, 1, 3));
    }

    public function test_EanUpc8GeneratesPNGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_EAN_8, BarcodeRender::RENDER_PNG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/Ean8.png'), $generator->generate(self::VALID_CODE_EAN_8));
    }

    public function test_EanUpc8GeneratesHTMLStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_EAN_8, BarcodeRender::RENDER_HTML);
        $generated = $generator->generate(self::VALID_CODE_EAN_8);

        $this->assertContains('<div', $generated);
    }

    public function test_EanUpc8GeneratesHTMLFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_EAN_8, BarcodeRender::RENDER_HTML);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/Ean8.html'), $generator->generate(self::VALID_CODE_EAN_8));
    }

    public function test_EanUpc8GeneratesSVGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_EAN_8, BarcodeRender::RENDER_SVG);
        $generated = $generator->generate(self::VALID_CODE_EAN_8);

        $this->assertContains('<svg', $generated);
    }

    public function test_EanUpc8GeneratesSVGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_EAN_8, BarcodeRender::RENDER_SVG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/Ean8.svg'), $generator->generate(self::VALID_CODE_EAN_8));
    }

    public function test_EanUpc13GeneratesJPGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_EAN_13, BarcodeRender::RENDER_JPG);
        $generated = $generator->generate(self::VALID_CODE_EAN_13);

        $this->assertContains('JPEG', $generated);
    }

    public function test_EanUpc13GeneratesJPGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_EAN_13, BarcodeRender::RENDER_JPG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/Ean13.jpg'), $generator->generate(self::VALID_CODE_EAN_13));
    }

    public function test_EanUpc13GeneratesPNGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_EAN_13, BarcodeRender::RENDER_PNG);
        $generated = $generator->generate(self::VALID_CODE_EAN_13);

        $this->assertEquals('PNG', substr($generated, 1, 3));
    }

    public function test_EanUpc13GeneratesPNGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_EAN_13, BarcodeRender::RENDER_PNG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/Ean13.png'), $generator->generate(self::VALID_CODE_EAN_13));
    }

    public function test_EanUpc13GeneratesHTMLStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_EAN_13, BarcodeRender::RENDER_HTML);
        $generated = $generator->generate(self::VALID_CODE_EAN_13);

        $this->assertContains('<div', $generated);
    }

    public function test_EanUpc13GeneratesHTMLFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_EAN_13, BarcodeRender::RENDER_HTML);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/Ean13.html'), $generator->generate(self::VALID_CODE_EAN_13));
    }

    public function test_EanUpc13GeneratesSVGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_EAN_13, BarcodeRender::RENDER_SVG);
        $generated = $generator->generate(self::VALID_CODE_EAN_13);

        $this->assertContains('<svg', $generated);
    }

    public function test_EanUpc13GeneratesSVGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_EAN_13, BarcodeRender::RENDER_SVG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/Ean13.svg'), $generator->generate(self::VALID_CODE_EAN_13));
    }

    public function test_EanUpcAGeneratesJPGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_UPC_A, BarcodeRender::RENDER_JPG);
        $generated = $generator->generate(self::VALID_CODE_UPC_A);

        $this->assertContains('JPEG', $generated);
    }

    public function test_EanUpcAGeneratesJPGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_UPC_A, BarcodeRender::RENDER_JPG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/UpcA.jpg'), $generator->generate(self::VALID_CODE_UPC_A));
    }

    public function test_EanUpcAGeneratesPNGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_UPC_A, BarcodeRender::RENDER_PNG);
        $generated = $generator->generate(self::VALID_CODE_UPC_A);

        $this->assertEquals('PNG', substr($generated, 1, 3));
    }

    public function test_EanUpcAGeneratesPNGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_UPC_A, BarcodeRender::RENDER_PNG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/UpcA.png'), $generator->generate(self::VALID_CODE_UPC_A));
    }

    public function test_EanUpcAGeneratesHTMLStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_UPC_A, BarcodeRender::RENDER_HTML);
        $generated = $generator->generate(self::VALID_CODE_UPC_A);

        $this->assertContains('<div', $generated);
    }

    public function test_EanUpcAGeneratesHTMlFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_UPC_A, BarcodeRender::RENDER_HTML);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/UpcA.html'), $generator->generate(self::VALID_CODE_UPC_A));
    }

    public function test_EanUpcAGeneratesSVGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_UPC_A, BarcodeRender::RENDER_SVG);
        $generated = $generator->generate(self::VALID_CODE_UPC_A);

        $this->assertContains('<svg', $generated);
    }

    public function test_EanUpcAGeneratesSVGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_UPC_A, BarcodeRender::RENDER_SVG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/UpcA.svg'), $generator->generate(self::VALID_CODE_UPC_A));
    }

    public function test_EanUpcEGeneratesJPGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_UPC_E, BarcodeRender::RENDER_JPG);
        $generated = $generator->generate(self::VALID_CODE_UPC_E);

        $this->assertContains('JPEG', $generated);
    }

    public function test_EanUpcEGeneratesJPGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_UPC_E, BarcodeRender::RENDER_JPG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/UpcE.jpg'), $generator->generate(self::VALID_CODE_UPC_E));
    }

    public function test_EanUpcEGeneratesPNGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_UPC_E, BarcodeRender::RENDER_PNG);
        $generated = $generator->generate(self::VALID_CODE_UPC_E);

        $this->assertEquals('PNG', substr($generated, 1, 3));
    }

    public function test_EanUpcEGeneratesPNGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_UPC_E, BarcodeRender::RENDER_PNG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/UpcE.png'), $generator->generate(self::VALID_CODE_UPC_E));
    }

    public function test_EanUpcEGeneratesHTMLStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_UPC_E, BarcodeRender::RENDER_HTML);
        $generated = $generator->generate(self::VALID_CODE_UPC_E);

        $this->assertContains('<div', $generated);
    }

    public function test_EanUpcEGeneratesHTMLFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_UPC_E, BarcodeRender::RENDER_HTML);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/UpcE.html'), $generator->generate(self::VALID_CODE_UPC_E));
    }

    public function test_EanUpcEGeneratesSVGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_UPC_E, BarcodeRender::RENDER_SVG);
        $generated = $generator->generate(self::VALID_CODE_UPC_E);

        $this->assertContains('<svg', $generated);
    }

    public function test_EanUpcEGeneratesSVGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_UPC_E, BarcodeRender::RENDER_SVG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/UpcE.svg'), $generator->generate(self::VALID_CODE_UPC_E));
    }
}
