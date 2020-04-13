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
    function postorderTraversal($root) {
        $arr = $res = [];
        if ($root == null) {
            return $res;
        }
        array_push($arr,$root);
        
        while(!empty($arr)){
            $node = array_pop($arr);
            var_dump($node->val);
            if($node->left != null) array_push($arr,$node->left);
            if($node->right != null) array_push($arr,$node->right);
            if($node->val !=null) array_unshift($res,$node->val);//逆序添加到结果数组
        }

        return $res;
        
    }
}

$class = new Solution();

$root = [28,16,13,3];

$root = new TreeNode(28);
$root->left = new TreeNode(16);
$root->left->left = new TreeNode(13);
$root->left->right = new TreeNode(22);
$root->right = new TreeNode(30);
$root->right->left = new TreeNode(29);
$root->right->right = new TreeNode(43);

$res = $class->postorderTraversal($root);

var_dump($res);