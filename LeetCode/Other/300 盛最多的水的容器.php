<?php
/**
 * @category 盛最多水的容器
 * @author baichonghua <18211167516@163.com>
 * @example [1,8,6,2,5,4,8,3,7]
 * @return 49
 * @thinking1
 * 
 * 双指针法：
 * 定义left=0；right=count($arr)-1;
 * 再循环中判断：
 * currArea = min(L,R) * (right-left)
 * area = max(currArea,area);
 * if(L>R) 说明 right要左移
 * else left右移
 * 
 * O(n)
 * @thinking2
 * 
 * 暴力双重循环
 * O(n2)
 */
class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function maxArea($height) {
        $len = count($height);
        $L=0;
        $R=$len-1;
        $area = 0;
        while($L<$R){
            $currArea = min($height[$L], $height[$R]) * ($R-$L);
            $area = max($currArea,$area);
            if($height[$L] > $height[$R]){
                $R--;
            }else{
                $L++;
            }
        }
        return $area;
    }

    function maxArea2($height) {
        $len = count($height);
        $area = 0;
        for($i=0;$i<$len;$i++){
            for($j=$len-1;$j>0;$j--){
                $currArea = min([$height[$i],$height[$j]]) * ($j-$i);
                $area = max($currArea, $area);
                if($height[$i] >= $height[$j]){
                    continue;
                }
            }
        }

        return $area;
    }
}

$a = new Solution();
$arr = [1,8,6,2,5,4,8,3,7];
$arr = [2,3,4,5,18,17,6];
print_r($a->maxArea2($arr));