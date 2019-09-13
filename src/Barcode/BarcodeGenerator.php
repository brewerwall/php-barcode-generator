<?php

namespace Brewerwall\Barcode;

use Brewerwall\Barcode\Types\BarcodeTypeFactory;
use Brewerwall\Barcode\Types\BarcodeTypeInterface;
use Brewerwall\Barcode\Renders\BarcodeRenderFactory;
use Brewerwall\Barcode\Renders\BarcodeRenderInterface;

class BarcodeGenerator
{
    /** @var BarcodeTypeInterface */
    private $barcodeType;

    /** @var BarcodeRenderInterface */
    private $barcodeRender;

    public function __construct(string $code, string $barcodeType, string $barcodeRenderType)
    {
        $barcodeTypeFactory = new BarcodeTypeFactory();
        $this->barcodeType = $barcodeTypeFactory->generateBarcodeType($code, $barcodeType);

        $barcodeRenderFactory = new BarcodeRenderFactory();
        $this->barcodeRender = $barcodeRenderFactory->generateBarcodeRender($barcodeRenderType);
    }

    public function generate(int $widthFactor = 2, int $totalHeight = 30, $color = '#000000')
    {
        return $this->barcodeRender->render($this->barcodeType->generate(), $widthFactor, $totalHeight, $color);
    }
}