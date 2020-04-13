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
        $levelArr = [];
        $level = 1;
        while($count = count($arr)){
            for($i=$count;$i>0;$i--){
                $node = array_shift($arr);//先入先出
                $levelArr[] = $node->val;
                if($node->left !=null) array_push($arr,$node->left);
                if($node->right !=null) array_push($arr,$node->right);
            }

            if ($level%2 == 0) {
                $levelArr = array_reverse($levelArr);
            }
            array_push($res, $levelArr);
            $level++;
            $levelArr = [];
        }
        return $res;
    }

    function levelOrder3($root){
        $res  = [];
        $this->level($root, 0, $res);
        return $res;
    }

    function level($root,$level,&$res){
        if($root == null){
            return null;
        }
        if($level >= count($res)){
            $res[$level] = [];
        }
        if(($level+1)%2==0){
            array_unshift($res[$level],$root->val);
        }else{
            array_push($res[$level],$root->val);
        }
        if ($root->left !=null) {
            $this->level($root->left, $level+1, $res);
        }
        if ($root->right !=null) {
            $this->level($root->right, $level+1, $res);
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

$root = new TreeNode(1);
$root->left = new TreeNode(2);
$root->right = new TreeNode(3); 
$root->left->left = new TreeNode(4);
$root->left->right = new TreeNode(5);

$res = $class->levelOrder3($root);

print_r($res);