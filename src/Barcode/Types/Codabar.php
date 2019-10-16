<?php

namespace Brewerwall\Barcode\Types;

use Brewerwall\Barcode\Exceptions\InvalidCharacterException;

class Codabar extends BarcodeTypeAbstract implements BarcodeTypeInterface
{
    const CHR = [
        '0' => '11111221',
        '1' => '11112211',
        '2' => '11121121',
        '3' => '22111111',
        '4' => '11211211',
        '5' => '21111211',
        '6' => '12111121',
        '7' => '12112111',
        '8' => '12211111',
        '9' => '21121111',
        '-' => '11122111',
        '$' => '11221111',
        ':' => '21112121',
        '/' => '21211121',
        '.' => '21212111',
        '+' => '11222221',
        'A' => '11221211',
        'B' => '12121121',
        'C' => '11121221',
        'D' => '11122211',
    ];

    const ENDCAPS = 'A';

    /**
     * Generate the Codabar data.
     *
     * @param string $code
     *
     * @return array
     */
    public function generate(string $code): array
    {
        return $this->convertBarcodeArrayToNewStyle($this->barcode_codabar($code));
    }

    /**
     * CODABAR barcodes.
     * Older code often used in library systems, sometimes in blood banks.
     *
     * @param string $code code to represent
     *
     * @return array barcode representation
     */
    protected function barcode_codabar(string $code): array
    {
        $bar = $this->getBaseBar($code);
        $k = 0;
        $code = self::ENDCAPS.strtoupper($code).self::ENDCAPS;
        $len = strlen($code);
        for ($i = 0; $i < $len; ++$i) {
            if (!isset(self::CHR[$code[$i]])) {
                throw new InvalidCharacterException('Char '.$code[$i].' is unsupported');
            }

            for ($j = 0; $j < 8; ++$j) {
                $bar['bcode'][++$k] = ['t' => (0 === ($j % 2)), 'w' => self::CHR[$code[$i]][$j], 'h' => 1, 'p' => 0];
                $bar['maxw'] += self::CHR[$code[$i]][$j];
            }
        }

        return $bar;
    }
}
