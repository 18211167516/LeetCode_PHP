<?php

class Solution {

    /**
     * @param Integer[] $A
     * @param Integer[] $B
     * @param Integer[] $C
     * @param Integer[] $D
     * @return Integer
     */
    function fourSumCount($A, $B, $C, $D) {
        //分割成A+B
        $target = 0;
        $len = count($A);
        $map = [];
        $res = 0;
        for($a=0;$a<$len;$a++){
            for($b=0;$b<$len;$b++){
                $sumAB = $A[$a] + $B[$b];
                $isAB  = $map[$sumAB]??null;
                if($isAB!=null){
                    $map[$sumAB] +=1;
                }else{
                    $map[$sumAB] = 1;
                }
            }
        }

        for($c=0;$c<$len;$c++){
            for($d=0;$d<$len;$d++){
                $sumCD = $target-($C[$c] + $D[$d]);
                $isCD  = $map[$sumCD]??null;
                if($isCD!=null){
                    $res += $isCD;
                }
            }
        }

        return $res;
        //分割成C+D
    }
}

$s = new Solution();

$a = [1,2];
$b = [-2,-1];
$c = [-1,2];
$d = [0,2];

print_r($s->fourSumCount($a, $b, $c, $d));