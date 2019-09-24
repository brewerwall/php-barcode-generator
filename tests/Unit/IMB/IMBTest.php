<?php

namespace Test\Unit\IMB;

use Brewerwall\Barcode\BarcodeGenerator;
use Brewerwall\Barcode\Constants\BarcodeRender;
use Brewerwall\Barcode\Constants\BarcodeType;
use Test\BaseTestCase;

class IMBTest extends BaseTestCase
{
    const VALID_CODE = '081231723897';

    public function test_IMBGeneratesJPGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_IMB, BarcodeRender::RENDER_JPG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('JPEG', $generated);
    }

    public function test_IMBGeneratesJPGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_IMB, BarcodeRender::RENDER_JPG);
        
        $this->assertEquals($this->getFileContents(__DIR__.'/data/Imb.jpg'), $generator->generate(self::VALID_CODE));
    }

    public function test_IMBGeneratesPNGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_IMB, BarcodeRender::RENDER_PNG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertEquals('PNG', substr($generated, 1, 3));
    }

    public function test_IMBGeneratesPNGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_IMB, BarcodeRender::RENDER_PNG);
        
        $this->assertEquals($this->getFileContents(__DIR__.'/data/Imb.png'), $generator->generate(self::VALID_CODE));
    }

    public function test_IMBGeneratesHTMLStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_IMB, BarcodeRender::RENDER_HTML);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<div', $generated);
    }

    public function test_IMBGeneratesHTMLFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_IMB, BarcodeRender::RENDER_HTML);
        
        $this->assertEquals($this->getFileContents(__DIR__.'/data/Imb.html'), $generator->generate(self::VALID_CODE));
    }

    public function test_IMBGeneratesSVGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_IMB, BarcodeRender::RENDER_SVG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<svg', $generated);
    }

    public function test_IMBGeneratesSVGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_IMB, BarcodeRender::RENDER_SVG);
        
        $this->assertEquals($this->getFileContents(__DIR__.'/data/Imb.svg'), $generator->generate(self::VALID_CODE));
    }
}
