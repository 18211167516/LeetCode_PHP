<?php

class Solution {

    /**
     * @param String $s
     * @return String
     */
    function reverseVowels($s) {
        $vowels = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'];
        $L = 0;
        $R = strlen($s) - 1;
        while ($L < $R) {
            if (!in_array($s[$L], $vowels)) {
                $L++;
                continue;
            }
            if (!in_array($s[$R], $vowels)) {
                $R--;
                continue;
            }
            
            list($s[$L], $s[$R]) = [$s[$R],$s[$L]];
            $L++;
            $R--;
        }
        return $s;
    }
}

$a = new Solution();
$s = 'hello';
print_r($a->reverseVowels($s));