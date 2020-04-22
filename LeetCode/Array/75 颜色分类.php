<?php
/**
 * @category 
 * 给定一个包含红色、白色和蓝色，一共 n 个元素的数组，
 * 原地对它们进行排序，使得相同颜色的元素相邻，并按照红色、白色、蓝色顺序排列。
 * 此题中，我们使用整数 0、 1 和 2 分别表示红色、白色和蓝色
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/problems/sort-colors
 * @author baichonghua <18211167516@163.com>
 * @example [0,2,1,2,1,0]
 * @return [0,0,1,1,2,2]
 * @thinking1
 * 
 * 因为首位一定是0，末尾一定是2,
 * 先定义p0=0;p2=0;
 * 在定义curr=0;
 * 循环条件：curr<p2
 * 判断当前值等于0的时候；p0和当前值调换，p0指针向右迁移,curr指针迁移
 * 值等于2的时候；p2和当前值调换，p2指针向左迁移，curr不变，
 * else curr指针向右迁移
 * 
 * @thinking2
 * 
 * 采用基数排序 O(n+k) k是待排序列最大值  的整数元素序列
 */
class Solution{
    /**
     * Undocumented function
     * @param [type] $nums
     *
     * @return void
     * @thinking
     */
    function sortColors(&$nums) {
        $len = count($nums);
        $p0 = 0;
        $p2 = $len-1;
        $curr = 0;
        while($curr<$p2){
            if($nums[$curr] == 0 ){
                list($nums[$p0], $nums[$curr]) = [$nums[$curr],$nums[$p0]];
                $p0++;
                $curr++;
            }elseif($nums[$curr] == 2){
                list($nums[$p2], $nums[$curr]) = [$nums[$curr],$nums[$p2]];
                $p2--;
            }else{
                $curr++;
            }
        }

        return $nums;
    }

    /**
     * 计数排序
     * @param [type] $arr
     *
     * @return void
     * @thinking
     */
    public function countingSort(&$arr){
        $max = max($arr);
        $new = array_fill(0,$max+1,0);
        $length = count($arr);
        //计数
        for($i=0;$i<$length;$i++){
           $new[$arr[$i]]++;
        }

        $index = 0;
        for($i =0;$i<$max+1;$i++){
            while($new[$i]>0){
                $arr[$index++] = $i;
                $new[$i]--;
            }
        }
        return $arr;
    }


}

$a = new Solution();
$nums = [0,1,2,2,1,0];
print_r($a->countingSort($nums));exit;
print_r($a->sortColors($nums));
