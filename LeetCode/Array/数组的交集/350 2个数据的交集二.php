<?php
/**
 * @category 2个数组的交集二  给定两个数组，编写一个函数来计算它们的交集。
 * @author baichonghua <18211167516@163.com>
 * @example [1,2,2,1] [2,2] 
 * @return [2,2]
 * @thinking1
 * 
 * 1、找到较小的数组
 * 2、遍历该映射哈希获取每个数的count数 存入m
 * 3、定义变量k=0;遍历剩下的数组;判断当前元素是否存在于m；如果存在并且大于0；则将$nums1[$k++] = 当前元素;
 * 4、并且将对应的$m[元素]--;
 * 5、返回$nums1[0,$k];
 * 
 * 时间复杂度 O(m+n)
 * 空间复杂度 O(min(m,n))
 * 
 * 
 * @thinking2
 * 
 * 1、对2数组排序;
 * 2、初始化指针i,j,k=0;
 * 3、指针i指向nums1[0];指针j指向nums[1];
 *   1、nums1[i]<nums2[j] i++;
 *   2、nums1[i]>nums2[j] j++;
 *   3、nums1[i] == nums2[j];$nums1[$k++] = curr;i++;j++;//使用nums1存储结果，减少申请新数组
 * 4、return $nums1[0,$k];
 * 
 * 时间复杂度 O(nlogn+mlogm)
 * 空间复杂地 O(1);
 */
class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    function intersect($nums1, $nums2) {
        $len1 = count($nums1);
        $len2 = count($nums2);
        if($len1>$len2){
            return $this->intersect($nums2, $nums1);
        }

        $m = array_fill(0,max($nums1)+1,0);
        
        for($i=0;$i<$len1;$i++){
            $m[$nums1[$i]]++;
        }
        
        $k =0;
        for($i=0;$i<$len2;$i++){
            $s = $m[$nums2[$i]]??0;
            if($s){
                $nums1[$k++] = $nums2[$i];
                $m[$nums2[$i]]--;
            }
        }
        return array_slice($nums1,0,$k);
    }

    function intersect2($nums1,$nums2){
        sort($nums1);
        sort($nums2);
        $i=$j=$k=0;
        while($i<count($nums1) && $j<count($nums2)){
            if($nums1[$i] < $nums2[$j]){
                $i++;
            }elseif($nums1[$i] > $nums2[$j]){
                $j++;
            }elseif($nums1[$i] == $nums2[$j]){
                $nums1[$k++] = $nums1[$i];
                $i++;
                $j++;
            }
        }

        return array_slice($nums1, 0, $k);
    }
}

$a = new Solution();

$nums1 = [4,9,5];
$nums2 = [9,4,9,8,4];

print_r($a->intersect2($nums1, $nums2));