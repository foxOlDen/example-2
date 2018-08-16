<?php

namespace src\model;

/**
 * Class MathOperationBig класс для работы с большими числами без соответствующей библиотеки
 */
class MathOperationBig
{
    /**
     * Алгоритм сложения в столбик
     * @param $value1
     * @param $value2
     * @return string
     */
    public static function sum($value1, $value2)
    {
        $value1 = strrev($value1);
        $value2 = strrev($value2);
        $symbolCnt1 = strlen($value1);
        $symbolCnt2 = strlen($value2);
        $diffCntSymbol = abs($symbolCnt1 - $symbolCnt2);
        if ($diffCntSymbol > 0) {
            if ($symbolCnt1 > $symbolCnt2) {
                $value2 .= str_repeat('0', $diffCntSymbol);
            } else {
                $value1 .= str_repeat('0', $diffCntSymbol);
            }
        }
        $countSymbol = strlen($value1);
        $inMind = 0;
        $resultSum = '';
        for ($i=0; $i < $countSymbol; $i++) {
            $sum = $value1[$i] + $value2[$i] + $inMind;
            if ($sum > 9) {
                $inMind = 1;
                $resultSum .= $sum - 10;
            } else {
                $inMind = 0;
                $resultSum .= $sum;
            }
        }
        $resultSum .= ($inMind == 1) ? 1 : '';
        return strrev($resultSum);
    }
}