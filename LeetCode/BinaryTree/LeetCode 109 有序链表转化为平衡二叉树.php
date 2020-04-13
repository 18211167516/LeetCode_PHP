<?php

class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($value) { $this->val = $value; }
}

class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val) { $this->val = $val; }
}

class Solution {

    /**
     * 采用深度搜索算法 
     * 
     * 中序遍历
     * 
     * 选择中间数字做根节点
     * 
     * 
     */
    function sortedListToBST($head)
    {
        //终止条件
        if ($head ==null) return null;
        if ($head->next ==null) return new TreeNode($head->val);
    
        $slow_ptr = $head;//慢指针
        $fast_ptr = $head;//快指针
        $temp = null;
        while ($fast_ptr!=null && $fast_ptr->next!=null) {
            $fast_ptr = $fast_ptr->next->next;
            $tmp = $slow_ptr;
            $slow_ptr = $slow_ptr->next;
        }
        $left = $head;
        $right = $slow_ptr->next;//右子树链表
        $tmp->next = null;//链表中间位左边一位设为null,此时head 只剩左子树链表
        $root = new TreeNode($slow_ptr->val);
        $root->left = $this->sortedListToBST($left);
        $root->right = $this->sortedListToBST($right);
        return $root; 
    }
}

$s = new Solution();

$nums = [-10,-3,0,5,9];

$list = new ListNode(-10);
$list->next = new ListNode(-3);
$list->next->next = new ListNode(0);
$list->next->next->next = new ListNode(5);
$list->next->next->next->next = new ListNode(9);


$res = $s->sortedListToBST($list);

print_r($res);

