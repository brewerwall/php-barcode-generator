<?php

namespace Brewerwall\Barcode\Types;

class PostnetPlanet extends BarcodeTypeAbstract implements BarcodeTypeInterface
{
    const MAXH = 2;

    const MAXW_INCREMENT = 2;

    const BARLENGTH_DEFAULT = [
        0 => [2, 2, 1, 1, 1],
        1 => [1, 1, 1, 2, 2],
        2 => [1, 1, 2, 1, 2],
        3 => [1, 1, 2, 2, 1],
        4 => [1, 2, 1, 1, 2],
        5 => [1, 2, 1, 2, 1],
        6 => [1, 2, 2, 1, 1],
        7 => [2, 1, 1, 1, 2],
        8 => [2, 1, 1, 2, 1],
        9 => [2, 1, 2, 1, 1],
    ];

    const BARLENGTH_PLANET = [
        0 => [1, 1, 2, 2, 2],
        1 => [2, 2, 2, 1, 1],
        2 => [2, 2, 1, 2, 1],
        3 => [2, 2, 1, 1, 2],
        4 => [2, 1, 2, 2, 1],
        5 => [2, 1, 2, 1, 2],
        6 => [2, 1, 1, 2, 2],
        7 => [1, 2, 2, 2, 1],
        8 => [1, 2, 2, 1, 2],
        9 => [1, 2, 1, 2, 2],
    ];

    const LINE_START = ['t' => 1, 'w' => 1, 'h' => 2, 'p' => 0];

    const LINE_END = ['t' => 0, 'w' => 1, 'h' => 2, 'p' => 0];

    const REMOVE_CHARACTERS = [' ', '-'];

    /** @var bool */
    protected $isPlanet;

    public function __construct(bool $isPlanet = false)
    {
        $this->isPlanet = $isPlanet;
    }

    /**
     * Generate the PostnetPlanet data.
     *
     * @param string $code
     *
     * @return array
     */
    public function generate(string $code): array
    {
        return $this->convertBarcodeArrayToNewStyle($this->barcode_postnet($code));
    }

    /**
     * POSTNET and PLANET barcodes.
     * Used by U.S. Postal Service for automated mail sorting.
     *
     * @param string $code zip code to represent. Must be a string containing a zip code of the form DDDDD orDDDDD-DDDD.
     *
     * @return array barcode representation
     */
    protected function barcode_postnet(string $code): array
    {
        $bar = $this->getBaseBar($code, self::MAXH);

        $iterator = 0;
        $code = str_replace(self::REMOVE_CHARACTERS, '', $code);
        $code .= $this->getCheckedValue($code);

        // start bar
        $bar['bcode'][$iterator++] = self::LINE_START;
        $bar['bcode'][$iterator++] = self::LINE_END;
        $bar['maxw'] += self::MAXW_INCREMENT;

        // fill bars
        for ($i = 0; $i < strlen($code); ++$i) {
            for ($j = 0; $j < 5; ++$j) {
                $height = $this->getBarLengthValue($code[$i], $j);
                $point = floor(1 / $height);
                $bar['bcode'][$iterator++] = $this->getCustomLineStart($height, $point);
                $bar['bcode'][$iterator++] = self::LINE_END;
                $bar['maxw'] += self::MAXW_INCREMENT;
            }
        }

        // end bar
        $bar['bcode'][$iterator++] = self::LINE_START;
        ++$bar['maxw'];

        return $bar;
    }

    /**
     * Get the Checked value of the code.
     *
     * @param string $code
     *
     * @return int
     */
    private function getCheckedValue(string $code): int
    {
        $sum = array_reduce(str_split($code), function ($carry, $character) {
            return $carry += (int)$character;
        });

        if ($checked = ($sum % 10) > 0) {
            $checked = (10 - $checked);
        }

        return $checked;
    }

    /**
     * Get Bar Length Value.
     *
     * @param int $firstLevel
     * @param int $ssecondLevel
     *
     * @return int
     */
    private function getBarLengthValue(int $firstLevel, int $ssecondLevel): int
    {
        if ($this->isPlanet) {
            return self::BARLENGTH_PLANET[$firstLevel][$ssecondLevel];
        }

        return self::BARLENGTH_DEFAULT[$firstLevel][$ssecondLevel];
    }

    /**
     * Get Custom Line Start Array
     *
     * @param integer $height
     * @param float $point
     * @return array
     */
    private function getCustomLineStart(int $height, float $point): array
    {
        $line = self::LINE_START;
        $line['h'] = $height;
        $line['p'] = $point;

        return $line;
    }
}
