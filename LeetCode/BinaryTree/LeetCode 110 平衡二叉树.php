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
     */
    function isBalanced($root) {
        $bool = true;
        $this->getDepth($root,$bool);
        return $bool;
    }

    function getDepth($root,&$bool){
        if ($root ==null) {
            return 0;
        }
        $left = $this->getDepth($root->left,$bool);
        $right = $this->getDepth($root->right,$bool);
        if(abs($left-$right)>1){
            $bool = false;
        }
        return $right>$left?$right+1:$left+1;
    }

    function isBalanced2($root){
        $isBool = true;
        if ($root ==null) {
            return $isBool;
        }
        
        $arr = [];
        $leftDepth = $rightDepth = 1;
        array_push($arr, $root);
        while($count = count($arr)){
           $node = array_pop($arr);
           
        }
    }
}

$s = new Solution();

$root = new TreeNode(3);
$root->left = new TreeNode(9);
$root->right = new TreeNode(20);
$root->right->left = new TreeNode(15);
$root->right->right = new TreeNode(7);
$root->right->right->left = new TreeNode(78);
$root->right->right->right = new TreeNode(90); 
$res = $s->isBalanced2($root);
var_dump($res);
