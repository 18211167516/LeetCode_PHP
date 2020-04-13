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
     
     * @return Boolean
     * 
     * 递归思想  转换成对比左子树和右子树是否相同
     */
    function isSymmetric($root) {
        if($root == null){
            return true;
        }
        return $this->isSym($root->left, $root->right);
    }

    function isSym($l,$r){
        if ($l == null && $r == null) return true;
        if ($l == null || $r == null) return false;
        return ($l->val == $r->val) && ($this->isSym($l->left,$r->right)) &&
        ($this->isSym($l->right, $r->left));
    }

    function isSymmetric2($root) {
        $arr = [];
        $bool = true;
        if($root ==null){
            return $bool;
        }
        array_push($arr,$root->left,$root->right);
        while($count = count($arr)){
            $left = array_shift($arr);//
            $right = array_shift($arr);//
            if($left == null && $right == null){
                continue;
            }
            if ($left == null || $right == null){
                $bool = false;break;
            }
            if($left->val != $right->val){
                $bool = false;break;
            }
            array_push($arr,$left->left, $right->right, $left->right, $right->left);
        }
        return $bool;
    }
}

$class = new Solution();


$root = new TreeNode(28);
$root->left = new TreeNode(16);
$root->right = new TreeNode(16);

$res = $class->isSymmetric2($root);
var_dump($res);