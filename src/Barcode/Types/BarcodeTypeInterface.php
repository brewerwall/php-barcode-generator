<?php

namespace Brewerwall\Barcode\Types;

interface BarcodeTypeInterface
{
    public function generate(): array;
}