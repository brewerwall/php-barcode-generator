<?php

namespace Test\Unit\I25;

use Brewerwall\Barcode\BarcodeGenerator;
use Brewerwall\Barcode\Constants\BarcodeRender;
use Brewerwall\Barcode\Constants\BarcodeType;
use Test\BaseTestCase;

class I25Test extends BaseTestCase
{
    const VALID_CODE = '081231723897';

    public function test_I25GeneratesJPGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_INTERLEAVED_2_5, BarcodeRender::RENDER_JPG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('JPEG', $generated);
    }

    public function test_I25GeneratesJPGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_INTERLEAVED_2_5, BarcodeRender::RENDER_JPG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/I25.jpg'), $generator->generate(self::VALID_CODE));
    }

    public function test_I25GeneratesPNGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_INTERLEAVED_2_5, BarcodeRender::RENDER_PNG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertEquals('PNG', substr($generated, 1, 3));
    }

    public function test_I25GeneratesPNGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_INTERLEAVED_2_5, BarcodeRender::RENDER_PNG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/I25.png'), $generator->generate(self::VALID_CODE));
    }

    public function test_I25GeneratesHTMLStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_INTERLEAVED_2_5, BarcodeRender::RENDER_HTML);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<div', $generated);
    }

    public function test_I25GeneratesHTMLFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_INTERLEAVED_2_5, BarcodeRender::RENDER_HTML);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/I25.html'), $generator->generate(self::VALID_CODE));
    }

    public function test_I25GeneratesSVGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_INTERLEAVED_2_5, BarcodeRender::RENDER_SVG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<svg', $generated);
    }

    public function test_I25GeneratesSVGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_INTERLEAVED_2_5, BarcodeRender::RENDER_SVG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/I25.svg'), $generator->generate(self::VALID_CODE));
    }

    public function test_I25ChecksumGeneratesJPGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_INTERLEAVED_2_5_CHECKSUM, BarcodeRender::RENDER_JPG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('JPEG', $generated);
    }

    public function test_I25ChecksumGeneratesJPGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_INTERLEAVED_2_5_CHECKSUM, BarcodeRender::RENDER_JPG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/I25Checksum.jpg'), $generator->generate(self::VALID_CODE));
    }

    public function test_I25ChecksumGeneratesPNGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_INTERLEAVED_2_5_CHECKSUM, BarcodeRender::RENDER_PNG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertEquals('PNG', substr($generated, 1, 3));
    }

    public function test_I25ChecksumGeneratesPNGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_INTERLEAVED_2_5_CHECKSUM, BarcodeRender::RENDER_PNG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/I25Checksum.png'), $generator->generate(self::VALID_CODE));
    }

    public function test_I25ChecksumGeneratesHTMLStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_INTERLEAVED_2_5_CHECKSUM, BarcodeRender::RENDER_HTML);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<div', $generated);
    }

    public function test_I25ChecksumGeneratesHTMLFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_INTERLEAVED_2_5_CHECKSUM, BarcodeRender::RENDER_HTML);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/I25Checksum.html'), $generator->generate(self::VALID_CODE));
    }

    public function test_I25ChecksumGeneratesSVGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_INTERLEAVED_2_5_CHECKSUM, BarcodeRender::RENDER_SVG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<svg', $generated);
    }

    public function test_I25ChecksumGeneratesSVGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_INTERLEAVED_2_5_CHECKSUM, BarcodeRender::RENDER_SVG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/I25Checksum.svg'), $generator->generate(self::VALID_CODE));
    }
}
