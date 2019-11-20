<?php

namespace Brewerwall\Barcode\Types;

use Brewerwall\Barcode\Exceptions\InvalidCharacterException;

class I25 extends BarcodeTypeAbstract implements BarcodeTypeInterface
{
    const CHARACTER = [
        '0' => '11221',
        '1' => '21112',
        '2' => '12112',
        '3' => '22111',
        '4' => '11212',
        '5' => '21211',
        '6' => '12211',
        '7' => '11122',
        '8' => '21121',
        '9' => '12121',
        'A' => '11',
        'Z' => '21',
    ];

    const START_CODE = 'AA';

    const STOP_CODE = 'ZA';

    /** @var bool */
    protected $hasChecksum;

    public function __construct(bool $hasChecksum)
    {
        $this->hasChecksum = $hasChecksum;
    }

    /**
     * Generate the I25 data.
     *
     * @param string $code
     *
     * @return array
     */
    public function generate(string $code): array
    {
        return $this->convertBarcodeArrayToNewStyle($this->barcode_i25($code, $this->hasChecksum));
    }

    /**
     * Interleaved 2 of 5 barcodes.
     * Compact numeric code, widely used in industry, air cargo
     * Contains digits (0 to 9) and encodes the data in the width of both bars and spaces.
     *
     * @param string $code code to represent
     *
     * @return array barcode representation
     */
    protected function barcode_i25(string $code)
    {
        if ($this->hasChecksum) {
            $code .= $this->checksum_s25($code);
        }

        // Add leading zero if code-length is odd
        if ($this->isOdd(strlen($code))) {
            $code = '0'.$code;
        }

        // Add start and stop codes
        $code = self::START_CODE.strtolower($code).self::STOP_CODE;

        $bar = $this->getBaseBar($code);
        $iterator = 0;

        for ($codeIndex = 0; $codeIndex < strlen($code); $codeIndex = ($codeIndex + 2)) {
            $charBar = $code[$codeIndex];
            $charSpace = $code[$codeIndex + 1];

            if (!isset(self::CHARACTER[$charBar]) || !isset(self::CHARACTER[$charSpace])) {
                throw new InvalidCharacterException();
            }

            $sequence = $this->getBarSpaceSequence($charBar, $charSpace);
            for ($sequenceIndex = 0; $sequenceIndex < strlen($sequence); ++$sequenceIndex) {
                $bar['bcode'][$iterator] = ['t' => $this->isEven($sequenceIndex), 'w' => $sequence[$sequenceIndex], 'h' => 1, 'p' => 0];
                $bar['maxw'] += $sequence[$sequenceIndex];
                ++$iterator;
            }
        }

        return $bar;
    }

    /**
     * Get a Bar Space Sequence String.
     *
     * @param string $charBar
     * @param string $charSpace
     *
     * @return string
     */
    private function getBarSpaceSequence(string $charBar, string $charSpace): string
    {
        $sequence = '';
        for ($s = 0; $s < strlen(self::CHARACTER[$charBar]); ++$s) {
            $sequence .= self::CHARACTER[$charBar][$s].self::CHARACTER[$charSpace][$s];
        }

        return $sequence;
    }
}
