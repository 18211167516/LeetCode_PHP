<?php

class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($value) { $this->val = $value; }
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
    function sortedArrayToBST($nums) {
        return $this->build($nums, 0, count($nums)-1);
    }

    function build($nums,$left,$right){
        //终止条件
        if($left > $right) return null;
        //选择中点
        $midIndex = floor(($left + $right)/2);
        $root = new TreeNode($nums[$midIndex]);
        //mid 左边即为左子树
        $root->left = $this->build($nums, $left, $midIndex-1);
        //mid 右边即为右子树
        $root->right = $this->build($nums, $midIndex+1, $right);
        return $root;
    }
}

$s = new Solution();

$nums = [-10,-3,0,5,9];

$res = $s->sortedArrayToBST($nums);

print_r($res);

