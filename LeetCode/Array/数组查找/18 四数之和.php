<?php
/**
 * @category 给你一个包含 n 个整数的数组 nums，判断 nums 中是否存在三个元素 a，b，c ，
 *           使得 a + b + c = 0 ？请你找出所有满足条件且不重复的三元组。
 * 
 * @author baichonghua <18211167516@163.com>
 * 
 * @example 给定数组 nums = [1,0,-1,0,-2,2]
 * @return  [[-1,0,0,1],[-2,-1,1,2],[-2,0,0,2]]
 * @thinking1
 * 
 * 参考15 三数之和 多一层循环
 * 
 * 时间复杂度O(n3) 空间O(1)
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */

    function fourSum($nums,$target=0) {
        $res = [];
        $len = count($nums);
        if ($len<4) {
            return $res;
        }
        //排序
        sort($nums);
        for($i=0;$i<=$len-4;$i++){
            if($i>0 && $nums[$i] == $nums[$i-1]){
                continue;//去除重复值
            }
            for($j=$i+1;$j<=$len-3;$j++){
                if($j-$i>1 && $nums[$j] == $nums[$j-1]){
                    continue;//去除重复值
                }
                $L = $j+1;
                $R = $len-1;
                while($L<$R){
                    $sum = $nums[$i]+$nums[$j]+$nums[$L]+$nums[$R];
                    if($sum == $target){
                        $res[] = [$nums[$i],$nums[$j],$nums[$L],$nums[$R]];
                        while($L<$R && $nums[$L] == $nums[$L+1]){
                            $L++;
                        }
                        while($L<$R && $nums[$R] == $nums[$R-1]){
                            $R--;
                        }
                        $L++;
                        $R--;
                    }elseif($sum>$target){
                        $R--;
                    }elseif($sum<$target){
                        $L++;
                    }
                } 
            }
        }
        return $res;
    }
}

$a  = new Solution();

$nums = [1,-2,-5,-4,-3,3,3,5];

print_r($a->fourSum($nums,-11));