<?php

namespace Test\Unit\PostnetPlanet;

use Brewerwall\Barcode\BarcodeGenerator;
use Brewerwall\Barcode\Constants\BarcodeRender;
use Brewerwall\Barcode\Constants\BarcodeType;
use Test\BaseTestCase;

class PostnetPlanetTest extends BaseTestCase
{
    const VALID_CODE = '081231723897';

    public function test_PostnetGeneratesJPGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_POSTNET, BarcodeRender::RENDER_JPG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('JPEG', $generated);
    }

    public function test_PostnetGeneratesJPGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_POSTNET, BarcodeRender::RENDER_JPG);
        
        $this->assertEquals($this->getFileContents(__DIR__.'/data/Postnet.jpg'), $generator->generate(self::VALID_CODE));
    }

    public function test_PostnetGeneratesPNGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_POSTNET, BarcodeRender::RENDER_PNG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertEquals('PNG', substr($generated, 1, 3));
    }

    public function test_PostnetGeneratesPNGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_POSTNET, BarcodeRender::RENDER_PNG);
        
        $this->assertEquals($this->getFileContents(__DIR__.'/data/Postnet.png'), $generator->generate(self::VALID_CODE));
    }

    public function test_PostnetGeneratesHTMLStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_POSTNET, BarcodeRender::RENDER_HTML);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<div', $generated);
    }

    public function test_PostnetGeneratesHTMLFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_POSTNET, BarcodeRender::RENDER_HTML);
        
        $this->assertEquals($this->getFileContents(__DIR__.'/data/Postnet.html'), $generator->generate(self::VALID_CODE));
    }

    public function test_PostnetGeneratesSVGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_POSTNET, BarcodeRender::RENDER_SVG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<svg', $generated);
    }

    public function test_PostnetGeneratesSVGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_POSTNET, BarcodeRender::RENDER_SVG);
        
        $this->assertEquals($this->getFileContents(__DIR__.'/data/Postnet.svg'), $generator->generate(self::VALID_CODE));
    }

    public function test_PlanetGeneratesJPGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_PLANET, BarcodeRender::RENDER_JPG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('JPEG', $generated);
    }

    public function test_PlanetGeneratesJPGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_PLANET, BarcodeRender::RENDER_JPG);
        
        $this->assertEquals($this->getFileContents(__DIR__.'/data/Planet.jpg'), $generator->generate(self::VALID_CODE));
    }

    public function test_PlanetGeneratesPNGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_PLANET, BarcodeRender::RENDER_PNG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertEquals('PNG', substr($generated, 1, 3));
    }

    public function test_PlanetGeneratesPNGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_PLANET, BarcodeRender::RENDER_PNG);
        
        $this->assertEquals($this->getFileContents(__DIR__.'/data/Planet.png'), $generator->generate(self::VALID_CODE));
    }

    public function test_PlanetGeneratesHTMLStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_PLANET, BarcodeRender::RENDER_HTML);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<div', $generated);
    }

    public function test_PlanetGeneratesHTMLFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_PLANET, BarcodeRender::RENDER_HTML);
        
        $this->assertEquals($this->getFileContents(__DIR__.'/data/Planet.html'), $generator->generate(self::VALID_CODE));
    }

    public function test_PlanetGeneratesSVGStructure()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_PLANET, BarcodeRender::RENDER_SVG);
        $generated = $generator->generate(self::VALID_CODE);

        $this->assertContains('<svg', $generated);
    }

    public function test_PlanetGeneratesSVGFile()
    {
        $generator = new BarcodeGenerator(BarcodeType::TYPE_PLANET, BarcodeRender::RENDER_SVG);
        
        $this->assertEquals($this->getFileContents(__DIR__.'/data/Planet.svg'), $generator->generate(self::VALID_CODE));
    }
}
