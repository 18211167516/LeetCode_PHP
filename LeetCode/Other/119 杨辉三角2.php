<?php

namespace Leet\Other;

/**
 * @category 杨辉三角2  给定一个非负索引k.返回杨辉三角的第K行
 * @author baichonghua <18211167516@163.com>
 * @example 
 * 
 * 1             k = 1   row = []  i =0 j 无 得到 [1]
 * 1 1           k = 2   row = [1] i =0,1 无 得到 [1,1]
 * 1 2 1         k = 3   row = [1,1] i=0,1,2 j = 2 设置 row[1] = row[0] + row[1] = 2 得到[1,2,1] 
 * 1 3 3 1       k = 4   row = [1,2,1] i=0,1,2,3 j= 2,3 设置 row[1] = row[0] + row[1]= 3 row[2] = row[1]+row[2] = 3 
 *                        得到 [1,3,3,1]
 * 
 *               f(j-1) = f(j-2)+f(j-1);
 * 1 4 6 4 1     k = 5   row = []
 */
class Solution{
    function getRow($rowIndex) {
        $row = range(0,$rowIndex);
        for($i=0;$i<=$rowIndex;$i++){
            $row[$i]=1;
            for($j=$i;$j>1;$j--){
                $row[$j-1] = $row[$j-2] + $row[$j-1];
            }
        }
        return $row;
    }
}

$a = new Solution();
print_r($a->getRow(4));