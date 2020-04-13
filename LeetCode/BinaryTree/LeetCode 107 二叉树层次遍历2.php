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
        while($count = count($arr)){
            for($i=$count;$i>0;$i--){
                $node = array_shift($arr);//先入先出
                $levelArr[] = $node->val;
                if($node->left !=null) array_push($arr,$node->left);
                if($node->right !=null) array_push($arr,$node->right);
            }
            array_unshift($res, $levelArr);
            $levelArr = [];
        }
        return $res;
    }

    function levelOrder2($root) {
        $res = $arr2=[];
        $arr = new SplQueue();
        if($root ==null){
            return $res;
        }
        $arr->enqueue($root);
        while($count=$arr->count()){
            for($i=$count;$i>0;$i--){
                $node = $arr->dequeue();//删除第一位
                $arr2[] = $node->val;
                if($node->left !=null) $arr->enqueue($node->left);
                if($node->right !=null) $arr->enqueue($node->right);
            }
            array_unshift($res, $arr2);
            $arr2 = [];
        }
        return $res;
    }

    function levelOrder3($root){
        $res  = [];
        $this->level($root, 0, $res);
        return $res;
    }

    function level($root, $level, &$res)
    {
        if($root == null) return;
        if($level == count($res)){
            array_unshift($res,[]);//递归进来的先插一个空数组在头部
        }
        //计算在那个key   count($res) - $level - 1
        array_push($res[count($res) - $level - 1], $root->val);
        $this->level($root->left, $level+1, $res);
        $this->level($root->right, $level+1, $res);
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