<?php

namespace Brewerwall\Barcode\Types;

class S25 extends BarcodeTypeAbstract implements BarcodeTypeInterface
{
    const CHR = [
        '0' => '10101110111010',
        '1' => '11101010101110',
        '2' => '10111010101110',
        '3' => '11101110101010',
        '4' => '10101110101110',
        '5' => '11101011101010',
        '6' => '10111011101010',
        '7' => '10101011101110',
        '8' => '10101110111010',
        '9' => '10111010111010',
    ];

    const SEQUENCE_START = '11011010';

    const SEQUENCE_END = '1101011';

    /** @var bool */
    protected $hasChecksum;

    public function __construct(bool $hasChecksum)
    {
        $this->hasChecksum = $hasChecksum;
    }

    /**
     * Generate the S25 data.
     *
     * @param string $code
     *
     * @return array
     */
    public function generate(string $code): array
    {
        return $this->convertBarcodeArrayToNewStyle($this->barcode_s25($code, $this->hasChecksum));
    }

    /**
     * Standard 2 of 5 barcodes.
     * Used in airline ticket marking, photofinishing
     * Contains digits (0 to 9) and encodes the data only in the width of bars.
     *
     * @param string $code     code to represent
     * @param int    $checksum if true add a checksum to the code
     *
     * @return array barcode representation
     */
    protected function barcode_s25(string $code, bool $checksum = false): array
    {
        if ($checksum) {
            $code .= $this->checksum_s25($code);
        }

        // add leading zero if code-length is odd
        if (0 != (strlen($code) % 2)) {
            $code = '0'.$code;
        }

        $sequence = self::SEQUENCE_START;

        for ($stringIndex = 0; $stringIndex < strlen($code); ++$stringIndex) {
            $digit = $code[$stringIndex];
            if (!isset(self::CHR[$digit])) {
                throw new InvalidCharacterException('Char '.$digit.' is unsupported');
            }
            $sequence .= self::CHR[$digit];
        }

        $sequence .= self::SEQUENCE_END;

        return $this->binarySequenceToArray($sequence, $this->getBaseBar($code));
    }
}
