<?php

namespace Test\Unit\MSI;

use Brewerwall\Barcode\BarcodeGenerator;
use Brewerwall\Barcode\Constants\BarcodeRender;
use Brewerwall\Barcode\Constants\BarcodeType;
use Test\BaseTestCase;

class MSITest extends BaseTestCase
{
    const VALID_CODE = '081231723897';

    public function test_MSIGeneratesJPGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_MSI, BarcodeRender::RENDER_JPG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('JPEG', $generated);
    }

    public function test_MSIGeneratesJPGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_MSI, BarcodeRender::RENDER_JPG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/Msi.jpg'), $generator->generate(self::VALID_CODE));
    }

    public function test_MSIGeneratesPNGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_MSI, BarcodeRender::RENDER_PNG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertEquals('PNG', substr($generated, 1, 3));
    }

    public function test_MSIGeneratesPNGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_MSI, BarcodeRender::RENDER_PNG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/Msi.png'), $generator->generate(self::VALID_CODE));
    }

    public function test_MSIGeneratesHTMLStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_MSI, BarcodeRender::RENDER_HTML);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<div', $generated);
    }

    public function test_MSIGeneratesHTMlFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_MSI, BarcodeRender::RENDER_HTML);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/Msi.html'), $generator->generate(self::VALID_CODE));
    }

    public function test_MSIGeneratesSVGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_MSI, BarcodeRender::RENDER_SVG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<svg', $generated);
    }

    public function test_MSIGeneratesSVGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_MSI, BarcodeRender::RENDER_SVG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/Msi.svg'), $generator->generate(self::VALID_CODE));
    }

    public function test_MSIChecksumGeneratesJPGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_MSI_CHECKSUM, BarcodeRender::RENDER_JPG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('JPEG', $generated);
    }

    public function test_MSIChecksumGeneratesJPGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_MSI_CHECKSUM, BarcodeRender::RENDER_JPG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/MsiChecksum.jpg'), $generator->generate(self::VALID_CODE));
    }

    public function test_MSIChecksumGeneratesPNGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_MSI_CHECKSUM, BarcodeRender::RENDER_PNG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertEquals('PNG', substr($generated, 1, 3));
    }

    public function test_MSIChecksumGeneratesPNGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_MSI_CHECKSUM, BarcodeRender::RENDER_PNG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/MsiChecksum.png'), $generator->generate(self::VALID_CODE));
    }

    public function test_MSIChecksumGeneratesHTMLStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_MSI_CHECKSUM, BarcodeRender::RENDER_HTML);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<div', $generated);
    }

    public function test_MSIChecksumGeneratesHTMLFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_MSI_CHECKSUM, BarcodeRender::RENDER_HTML);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/MsiChecksum.html'), $generator->generate(self::VALID_CODE));
    }

    public function test_MSIChecksumGeneratesSVGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_MSI_CHECKSUM, BarcodeRender::RENDER_SVG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<svg', $generated);
    }

    public function test_MSIChecksumGeneratesSVGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_MSI_CHECKSUM, BarcodeRender::RENDER_SVG);
        
        $this->assertEquals(file_get_contents(__DIR__.'/data/MsiChecksum.svg'), $generator->generate(self::VALID_CODE));
    }
}
