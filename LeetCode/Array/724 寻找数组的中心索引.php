<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function pivotIndex($nums) {
        if (empty($nums)) {
            return -1;
        }
        $left = 0;
        $all = array_sum($nums);
        $len = count($nums);
        for($i=0;$i<$len;$i++){
            if($left == $all-$left-$nums[$i]){
                return $i;breal;
            }
            $left +=$nums[$i];
        }
        return -1;
    }
}

$a = new Solution();

$nums = [-1,-1,-1,0,1,1];

print_r($a->pivotIndex($nums));