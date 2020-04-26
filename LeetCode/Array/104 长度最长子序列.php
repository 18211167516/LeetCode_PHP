<?php

class Solution {

    /**
     * 暴力法
     * O(n3) O(1)
     * @param Integer $s
     * @param Integer[] $nums
     * @return Integer
     */
    function minSubArrayLen($s, $nums) {
        $len = count($nums);
        $ans = PHP_INT_MAX;
        for($i=0;$i<$len;$i++){
            for($j=$i;$j<$len;$j++){
                $sum = 0;
                for($k=$i;$k<=$j;$k++){
                    $sum+=$nums[$k];
                }
                if($sum == $s){
                    $ans = min($ans, $j-$i+1);
                    break;
                }
            }
        }

        return $ans;
    }

    /**
     * 优化暴力法
     * @param [type] $s
     * @param [type] $nums
     * O(n2) O(n)
     * @return void
     * @thinking
     */
    function minSubArrayLen2($s, $nums) {
        $len = count($nums);
        $ans = PHP_INT_MAX;
        $sums = [$nums[0]];
        for($i=1;$i<$len;$i++){
            $sums[$i] = $nums[$i]+$sums[$i-1];
        }
        for($i=0;$i<$len;$i++){
            for($j=$i;$j<$len;$j++){
                $sum = $sums[$j]-$sums[$i] + $nums[$i];
                if($sum == $s){
                    $ans = min($ans, $j-$i+1);
                    break;
                }
            }
        }

        return $ans;
    }

    /**
     * 二分查找
     * @param [type] $s
     * @param [type] $nums
     *
     * @return void
     * @thinking
     */
    function minSubArrayLen3($s, $nums) {
        $len = count($nums);
        $ans = PHP_INT_MAX;
        $sums = [$nums[0]];
        for($i=1;$i<$len;$i++){
            $sums[$i] = $nums[$i]+$sums[$i-1];
        }

        print_r($sums);exit;
        for($i=0;$i<$len;$i++){
            for($j=$i;$j<$len;$j++){
                $sum = $sums[$j]-$sums[$i] + $nums[$i];
                if($sum == $s){
                    $ans = min($ans, $j-$i+1);
                    break;
                }
            }
        }

        return $ans;
    }

    /**
     * 双指针
     * @param [type] $s
     * @param [type] $nums
     * @return void
     * @thinking
     */
    function minSubArrayLen4($s, $nums) {
        $len = count($nums);
        $ans = PHP_INT_MAX;
        $left = 0;
        $sum = 0;
        for($i=0;$i<$len;$i++){
            $sum +=$nums[$i];
            while($sum>=$s){
                $ans = min($ans, $i-$left+1);
                $sum -=$nums[$left++];
            }
        }
        return $ans;
    }
}

$a = new Solution();
$s = 7;
$nums=[2,3,1,2,4,3];
print_r($a->minSubArrayLen4($s,$nums));