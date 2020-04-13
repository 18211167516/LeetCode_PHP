<?php

  class TreeNode {
      public $val = null;
      public $left = null;
      public $right = null;
     function __construct($value) { $this->val = $value; }
  }
 
class Solution {

    /**
     * 前序遍历后入先出（模拟栈）
     * @param [type] $root
     *
     * @return void
     */
    function preorderTraversal1($root) {
        $arr = $res = array();
        if($root == null){
            return $res;
        }
        //前序遍历  根->左->右
        //将根节点压入数组(模拟入栈)（后入先出）
        array_push($arr,$root);
        while(!empty($arr)){
            $rootNode = array_pop($arr);//模拟出在
            $res[] = $rootNode->val;
            if ($rootNode->right!=null) {
                array_push($arr, $rootNode->right);
            }
            if ($rootNode->left!=null) {
                array_push($arr, $rootNode->left);
            }
        }
        return $res;
    }

    /**
     * 前序遍历 先入先出
     * @param [type] $root
     *
     * @return void
     */
    function preorderTraversal2($root) {
        $arr = $res = array();
        if($root == null){
            return $res;
        }
        //前序遍历  根->左->右
        //将根节点压入数组(模拟入栈)（先入后出）
        array_unshift($arr,$root);//先入
        while(!empty($arr)){
            $rootNode = array_shift($arr);//先出删除首部元素
            $res[] = $rootNode->val;
            if ($rootNode->right!=null) array_unshift($arr, $rootNode->right);
            if ($rootNode->left!=null) array_unshift($arr, $rootNode->left);
        }
        return $res;
    }

    /**
     * 使用sqlStr
     * @param [type] $root
     *
     * @return void
     */
    function preorderTraversal3($root) {
        $res = array();
        $stack = new SplStack();
        if($root == null){
            return $res;
        }
        //前序遍历  根->左->右
        //将根节点压入栈（先入后出）
        $stack->push($root);
        while(!$stack->isEmpty()){//此处可替换成 $stack->count()

            $rootNode = $stack->pop();//先出删除首部元素
            $res[] = $rootNode->val;
            if ($rootNode->right!=null) $stack->push($rootNode->right);
            if ($rootNode->left!=null) $stack->push($rootNode->left);
        }
        return $res;
    }
    /**
     * 递归版本
     * @param [type] $root
     *
     * @return void
     */
    function preorderTraversal4($root) {
        $res = [];
        $this->traversal($root,$res);
        return $res;     
    }

    function traversal($root,&$res){
        if($root == null){
            return null;
        }
        $res[] = $root->val;
        $this->traversal($root->left,$res);
        $this->traversal($root->right,$res);
        
    }


}

$class = new Solution();

$root = [1,null,2,3];

$root = new TreeNode(1);
$root->left = new TreeNode(2);
$root->right = new TreeNode(3);
//$root->right->left = new TreeNode(3);

$res = $class->preorderTraversal4($root);

var_dump($res);exit;