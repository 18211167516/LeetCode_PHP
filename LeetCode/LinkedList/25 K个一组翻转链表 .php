<?php
namespace Leet\LinkedList;
require './vendor/autoload.php';
use Leet\LinkedList\MyLinkedList;
use Leet\LinkedList\ListNode;
class Solution {

    /**
     * @param ListNode $head
     * @param Integer $k
     * @return ListNode
     */
    function reverseKGroup($head, $k) {
        //如果链表为null或者k小于2直接返回链表
        if($head==null || $k<2) return $head;
        $dumy = new ListNode(null);
        $dumy->next = $head;
        return $dumy;
        
    }

}

$link = new MyLinkedList();

$link->batchInit([1,2,3,4,5]);

$head = $link->header->next;

$class = new Solution();

print_r($class->reverseKGroup($head, 2));