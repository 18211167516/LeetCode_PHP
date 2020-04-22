<?php

/**
 * @category 给定一个已按照升序排列 的有序数组，找到两个数使得它们相加之和等于目标数。
 * @author baichonghua <18211167516@163.com>
 * 
 * @example [2,7,11,15] 9 
 * @return [1,2]
 * @thinking1
 * 
 * 翻转数组 键值互换
 * 循环搜索匹配的key值
 * 
 * 时间复杂度O(n*Log) 
 * @thinking2
 * 
 * 双指针法，由于数升序的数组
 * 时间复杂度O(n)
 */
class Solution {

    /**
     * @param Integer[] $numbers
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($numbers, $target) {
        $newNums = array_flip($numbers);
        foreach($numbers as $key=>$val){
            if(array_key_exists($target-$val,$newNums) && $key!=$newNums[$target-$val]){
                return [$key+1,$newNums[$target-$val]+1];
            }
        }
        return [];
    }

    /**
     * 因为
     * @param [type] $numbers
     * @param [type] $target
     *
     * @return void
     * @thinking
     */
    function twoSum2($numbers, $target) {
        if (empty($numbers)) {
            return $numbers;
        }
        $len = count($numbers);
        $L = 0;$R=$len-1;
        while($L<$R){
           if($numbers[$L]+$numbers[$R] == $target){
                return [$L+1,$R+1];
           }elseif($numbers[$L]+$numbers[$R]>$target){
                $R--;//右键左移
           }else{
                $L++;//左键右移
           }
        }
        return [];
    }

}

$a = new Solution();

print_r($a->twoSum2([2,7,11,15], 9));
