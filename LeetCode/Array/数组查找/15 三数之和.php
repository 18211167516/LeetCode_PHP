<?php
/**
 * @category 给你一个包含 n 个整数的数组 nums，判断 nums 中是否存在三个元素 a，b，c ，
 *           使得 a + b + c = 0 ？请你找出所有满足条件且不重复的三元组。
 * 
 * @author baichonghua <18211167516@163.com>
 * 
 * @example 给定数组 nums = [-1, 0, 1, 2, -1, -4]，
 * @return  [[-1,0,1],[-1,2,-1]]
 * @thinking1
 * 
 * 暴力法：循环3次
 * 
 * 时间复杂度 O(n3)
 * 
 * @thinking2 
 * 
 * 优化版暴力法：使用哈希表存储$target-$i-$j的key，值为[$i,$j]
 * 少一次循环,空间换时间
 * 时间复杂度O(n2) 空间复杂度O(n)
 * 
 * @thinking3
 * 
 * 先对数组进行排序，最左边是最小的，最右边是最大的
 * 循环全部，定义左指针和右指针，判断当前值+L+R的值和target比较,大于就R--;小于L++;等于就存入结果map，记住排重
 * 
 * 时间复杂度O(n2) 空间复杂度O(1);
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function threeSum($nums,$target=0) {
        $len = count($nums);
        $res = [];
        for($i=0;$i<$len-2;$i++){
            for($j=$i+1;$j<$len-1;$j++){
                for($k=$j+1;$k<$len;$k++){
                    if($nums[$i] + $nums[$j] + $nums[$k] == $target){
                        $res[] = [$nums[$i],$nums[$j],$nums[$k]];
                    }
                }
            }
        }
        return $res;
    }

    function threeSum1($nums,$target=0) {
        $len = count($nums);
        $res = $hx = [];
        for($i=0;$i<$len-2;$i++){
            for($j=$i+1;$j<$len-1;$j++){
                $is = $hx[$nums[$j]]??null;
                if($is!=null){
                    $res[] = array_merge([$nums[$j]],$is);
                    $hx[$nums[$j]] = null;
                }else{
                    $mask = $target-$nums[$i]-$nums[$j];
                    $hx[$mask] = [$nums[$i],$nums[$j]];
                }
            }
        }
        return $res;
    }

    function threeSum2($nums,$target=0) {
        $res = [];
        $len = count($nums);
        if ($len<3) {
            return $res;
        }
        //排序
        sort($nums);
        
        for($i=0;$i<=$len-3;$i++){
            if($nums[$i]>$target){
                break;//最低位大于0 直接跳出循环
            }

            if($i>0 && $nums[$i] == $nums[$i-1]){
                continue;
            }

            $L = $i+1;
            $R = $len-1;
            while($L<$R){
                $sum = $nums[$i]+$nums[$L]+$nums[$R];
                if($sum == 0){
                    /* $key = $nums[$i].'-'.$nums[$L].'-'.$nums[$R];
                    if(!isset($res[$key])){
                        $res[$key] = [$nums[$i],$nums[$L],$nums[$R]];
                    } */
                    while($L<$R && $nums[$L] == $nums[$L+1] && $L++){
                    }
                    while($L<$R && $nums[$R] == $nums[$R-1] && $R--){
                    }
                    $res[] = [$nums[$i],$nums[$L],$nums[$R]];
                    $L++;
                    $R--;
                }elseif($sum>0){
                    $R--;
                }elseif($sum<0){
                    $L++;
                }
            } 
        }
        return $res;
    }
}

$a  = new Solution();

$nums = [-1,0,1,1,2,-1,-4];

print_r($a->threeSum2($nums));