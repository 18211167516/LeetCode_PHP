<?php
/**
 * @category 给定一个字符串数组，编写一个方法，原地修改数组，反转数组
 * @author baichonghua <18211167516@163.com>
 * @thinking1 
 * 
 * 递归：将首位和末尾字符串对调
 * 设定一个函数、传入left指针和right指针
 * left < right指针，则值对调
 * left == right 说明数组长度是奇数，中间点无需翻转
 * left > right 说明left指针已过中间节点，无需翻转
 * 
 * 
 * 
 * 
 * 
 * @thinking2
 */
class Solution {

    /**
     * @param String[] $s
     * @return NULL
     */
    function reverseString(&$s) {
        $count = count($s);
        if($count<=1) return $s;
        $this->helper($s,0,$count-1);
        return $s;
    }

    function helper(&$s,$left,$right){
        if($left < $right){
            list($s[$left],$s[$right]) = [$s[$right],$s[$left]];
            $this->helper($s,$left+1,$right-1);
        }
    }
}

$a = new Solution();
$s = ['a','b','c'];
print_r($a->reverseString($s));

