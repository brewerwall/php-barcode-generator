<?php

namespace Brewerwall\Barcode\Types;

class PharmaCode extends BarcodeTypeAbstract implements BarcodeTypeInterface
{
    const SEQUENCE_EVEN = '11100';

    const SEQUENCE_ODD = '100';

    /**
     * Generate the PharmaCode data.
     *
     * @param string $code
     *
     * @return array
     */
    public function generate(string $code): array
    {
        return $this->convertBarcodeArrayToNewStyle($this->barcodePharmacode($code));
    }

    /**
     * Pharmacode
     * Contains digits (0 to 9).
     *
     * @param string $code code to represent
     *
     * @return array barcode representation
     */
    protected function barcodePharmacode(string $code): array
    {
        $sequence = '';
        $code = intval($code);
        while ($code > 0) {
            if (0 === ($code % 2)) {
                $sequence .= self::SEQUENCE_EVEN;
                $code -= 2;
            } else {
                $sequence .= self::SEQUENCE_ODD;
                --$code;
            }
            $code /= 2;
        }
        $sequence = substr($sequence, 0, -2);
        $sequence = strrev($sequence);
        $bar = $this->getBaseBar((string) $code);

        return $this->binarySequenceToArray($sequence, $bar);
    }
}
