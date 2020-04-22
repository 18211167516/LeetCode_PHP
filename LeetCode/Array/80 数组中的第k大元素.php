<?php

/**
 * @category 在未排序的数组中找到第 k 个最大的元素。
 * 请注意，你需要找的是数组排序后的第 k 个最大的元素，而不是第 k 个不同的元素。
 * @author baichonghua <18211167516@163.com>
 * @example [3,2,1,5,6,4] 2 排序后[1,2,3,4,5,6]
 * @return 5
 * 
 * @example [3,2,3,1,2,4,5,5,6] 4 排序后[1,2,2,3,3,4,5,5,6]
 * return 4
 * 
 * 
 * @thinking1
 * 
 * 基数排序
 * 
 * [0,0,0,0,0,0,0];
 * 
 * [1=>1,2=>2,3=>2,4=>1,5=>2,6=>1]
 * 
 * [1,2,2,3,3,4,5,5,6]
 */
class Solution{
    function findKthLargest($nums,$k){
        //思路先排序，然后在找第k大元素
        sort($nums);
        $len = count($nums);
        $key = $len-$k;
        return $nums[$key];
    }
}

$a = new Solution();
print_r($a->findKthLargest([3,2,3,1,2,4,5,5,6], 1));