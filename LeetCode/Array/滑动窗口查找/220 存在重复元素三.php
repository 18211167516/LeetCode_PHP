<?php

/**
 * 
 * [1,2,3,1] k=1 j=1
 * $nums[i]-$nums[$j]<=j;
 * i-j<=k;
 * 
 * @thinking
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Boolean
     */
    function containsNearbyAlmostDuplicate($nums, $k,$t) {
        $len = count($nums);
        
        $map = [$nums[0]];
        for($i = 1;$i<$len;$i++){
            $map[] = $nums[$i];
            if (abs($nums[$i]-$map[$i-1])>$t) {
                array_shift($map);
            }else{
                if(count($map)>$k){
                    array_shift($map);
                }else{
                    return true;
                }
            }
        }
        return false;
    }
}

$a = new Solution();

$nums = [1,2,3,1];$k=1;$t=0;

print_r($a->containsNearbyAlmostDuplicate($nums, $k,$t));