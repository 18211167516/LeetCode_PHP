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
     * @return Integer[]
     
     */
    function inorderTraversal($root) {
        $arr = $res = [];
        if ($root == null) {
            return $res;
        }
        //设置当前节点
        $cur = $root;//根节点
        while($cur!=null || !empty($arr)){
            if($cur!=null){ //如果当前叶子节点不为null
                array_push($arr, $cur);
                $cur = $cur->left;
            }else{
                $cur = array_pop($arr);
                $res[] = $cur->val;
                $cur = $cur->right;
            }
        }
        return $res;
        
    }
}

$class = new Solution();


$root = new TreeNode(28);
$root->left = new TreeNode(16);
$root->left->left = new TreeNode(13);
$root->left->right = new TreeNode(22);
$root->right = new TreeNode(30);
$root->right->left = new TreeNode(29);
$root->right->right = new TreeNode(43); 

/* $root = new TreeNode(1);
$root->right = new TreeNode(2);
$root->right->left = new TreeNode(3); */

$res = $class->inorderTraversal($root);

var_dump($res);