<?php

/**
 * @category 给定一个按照升序排列的整数数组 nums，和一个目标值 target。找出给定目标值在数组中的开始位置和结束位置。
 * 你的算法时间复杂度必须是 O(log n) 级别。如果数组中不存在目标值，返回 [-1, -1]。
 * 
 * @author baichonghua <18211167516@163.com>
 * @example [5,7,7,8,8,10] 8 
 * @return [3,4]
 *
 * @thinking
 * 
 * 思路：很明显 2分查找
 * 
 * 
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function searchRange($nums, $target) {
        $left = $this->bin_sch($nums, $target, true);
        if($left == -1){
            return [-1,-1];
        }
        $right = $this->bin_sch($nums, $target, false);
        return [$left,$right];
    }

    function bin_sch($nums,$target,$isLeft){
        $L= 0;
        $len = count($nums);
        $R = $len-1;
        while($L<=$R){
            $mid = $L+(($R-$L)>>1);
            if($nums[$mid] == $target){
                $isLeft?$R = $mid-1:$L = $mid+1;
            }elseif($nums[$mid] > $target){
                $R = $mid-1;
            }elseif($nums[$mid] < $target){
                $L = $mid+1;
            }
        }
        if($isLeft){
            return ($L>=$len || $nums[$L] == $target)?$L:-1;
        }else{
            return ($R>0 || $nums[$R] == $target)?$R:-1;;
        }
    }

    function bin_sch2($nums,$target,$isLeft){
        $L= 0;
        $len = count($nums);
        $R = $len;//左闭右开
        while($L<$R){
            $mid = $L+(($R-$L)>>1);
            //echo $L,$R,$mid,PHP_EOL;
            if($nums[$mid] == $target){
                $isLeft?$R = $mid:$L = $mid+1;
            }elseif($nums[$mid] > $target){
                $R = $mid;
            }elseif($nums[$mid] < $target){
                $L = $mid+1;
            }
        }

        if($isLeft){
            return ($L>=$len || $nums[$L] == $target)?$L:-1;
        }else{
            return ($R>0 || $nums[$R] == $target)?$R-1:-1;//必须-1
        }
    }
}


$a = new Solution();

$arr = [5,7,7,8,8,10];
$target = 7;
echo implode($arr),'--', $target,PHP_EOL;

print_r($a->bin_sch2($arr, $target, false));exit;
print_r($a->searchRange($arr, $target));
