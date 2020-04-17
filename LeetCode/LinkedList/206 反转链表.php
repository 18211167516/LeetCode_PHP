<?php

namespace Leet\LinkedList;
require './vendor/autoload.php';

use Leet\LinkedList\MyLinkedList;
/**
 * @category 反转单链表 
 * @author baichonghua <18211167516@163.com>
 * @example 1->2->3->4  4->3->2->1
 * 
 * @thinking1
 * 递归
 * 
 * 假如 1->2->3 要反转的话
 * 
 * 3->2->1
 * $head->next->next = $head 3和1交换
 * $head = null;
 * 
 * 时间复杂度 O(n) 空间O(n) 
 * 
 * @thinking2
 * 迭代
 * 
 * 设定前置节点
 * 当前节点的next为前置节点
 * 保留当前节点为前置节点
 * 从下一节点开始遍历
 * 
 * 时间复杂度O(n) 空间复杂度O(1)
 */
class Solution{
    /**
     * 递归
     * @param [type] $head
     *
     * @return void
     */
    function reverseList($head){
        if ($head==null || $head->next ==null) {
            return $head;
        }
        
        $tmp = $this->reverseList($head->next);
        $head->next->next = $head;
        $head = null;
        return $tmp;
    }

    /**
     * 迭代
     * @param [type] $head
     *
     * @return void
     */
    function reverseList2($head){
        if ($head ==null || $head->next ==null) {
            return $head;
        }
        
        $prev = null;
        $curr = $head;
        while($curr!==null){
            $nextTmp = $curr->next;
            $curr->next = $prev;//设置当前下一节点为上一节点
            $prev = $curr;//保留当前节点为上一节点
            $curr = $nextTmp;//从下一节点遍历
        }

        return $prev;
    }
}


$link = new MyLinkedList();

$link->batchInit([1,2,3,4,5]);

$head = $link->header->next;

$a = new Solution();
//print_r($a->reverseList($head));
print_r($a->reverseList2($head));