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
     * @return NULL
     */
    function flatten($root) {
        if($root == null) return;
        $this->flatten($root->right);//
        $this->flatten($root->left);
    }

    function flatten2($root){
        //先找左子树
        $left = $root->left;
        //将原先的右节点放到左子树的右节点
        $left->right = $root->right;
        //将左子树放在根节点的 右节点
        $root->right = $left;
    }
}

$s = new Solution();

$root = new TreeNode(1);
$root->left = new TreeNode(2);
$root->left->left = new TreeNode(3);
$root->left->right = new TreeNode(4);
$root->right = new TreeNode(5);
$root->right->right = new TreeNode(6);

$res = $s->flatten($root);

