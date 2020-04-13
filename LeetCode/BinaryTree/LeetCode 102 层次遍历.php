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
    function levelOrder($root) {
        $res = $arr = [];
        if($root ==null){
            return $res;
        }
        array_push($arr,$root);
        $level = 0;
        while($count = count($arr)){
            for($i=$count;$i>0;$i--){
                $node = array_shift($arr);//先入先出
                $res[$level][] = $node->val;
                if($node->left !=null) array_push($arr,$node->left);
                if($node->right !=null) array_push($arr,$node->right);
            }
            $level++;
        }
        return $res;
    }

    function levelOrder2($root) {
        $res = [];
        $arr = new SplQueue();
        if($root ==null){
            return $res;
        }
        $arr->enqueue($root);
        $level = 0;
        while($count=$arr->count()){
            for($i=$count;$i>0;$i--){
                $node = $arr->dequeue();//删除第一位
                $res[$level][] = $node->val;
                if($node->left !=null) $arr->enqueue($node->left);
                if($node->right !=null) $arr->enqueue($node->right);
            }
            $level++;
        }
        return $res;
    }

    function levelOrder3($root){
        $res = [];
        $this->level($root, 0, $res);
        return $res;
    }

    function level($root,$level,&$res){
        if($root == null){
            return null;
        }
        $res[$level][]= $root->val;
        $level++;
        if ($root->left !=null) {
            $this->level($root->left, $level, $res);
        }
        if ($root->right !=null) {
            $this->level($root->right, $level, $res);
        }
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
$root->left = new TreeNode(2);
$root->right = new TreeNode(3); */

$res = $class->levelOrder3($root);

print_r($res);