<?php

namespace Test\Unit\C128;

use Brewerwall\Barcode\BarcodeGenerator;
use Brewerwall\Barcode\Constants\BarcodeRender;
use Brewerwall\Barcode\Constants\BarcodeType;
use Brewerwall\Barcode\Exceptions\InvalidCharacterException;
use Brewerwall\Barcode\Exceptions\InvalidLengthException;
use Test\BaseTestCase;

class C128Test extends BaseTestCase
{
    const VALID_CODE = '081231723897';

    public function test_C128GeneratesJPGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_128, BarcodeRender::RENDER_JPG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('JPEG', $generated);
    }

    public function test_C128GeneratesJPGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_128, BarcodeRender::RENDER_JPG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/C128.jpg'), $generator->generate(self::VALID_CODE));
    }

    public function test_C128GeneratesJPGStructureWithNonNumericCode()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_128, BarcodeRender::RENDER_JPG);
        $generated = $generator->generate('0812|31723|897');

        $this->assertContains('JPEG', $generated);
    }

    public function test_C128GeneratesPNGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_128, BarcodeRender::RENDER_PNG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertEquals('PNG', substr($generated, 1, 3));
    }

    public function test_C128GeneratesPNGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_128, BarcodeRender::RENDER_PNG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/C128.png'), $generator->generate(self::VALID_CODE));
    }

    public function test_C128GeneratesHTMLStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_128, BarcodeRender::RENDER_HTML);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<div', $generated);
    }

    public function test_C128GeneratesHTMLFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_128, BarcodeRender::RENDER_HTML);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/C128.html'), $generator->generate(self::VALID_CODE));
    }

    public function test_C128GeneratesSVGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_128, BarcodeRender::RENDER_SVG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<svg', $generated);
    }

    public function test_C128GeneratesSVGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_128, BarcodeRender::RENDER_SVG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/C128.svg'), $generator->generate(self::VALID_CODE));
    }

    public function test_C128AGeneratesJPGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_128_A, BarcodeRender::RENDER_JPG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('JPEG', $generated);
    }

    public function test_C128AGeneratesJPGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_128_A, BarcodeRender::RENDER_JPG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/C128A.jpg'), $generator->generate(self::VALID_CODE));
    }

    public function test_C128AGeneratesPNGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_128_A, BarcodeRender::RENDER_PNG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertEquals('PNG', substr($generated, 1, 3));
    }

    public function test_C128AGeneratesPNGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_128_A, BarcodeRender::RENDER_PNG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/C128A.png'), $generator->generate(self::VALID_CODE));
    }

    public function test_C128AGeneratesHTMLStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_128_A, BarcodeRender::RENDER_HTML);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<div', $generated);
    }

    public function test_C128AGeneratesHTMLFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_128_A, BarcodeRender::RENDER_HTML);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/C128A.html'), $generator->generate(self::VALID_CODE));
    }

    public function test_C128AGeneratesSVGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_128_A, BarcodeRender::RENDER_SVG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<svg', $generated);
    }

    public function test_C128AGeneratesSVGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_128_A, BarcodeRender::RENDER_SVG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/C128A.svg'), $generator->generate(self::VALID_CODE));
    }

    public function test_C128AThrowExceptionWithInvalidCharacters()
    {
        $this->expectException(InvalidCharacterException::class);

        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_128_A, BarcodeRender::RENDER_JPG);
        $generator->generate('0812|31723|897');
    }

    public function test_C128BGeneratesJPGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_128_B, BarcodeRender::RENDER_JPG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('JPEG', $generated);
    }

    public function test_C128BGeneratesJPGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_128_B, BarcodeRender::RENDER_JPG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/C128B.jpg'), $generator->generate(self::VALID_CODE));
    }

    public function test_C128BGeneratesPNGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_128_B, BarcodeRender::RENDER_PNG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertEquals('PNG', substr($generated, 1, 3));
    }

    public function test_C128BGeneratesPNGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_128_B, BarcodeRender::RENDER_PNG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/C128B.png'), $generator->generate(self::VALID_CODE));
    }

    public function test_C128BGeneratesHTMLStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_128_B, BarcodeRender::RENDER_HTML);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<div', $generated);
    }

    public function test_C128BGeneratesHTMLFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_128_B, BarcodeRender::RENDER_HTML);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/C128B.html'), $generator->generate(self::VALID_CODE));
    }

    public function test_C128BGeneratesSVGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_128_B, BarcodeRender::RENDER_SVG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<svg', $generated);
    }

    public function test_C128BGeneratesSVGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_128_B, BarcodeRender::RENDER_SVG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/C128B.svg'), $generator->generate(self::VALID_CODE));
    }
    
    public function test_C128CGeneratesJPGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_128_C, BarcodeRender::RENDER_JPG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('JPEG', $generated);
    }

    public function test_C128CGeneratesJPGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_128_C, BarcodeRender::RENDER_JPG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/C128C.jpg'), $generator->generate(self::VALID_CODE));
    }

    public function test_C128CGeneratesPNGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_128_C, BarcodeRender::RENDER_PNG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertEquals('PNG', substr($generated, 1, 3));
    }

    public function test_C128CGeneratesPNGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_128_C, BarcodeRender::RENDER_PNG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/C128C.png'), $generator->generate(self::VALID_CODE));
    }

    public function test_C128CGeneratesHTMLStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_128_C, BarcodeRender::RENDER_HTML);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<div', $generated);
    }

    public function test_C128CGeneratesHTMLFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_128_C, BarcodeRender::RENDER_HTML);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/C128C.html'), $generator->generate(self::VALID_CODE));
    }

    public function test_C128CGeneratesSVGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_128_C, BarcodeRender::RENDER_SVG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<svg', $generated);
    }

    public function test_C128CGeneratesSVGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_128_C, BarcodeRender::RENDER_SVG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/C128C.svg'), $generator->generate(self::VALID_CODE));
    }

    public function test_C128CThrowExceptionWithUnevenCharacterLength()
    {
        $this->expectException(InvalidLengthException::class);

        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_128_C, BarcodeRender::RENDER_JPG);
        $generator->generate('81231723897');
    }
}
