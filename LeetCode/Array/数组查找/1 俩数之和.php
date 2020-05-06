<?php

/**
 * @category 给定一个整数数组 nums 和一个目标值 target，请你在该数组中找出和为目标值的那 两个 整数，并返回他们的数组下标。
 * @author baichonghua <18211167516@163.com>
 * @example [2,7,10,14] 9 
 * @return [0,1]
 * @thinking1
 * 
 * 暴力法：2遍循环
 * 
 * 时间复杂度O(n2) 
 * 
 * @thinking2 
 * 
 * 空间换时间，将nums的值存入hx数组
 * 
 * 判断$tagert-$nums[$i]是否存在于hx
 * 
 * 时间复杂度O(n) 空间复杂度O(n)
 * 
 * 
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function twoSum($nums,$target) {
        //
        $len = count($nums);
        for($i=0;$i<$len;$i++){
            for($j=$i+1;$j<$len;$j++){
                if($nums[$i] + $nums[$j] == $target){
                    return [$i,$j];
                }
            }
        }
        return [];
    }

    /**
     * 空间换时间
     * @param [type] $nums
     * @param [type] $target
     *
     * @return void
     * @thinking
     */
    function twoSum1($nums,$target) {
        //
        $len = count($nums);
        $hx=[];
        for($i=0;$i<$len;$i++){
            $is = $hx[$target-$nums[$i]]??null;
            if($is!=null){
                return [$i,$is];
            }else{

                $hx[$nums[$i]] = $i;
            }
        }
        return [];
    }

    /**
     * 和twoSum1类似，采用php内部函数
     * @param [type] $nums
     * @param [type] $target
     *
     * @return void
     * @thinking
     */
    function twoSum2($nums, $target) {
        $newNums = array_flip($nums);
        foreach($nums as $key=>$val){
            if(array_key_exists($target-$val,$newNums) && $key!=$newNums[$target-$val]){
                return [$key,$newNums[$target-$val]];
            }
        }
        return [];
    }
}