<?php

namespace Test\Unit\Code39;

use Brewerwall\Barcode\BarcodeGenerator;
use Brewerwall\Barcode\Constants\BarcodeRender;
use Brewerwall\Barcode\Constants\BarcodeType;
use Test\BaseTestCase;

class Code39Test extends BaseTestCase
{
    const VALID_CODE = '081231723897';

    public function test_Code39GeneratesJPGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_39, BarcodeRender::RENDER_JPG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('JPEG', $generated);
    }

    public function test_Code39GeneratesJPGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_39, BarcodeRender::RENDER_JPG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/Code39.jpg'), $generator->generate(self::VALID_CODE));
    }

    public function test_Code39GeneratesPNGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_39, BarcodeRender::RENDER_PNG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertEquals('PNG', substr($generated, 1, 3));
    }

    public function test_Code39GeneratesPNGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_39, BarcodeRender::RENDER_PNG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/Code39.png'), $generator->generate(self::VALID_CODE));
    }

    public function test_Code39GeneratesHTMLStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_39, BarcodeRender::RENDER_HTML);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<div', $generated);
    }

    public function test_Code39GeneratesHTMLFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_39, BarcodeRender::RENDER_HTML);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/Code39.html'), $generator->generate(self::VALID_CODE));
    }

    public function test_Code39GeneratesSVGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_39, BarcodeRender::RENDER_SVG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<svg', $generated);
    }

    public function test_Code39GeneratesSVGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_39, BarcodeRender::RENDER_SVG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/Code39.svg'), $generator->generate(self::VALID_CODE));
    }

    public function test_Code39ExtendedGeneratesJPGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_39E, BarcodeRender::RENDER_JPG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('JPEG', $generated);
    }

    public function test_Code39ExtendedGeneratesJPGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_39E, BarcodeRender::RENDER_JPG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/Code39E.jpg'), $generator->generate(self::VALID_CODE));
    }

    public function test_Code39ExtendedGeneratesPNGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_39E, BarcodeRender::RENDER_PNG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertEquals('PNG', substr($generated, 1, 3));
    }

    public function test_Code39ExtendedGeneratesPNGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_39E, BarcodeRender::RENDER_PNG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/Code39E.png'), $generator->generate(self::VALID_CODE));
    }

    public function test_Code39ExtendedGeneratesHTMLStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_39E, BarcodeRender::RENDER_HTML);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<div', $generated);
    }

    public function test_Code39ExtendedGeneratesHTMLFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_39E, BarcodeRender::RENDER_HTML);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/Code39E.html'), $generator->generate(self::VALID_CODE));
    }

    public function test_Code39ExtendedGeneratesSVGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_39E, BarcodeRender::RENDER_SVG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<svg', $generated);
    }

    public function test_Code39ExtendedGeneratesSVGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_39E, BarcodeRender::RENDER_SVG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/Code39E.svg'), $generator->generate(self::VALID_CODE));
    }

    public function test_Code39ChecksumGeneratesJPGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_39_CHECKSUM, BarcodeRender::RENDER_JPG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('JPEG', $generated);
    }

    public function test_Code39ChecksumGeneratesJPGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_39_CHECKSUM, BarcodeRender::RENDER_JPG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/Code39Checksum.jpg'), $generator->generate(self::VALID_CODE));
    }

    public function test_Code39ChecksumGeneratesPNGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_39_CHECKSUM, BarcodeRender::RENDER_PNG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertEquals('PNG', substr($generated, 1, 3));
    }

    public function test_Code39ChecksumGeneratesPNGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_39_CHECKSUM, BarcodeRender::RENDER_PNG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/Code39Checksum.png'), $generator->generate(self::VALID_CODE));
    }

    public function test_Code39ChecksumGeneratesHTMLStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_39_CHECKSUM, BarcodeRender::RENDER_HTML);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<div', $generated);
    }

    public function test_Code39ChecksumGeneratesHTMLFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_39_CHECKSUM, BarcodeRender::RENDER_HTML);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/Code39Checksum.html'), $generator->generate(self::VALID_CODE));
    }

    public function test_Code39ChecksumGeneratesSVGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_39_CHECKSUM, BarcodeRender::RENDER_SVG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<svg', $generated);
    }

    public function test_Code39ChecksumGeneratesSVGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_39_CHECKSUM, BarcodeRender::RENDER_SVG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/Code39Checksum.svg'), $generator->generate(self::VALID_CODE));
    }

    public function test_Code39ExtendedChecksumGeneratesJPGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_39E_CHECKSUM, BarcodeRender::RENDER_JPG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('JPEG', $generated);
    }

    public function test_Code39ExtendedChecksumGeneratesJPGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_39E_CHECKSUM, BarcodeRender::RENDER_JPG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/Code39EChecksum.jpg'), $generator->generate(self::VALID_CODE));
    }

    public function test_Code39ExtendedChecksumGeneratesPNGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_39E_CHECKSUM, BarcodeRender::RENDER_PNG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertEquals('PNG', substr($generated, 1, 3));
    }

    public function test_Code39ExtendedChecksumGeneratesPNGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_39E_CHECKSUM, BarcodeRender::RENDER_PNG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/Code39EChecksum.png'), $generator->generate(self::VALID_CODE));
    }

    public function test_Code39ExtendedChecksumGeneratesHTMLStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_39E_CHECKSUM, BarcodeRender::RENDER_HTML);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<div', $generated);
    }
    
    public function test_Code39ExtendedChecksumGeneratesHTMLFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_39E_CHECKSUM, BarcodeRender::RENDER_HTML);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/Code39EChecksum.html'), $generator->generate(self::VALID_CODE));
    }

    public function test_Code39ExtendedChecksumGeneratesSVGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_39E_CHECKSUM, BarcodeRender::RENDER_SVG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<svg', $generated);
    }

    public function test_Code39ExtendedChecksumGeneratesSVGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_CODE_39E_CHECKSUM, BarcodeRender::RENDER_SVG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/Code39EChecksum.svg'), $generator->generate(self::VALID_CODE));
    }
}
