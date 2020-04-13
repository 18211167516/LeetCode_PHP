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
     * @return String[]
     */
    function binaryTreePaths($root) {
        $res = [];
        $this->getPaths($root,'',$res);
        return $res;
    }

    function getPaths($root,$str,&$res){
        if($root == null){
            return null;
        }

        $str .= $root->val;
        if($root->left == null && $root->right ==null){
            $res[] = $str;
        } 
        
        $this->getPaths($root->left,$str.'->',$res);
        $this->getPaths($root->right,$str.'->',$res);
    }

    function binaryTreePaths2($root) {
        $res = $arr = $tmp= [];
        if($root == null) return $res;
        if($root->left ==null && $root->right ==null) return [(string)$root->val];
        array_push($arr,$root);
        array_push($tmp,$root->val);
        while(!empty($arr)){
           $rootNode = array_pop($arr);//后入后出
           $path = array_pop($tmp);//获取上一级的路径
           if($rootNode->left ==null && $rootNode->right ==null){
               $res[] = $path;
           }
           if($rootNode->right!=null){
               array_push($arr,$rootNode->right);
               array_push($tmp,$path.'->'.$rootNode->right->val);           
           }
           if($rootNode->left!=null){
               array_push($arr,$rootNode->left);
               array_push($tmp,$path.'->'.$rootNode->left->val);  
           }
           
        }
 
        return $res;
     }
}