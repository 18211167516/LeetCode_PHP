<?php


class Solution {

    /**
     * @param String $a
     * @param String $b
     * @return String
     */
    function addBinary($a, $b)
    {
        $aLen = strlen($a);
        $bLen = strlen($b);
        if ($aLen<$bLen) {
            list($a, $b, $aLen, $bLen) = [$b,$a,$bLen,$aLen];
        }
        $L = $aLen;//设定最大的就是a

        $carry = 0;
        $j=$bLen-1;
        $sb = [];
        for ($i=$L-1;$i>=0;--$i) {
            if ($a[$i] == '1') {
                $carry++;
            }
            if ($j>-1 && $b[$j--] == '1') {
                $carry++;
            }
            if ($carry % 2 ==1) {
                $sb[] = 1;
            } else {
                $sb[] = 0;
            }

            $carry /= 2;
        }
        if ($carry == 1) {
            $sb[] = 1;
        }
        return implode('', array_reverse($sb));
    }

}

$a = new Solution();


print_r($a->addBinary('11','1'));