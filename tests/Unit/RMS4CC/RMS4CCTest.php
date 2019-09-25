<?php

namespace Test\Unit\RMS4CC;

use Brewerwall\Barcode\BarcodeGenerator;
use Brewerwall\Barcode\Constants\BarcodeRender;
use Brewerwall\Barcode\Constants\BarcodeType;
use Test\BaseTestCase;

class RMS4CCTest extends BaseTestCase
{
    const VALID_CODE = '081231723897';

    public function test_RMS4CCGeneratesJPGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_RMS4CC, BarcodeRender::RENDER_JPG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('JPEG', $generated);
    }

    public function test_RMS4CCGeneratesJPGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_RMS4CC, BarcodeRender::RENDER_JPG);
        
        $this->assertEquals($this->getFileContents(__DIR__.'/data/Rms4cc.jpg'), $generator->generate(self::VALID_CODE));
    }

    public function test_RMS4CCGeneratesPNGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_RMS4CC, BarcodeRender::RENDER_PNG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertEquals('PNG', substr($generated, 1, 3));
    }

    public function test_RMS4CCGeneratesPNGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_RMS4CC, BarcodeRender::RENDER_PNG);
        
        $this->assertEquals($this->getFileContents(__DIR__.'/data/Rms4cc.png'), $generator->generate(self::VALID_CODE));
    }

    public function test_RMS4CCGeneratesHTMLStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_RMS4CC, BarcodeRender::RENDER_HTML);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<div', $generated);
    }

    public function test_RMS4CCGeneratesHTMLFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_RMS4CC, BarcodeRender::RENDER_HTML);
        
        $this->assertEquals($this->getFileContents(__DIR__.'/data/Rms4cc.html'), $generator->generate(self::VALID_CODE));
    }

    public function test_RMS4CCGeneratesSVGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_RMS4CC, BarcodeRender::RENDER_SVG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<svg', $generated);
    }

    public function test_RMS4CCGeneratesSVGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_RMS4CC, BarcodeRender::RENDER_SVG);
        
        $this->assertEquals($this->getFileContents(__DIR__.'/data/Rms4cc.svg'), $generator->generate(self::VALID_CODE));
    }

    public function test_RMS4CCKixGeneratesJPGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_KIX, BarcodeRender::RENDER_JPG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('JPEG', $generated);
    }

    public function test_RMS4CCKixGeneratesJPGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_KIX, BarcodeRender::RENDER_JPG);
        
        $this->assertEquals($this->getFileContents(__DIR__.'/data/Kix.jpg'), $generator->generate(self::VALID_CODE));
    }

    public function test_RMS4CCKixGeneratesPNGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_KIX, BarcodeRender::RENDER_PNG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertEquals('PNG', substr($generated, 1, 3));
    }

    public function test_RMS4CCKixGeneratesPNGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_KIX, BarcodeRender::RENDER_PNG);
        
        $this->assertEquals($this->getFileContents(__DIR__.'/data/Kix.png'), $generator->generate(self::VALID_CODE));
    }

    public function test_RMS4CCKixGeneratesHTMLStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_KIX, BarcodeRender::RENDER_HTML);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<div', $generated);
    }

    public function test_RMS4CCKixGeneratesHTMLFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_KIX, BarcodeRender::RENDER_HTML);
        
        $this->assertEquals($this->getFileContents(__DIR__.'/data/Kix.html'), $generator->generate(self::VALID_CODE));
    }

    public function test_RMS4CCKixGeneratesSVGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_KIX, BarcodeRender::RENDER_SVG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<svg', $generated);
    }

    public function test_RMS4CCKixGeneratesSVGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_KIX, BarcodeRender::RENDER_SVG);
        
        $this->assertEquals($this->getFileContents(__DIR__.'/data/Kix.svg'), $generator->generate(self::VALID_CODE));
    }
}
