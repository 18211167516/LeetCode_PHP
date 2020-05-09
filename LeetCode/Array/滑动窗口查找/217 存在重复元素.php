<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function containsDuplicate($nums) {
        $len = count($nums);
        if ($len<2) {
            return false;
        }
        $map = [];
        for($i = 0;$i<$len;$i++){
            $isExis = $map[$nums[$i]]??null;
            if ($isExis!=null) {
                return true;
            }else{
                $map[$nums[$i]] = 1;
            }
        }

        return false;
    }
}


$a = new Solution();

$nums = [1,2,3,4];

print_r($a->containsDuplicate($nums));