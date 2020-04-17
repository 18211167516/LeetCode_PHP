<?php


namespace Leet\LinkedList;

require './vendor/autoload.php';

use Leet\LinkedList\ListNode;

use Leet\LinkedList\MyLinkedList;
/**
 * @category 将两个升序链表合并为一个新的升序链表并返回。新链表是通过拼接给定的两个链表的所有节点组成的。 
 * @author baichonghua <18211167516@163.com>
 * @example 
 * 
 * l1 = 1->2->3;l2=1->3->4
 * 
 * return 1->1->2->3->3->4
 * 
 * @thinking1
 * 
 * 递归
 * 
 * IF    l1[0] < l2[0]  l1[0] + merge(l1[1:],$l2)
 * ELSE  l1[0] >= l2[0] l2[0] + merge(ll,$l2[1:])
 * 
 * 边界条件： l1 为null 返回 l2;l2 为空返回l1 
 * 
 * 时间复杂度O(n+m) 空间复杂度O(n+m)
 * @thinking2
 * 
 * 设定一个头节点，循环迭代L1、L2
 * 最后最多有一个是非空的，将非空的链表链接到已合并的链表
 * 
 * 时间复杂度O(n+m) 空间复杂度O(1)
 */
class Solution {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function mergeTwoLists($l1, $l2) {
        if($l1 ==null){
            return $l2;
        }elseif($l2 ==null){
            return $l1;
        }elseif($l1->val < $l2->val){
            $l1->next = $this->mergeTwoLists($l1->next,$l2);
            return $l1;
        }else{
            $l2->next = $this->mergeTwoLists($l1, $l2->next);
            return $l2;
        }
    }

    function mergeTwoLists2($l1,$l2){
        if($l1 == null){
            return $l2;
        }elseif($l2 ==null){
            return $l1;
        }

        $dumy = new ListNode(null);
        $curr = $dumy;
        while($l1 !=null && $l2 !=null){
            if($l1->val < $l2->val){
                $curr->next = $l1;
                $l1 = $l1->next;
            }else{
                $curr->next = $l2;
                $l2 = $l2->next;
            }

            $curr = $curr->next;
        }

        $l1 ==null?$curr->next = $l2:$curr->next=$l1;
        return $dumy->next;
    }
}


$link = new MyLinkedList();

$link->batchInit([1,2,3]);

$l1 = $link->header->next;

$link2 = new MyLinkedList();

$link2->batchInit([1,3,4]);

$l2 = $link2->header->next;

$a = new Solution();
print_r($a->mergeTwoLists2($l1,$l2));