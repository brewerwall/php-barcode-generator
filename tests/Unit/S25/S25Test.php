<?php

namespace Test\Unit\S25;

use Brewerwall\Barcode\BarcodeGenerator;
use Brewerwall\Barcode\Constants\BarcodeRender;
use Brewerwall\Barcode\Constants\BarcodeType;
use Test\BaseTestCase;

class S25Test extends BaseTestCase
{
    const VALID_CODE = '081231723897';

    public function test_S25GeneratesJPGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_STANDARD_2_5, BarcodeRender::RENDER_JPG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('JPEG', $generated);
    }

    public function test_S25GeneratesJPGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_STANDARD_2_5, BarcodeRender::RENDER_JPG);
        
        $this->assertEquals($this->getFileContents(__DIR__.'/data/S25.jpg'), $generator->generate(self::VALID_CODE));
    }

    public function test_S25GeneratesPNGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_STANDARD_2_5, BarcodeRender::RENDER_PNG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertEquals('PNG', substr($generated, 1, 3));
    }

    public function test_S25GeneratesPNGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_STANDARD_2_5, BarcodeRender::RENDER_PNG);
        
        $this->assertEquals($this->getFileContents(__DIR__.'/data/S25.png'), $generator->generate(self::VALID_CODE));
    }

    public function test_S25GeneratesHTMLStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_STANDARD_2_5, BarcodeRender::RENDER_HTML);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<div', $generated);
    }

    public function test_S25GeneratesHTMLFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_STANDARD_2_5, BarcodeRender::RENDER_HTML);
        
        $this->assertEquals($this->getFileContents(__DIR__.'/data/S25.html'), $generator->generate(self::VALID_CODE));
    }

    public function test_S25GeneratesSVGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_STANDARD_2_5, BarcodeRender::RENDER_SVG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<svg', $generated);
    }

    public function test_S25GeneratesSVGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_STANDARD_2_5, BarcodeRender::RENDER_SVG);
        
        $this->assertEquals($this->getFileContents(__DIR__.'/data/S25.svg'), $generator->generate(self::VALID_CODE));
    }

    public function test_S25ChecksumGeneratesJPGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_STANDARD_2_5_CHECKSUM, BarcodeRender::RENDER_JPG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('JPEG', $generated);
    }

    public function test_S25ChecksumGeneratesJPGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_STANDARD_2_5_CHECKSUM, BarcodeRender::RENDER_JPG);
        
        $this->assertEquals($this->getFileContents(__DIR__.'/data/S25Checksum.jpg'), $generator->generate(self::VALID_CODE));
    }

    public function test_S25ChecksumGeneratesPNGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_STANDARD_2_5_CHECKSUM, BarcodeRender::RENDER_PNG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertEquals('PNG', substr($generated, 1, 3));
    }

    public function test_S25ChecksumGeneratesPNGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_STANDARD_2_5_CHECKSUM, BarcodeRender::RENDER_PNG);
        
        $this->assertEquals($this->getFileContents(__DIR__.'/data/S25Checksum.png'), $generator->generate(self::VALID_CODE));
    }

    public function test_S25ChecksumGeneratesHTMLStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_STANDARD_2_5_CHECKSUM, BarcodeRender::RENDER_HTML);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<div', $generated);
    }

    public function test_S25ChecksumGeneratesHTMLFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_STANDARD_2_5_CHECKSUM, BarcodeRender::RENDER_HTML);
        
        $this->assertEquals($this->getFileContents(__DIR__.'/data/S25Checksum.html'), $generator->generate(self::VALID_CODE));
    }

    public function test_S25ChecksumGeneratesSVGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_STANDARD_2_5_CHECKSUM, BarcodeRender::RENDER_SVG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<svg', $generated);
    }

    public function test_S25ChecksumGeneratesSVGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_STANDARD_2_5_CHECKSUM, BarcodeRender::RENDER_SVG);
        
        $this->assertEquals($this->getFileContents(__DIR__.'/data/S25Checksum.svg'), $generator->generate(self::VALID_CODE));
    }
}
