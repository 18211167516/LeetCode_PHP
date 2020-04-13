<?php

class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($value) { $this->val = $value; }
}
class Solution {

    /**
     * @param TreeNode $root
     * @return TreeNode
     */
    function invertTree($root) {
        //左右数对调

        if($root == null) return null;

        list($root->left,$root->right) = [$this->invertTree($root->right),$this->invertTree($root->left)];

        return $root;
    }
}


$s = new Solution();
$root = new TreeNode(28);
$root->left = new TreeNode(16);
$root->left->left = new TreeNode(13);
$root->left->right = new TreeNode(22);
$root->right = new TreeNode(30);
$root->right->left = new TreeNode(29);
$root->right->right = new TreeNode(43);

$res = $s->invertTree($root);

print_r($res);