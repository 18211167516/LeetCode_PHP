<?php

require 'Tree.php';

class Solution {

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function maxDepth($root) {
        if($root ==null ) return 0;
        if($root->left == null) return $this->maxDepth($root->right)+1;
        if($root->right== null) return $this->maxDepth($root->left)+1; 
        return max($this->maxDepth($root->left),$this->maxDepth($root->right))+1;
    }


    function maxDepth2($root){
        if($root ==null ) return 0;
        if($root->left == null && $root->right ==null) return 1;
        $min = 0;  
        $arr = [];
        array_push($arr, $root);
        while($count = count($arr)){
            $min++;
            for($i=$count;$i>0;$i--){
                $node = array_shift($arr);//先入先出
                if($node->left == null && $node->right ==null){
                    continue;
                }
                if($node->left !=null) array_push($arr,$node->left);
                if($node->right !=null) array_push($arr,$node->right);
            }
        }

        return $min;
    }

}

$class = new Solution();

$test = [28,16,30,13,22,29,43,50];

$tree = new Tree();
$root = $tree->createTree($test);
$res = $class->maxDepth($root);
$res2 = $class->maxDepth2($root);
var_dump($res);
var_dump($res2);
exit;
