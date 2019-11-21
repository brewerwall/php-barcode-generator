<?php

namespace Brewerwall\Barcode\Types;

use Brewerwall\Barcode\Exceptions\InvalidCharacterException;

class MSI extends BarcodeTypeAbstract implements BarcodeTypeInterface
{
    const CHARACTER = [
        '0' => '100100100100',
        '1' => '100100100110',
        '2' => '100100110100',
        '3' => '100100110110',
        '4' => '100110100100',
        '5' => '100110100110',
        '6' => '100110110100',
        '7' => '100110110110',
        '8' => '110100100100',
        '9' => '110100100110',
        'A' => '110100110100',
        'B' => '110100110110',
        'C' => '110110100100',
        'D' => '110110100110',
        'E' => '110110110100',
        'F' => '110110110110',
    ];

    const SEQUENCE_LEFT_GUARD = '110';

    const SEQUENCE_RIGHT_GUARD = '1001';

    /** @var bool */
    protected $hasChecksum;

    public function __construct(bool $hasChecksum = false)
    {
        $this->hasChecksum = $hasChecksum;
    }

    /**
     * Generate the MSI data.
     *
     * @param string $code
     *
     * @return array
     */
    public function generate(string $code): array
    {
        return $this->convertBarcodeArrayToNewStyle($this->barcode_msi($code));
    }

    /**
     * MSI.
     * Variation of Plessey code, with similar applications
     * Contains digits (0 to 9) and encodes the data only in the width of bars.
     *
     * @param string $code code to represents
     *
     * @return array barcode representation
     */
    protected function barcode_msi(string $code): array
    {
        if ($this->hasChecksum) {
            $code = $this->getChecksumCode($code);
        }

        return $this->binarySequenceToArray($this->getSequence($code), $this->getBaseBar($code));
    }

    /**
     * Gets the sequence of the code.  Wraps the sub-sequence in guards.
     *
     * @param string $code
     *
     * @return string
     */
    private function getSequence(string $code): string
    {
        return self::SEQUENCE_LEFT_GUARD.$this->getSubSequence($code).self::SEQUENCE_RIGHT_GUARD;
    }

    /**
     * Gets the sub-sequence of the code.
     *
     * @param string $code
     *
     * @return string
     */
    private function getSubSequence(string $code): string
    {
        $sequence = '';
        foreach (str_split($code) as $character) {
            if (!isset(self::CHARACTER[$character])) {
                throw new InvalidCharacterException('Char '.$character.' is unsupported');
            }
            $sequence .= self::CHARACTER[$character];
        }

        return $sequence;
    }

    /**
     * Get Checksum Code.
     *
     * @param string $code
     *
     * @return string
     */
    private function getChecksumCode(string $code): string
    {
        $p = 2;
        $check = 0;
        for ($codeIndex = (strlen($code) - 1); $codeIndex >= 0; --$codeIndex) {
            $check += (hexdec($code[$codeIndex]) * $p++);
            if ($p > 7) {
                $p = 2;
            }
        }
        $check %= 11;
        if ($check % 11 > 0) {
            $check = 11 - $check;
        }

        return $code.$check;
    }
}
