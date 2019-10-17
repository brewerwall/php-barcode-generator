<?php

namespace Brewerwall\Barcode\Types;

class RMS4CC extends BarcodeTypeAbstract implements BarcodeTypeInterface
{
    const MAXH = 3;

    const BARMODE = [
        '0' => [3, 3, 2, 2],
        '1' => [3, 4, 1, 2],
        '2' => [3, 4, 2, 1],
        '3' => [4, 3, 1, 2],
        '4' => [4, 3, 2, 1],
        '5' => [4, 4, 1, 1],
        '6' => [3, 1, 4, 2],
        '7' => [3, 2, 3, 2],
        '8' => [3, 2, 4, 1],
        '9' => [4, 1, 3, 2],
        'A' => [4, 1, 4, 1],
        'B' => [4, 2, 3, 1],
        'C' => [3, 1, 2, 4],
        'D' => [3, 2, 1, 4],
        'E' => [3, 2, 2, 3],
        'F' => [4, 1, 1, 4],
        'G' => [4, 1, 2, 3],
        'H' => [4, 2, 1, 3],
        'I' => [1, 3, 4, 2],
        'J' => [1, 4, 3, 2],
        'K' => [1, 4, 4, 1],
        'L' => [2, 3, 3, 2],
        'M' => [2, 3, 4, 1],
        'N' => [2, 4, 3, 1],
        'O' => [1, 3, 2, 4],
        'P' => [1, 4, 1, 4],
        'Q' => [1, 4, 2, 3],
        'R' => [2, 3, 1, 4],
        'S' => [2, 3, 2, 3],
        'T' => [2, 4, 1, 3],
        'U' => [1, 1, 4, 4],
        'V' => [1, 2, 3, 4],
        'W' => [1, 2, 4, 3],
        'X' => [2, 1, 3, 4],
        'Y' => [2, 1, 4, 3],
        'Z' => [2, 2, 3, 3],
    ];

    const CHECKTABLE = [
        '0' => [1, 1],
        '1' => [1, 2],
        '2' => [1, 3],
        '3' => [1, 4],
        '4' => [1, 5],
        '5' => [1, 0],
        '6' => [2, 1],
        '7' => [2, 2],
        '8' => [2, 3],
        '9' => [2, 4],
        'A' => [2, 5],
        'B' => [2, 0],
        'C' => [3, 1],
        'D' => [3, 2],
        'E' => [3, 3],
        'F' => [3, 4],
        'G' => [3, 5],
        'H' => [3, 0],
        'I' => [4, 1],
        'J' => [4, 2],
        'K' => [4, 3],
        'L' => [4, 4],
        'M' => [4, 5],
        'N' => [4, 0],
        'O' => [5, 1],
        'P' => [5, 2],
        'Q' => [5, 3],
        'R' => [5, 4],
        'S' => [5, 5],
        'T' => [5, 0],
        'U' => [0, 1],
        'V' => [0, 2],
        'W' => [0, 3],
        'X' => [0, 4],
        'Y' => [0, 5],
        'Z' => [0, 0],
    ];

    /** @var bool */
    protected $isKix;

    public function __construct(bool $isKix = false)
    {
        $this->isKix = $isKix;
    }

    /**
     * Generate the RMS4CC data.
     *
     * @param string $code
     *
     * @return array
     */
    public function generate(string $code): array
    {
        return $this->convertBarcodeArrayToNewStyle($this->barcode_rms4cc($code));
    }

    /**
     * RMS4CC - CBC - KIX
     * RMS4CC (Royal Mail 4-state Customer Code) - CBC (Customer Bar Code) - KIX (Klant index - Customer index)
     * RM4SCC is the name of the barcode symbology used by the Royal Mail for its Cleanmail service.
     *
     * @param string $code code to print
     *
     * @return array barcode representation
     */
    protected function barcode_rms4cc(string $code): array
    {
        $code = strtoupper($code);
        $codeLength = strlen($code);
        $bar = $this->getBaseBar($code, self::MAXH);

        if (!$this->isKix) {
            // table for checksum calculation (row,col)
            $row = 0;
            $col = 0;
            for ($i = 0; $i < $codeLength; ++$i) {
                $row += self::CHECKTABLE[$code[$i]][0];
                $col += self::CHECKTABLE[$code[$i]][1];
            }
            $row %= 6;
            $col %= 6;
            $chk = array_keys(self::CHECKTABLE, [$row, $col]);
            $code .= $chk[0];
            ++$codeLength;
        }
        
        $k = 0;

        if (!$this->isKix) {
            // start bar
            $bar['bcode'][$k++] = ['t' => 1, 'w' => 1, 'h' => 2, 'p' => 0];
            $bar['bcode'][$k++] = ['t' => 0, 'w' => 1, 'h' => 2, 'p' => 0];
            $bar['maxw'] += 2;
        }

        for ($i = 0; $i < $codeLength; ++$i) {
            for ($j = 0; $j < 4; ++$j) {
                $bar['bcode'][$k++] = $this->getBarMode(self::BARMODE[$code[$i]][$j]);
                $bar['bcode'][$k++] = ['t' => 0, 'w' => 1, 'h' => 2, 'p' => 0];
                $bar['maxw'] += 2;
            }
        }

        if (!$this->isKix) {
            // stop bar
            $bar['bcode'][$k++] = ['t' => 1, 'w' => 1, 'h' => 3, 'p' => 0];
            ++$bar['maxw'];
        }

        return $bar;
    }

    private function getBarMode(int $mode): array
    {
        switch ($mode) {
            case 1:
                $p = 0;
                $h = 2;
                break;

            case 2:
                $p = 0;
                $h = 3;
                break;

            case 3:
                $p = 1;
                $h = 1;
                break;

            case 4:
                $p = 1;
                $h = 2;
                break;
        }

        return ['t' => 1, 'w' => 1, 'h' => $h, 'p' => $p];
    }
}
