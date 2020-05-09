<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Boolean
     */
    function containsNearbyDuplicate($nums, $k) {
        $len = count($nums);
        
        $map = [];
        for($i = 0;$i<$len;$i++){
            if (in_array($nums[$i],$map)) {
                return true;
            }else{
                $map[] = $nums[$i];
                if(count($map)>$k){
                    array_shift($map);
                }
            }
        }
        return false;
    }
}

$a = new Solution();

$nums = [4,1,2,3,1,5];$k=3;

print_r($a->containsNearbyDuplicate($nums, $k));