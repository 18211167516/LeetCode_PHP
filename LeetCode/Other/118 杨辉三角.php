<?php

namespace Leet\Other;
/**
 * @category 杨辉3角
 * @author baichonghua <18211167516@163.com>
 * @example 
 * 
 * 1
 * 1 1
 * 1 2 1
 * 1 3 3 1
 * 1 4 6 4 1
 * 
 * @thinking1 
 * 
 * 递归
 * 某个位置的值等于
 * f(i,j) = f(i-1,j-1)+f(i-1,j);
 * 
 * 同时处于第一位和最后一位时等于1
 * i=1 or i=j
 * 
 * 
 * 时间复杂度 O(n2) 空间复杂度 o(n) 调用栈
 * 
 * 
 * @thinking2
 * 
 * 递归+数组存储值
 * 
 * 时间复杂度o(n2) 空间复杂度 O(n2) 
 * 
 * @thinking3
 * 
 * Dp 动态规划
 * 
 * 时间复杂度O(n2) 空间复杂度 O(n2)
 */
class Solution{
    /**
     * recursion
     * @param [type] $numRows
     *
     * @return void
     */
    function generate1($numRows) {
        $arr = [];
        for($i=0;$i<$numRows;$i++){
            for($j=0;$j<$i+1;$j++){
                $arr[$i][$j] = $this->getRow($i,$j);
            }
        }
        return $arr;
    }

    function getRow($i,$j){
        if($i<=0 || $j<=0 || $i==$j){
            return 1;
        }else{
            return $this->getRow($i-1, $j-1)+$this->getRow($i-1,$j);
        }
    }

    /**
     * recursion+map存储
     * @param [type] $numRows
     *
     * @return void
     */
    function generate2($numRows) {
        $map = $arr = [];
        for($i=0;$i<$numRows;$i++){
            for($j=0;$j<$i+1;$j++){
                $arr[$i][$j] = $this->getRowMAp($i,$j,$map);
            }
        }
        return $arr;
    }

    function getRowMAp($i,$j,&$map){
        if($i<=0 || $j<=0 || $i==$j){
            return 1;
        }else{
            return $map[$i.'_'.$j]??$map[$i.'_'.$j] = $this->getRowMAp($i-1, $j-1,$map)+$this->getRowMAp($i-1,$j,$map);
        }
    }
    /**
     * Dp动态
     * @param [type] $numRows
     *
     * @return void
     */
    function generate3($numRows) {
        $map = [];
        
        for($i=0;$i<$numRows;$i++){
            $row = range(0,$i);
            $row[0]=1;$row[$i]=1;
            for($j=1;$j<$i;$j++){
                $row[$j] = $map[$i-1][$j-1] + $map[$i-1][$j];
            }
            $map[] = $row;
        }

        return $map;
    }

}

$s = new Solution();
print_r($s->generate1(3));
print_r($s->generate2(5));
print_r($s->generate3(5));