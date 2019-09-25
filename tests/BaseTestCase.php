<?php

namespace Test;

use PHPUnit\Framework\TestCase;

class BaseTestCase extends TestCase
{
    protected function getFileContents(string $filePath)
    {
        return file_get_contents($filePath);
    }
}