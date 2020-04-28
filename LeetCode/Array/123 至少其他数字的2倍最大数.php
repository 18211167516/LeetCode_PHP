<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function dominantIndex($nums) {
        $len = count($nums);
        $maxIndex = 0;
        for($i = 0;$i<$len;$i++){
            if($nums[$i]>$nums[$maxIndex]){
                $maxIndex = $i;
            }
        }

        for($i=0;$i<$len;$i++){
            if($i!=$maxIndex && $nums[$maxIndex]>>1<$nums[$i]){
                return -1;
            }   
        }

        return $maxIndex;
    }
}

$a =new Solution();

$nums= [-1,-2,-3,7];
print_r($a->dominantIndex($nums));