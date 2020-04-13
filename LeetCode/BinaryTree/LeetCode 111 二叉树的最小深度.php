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
     * @return Integer
     */
    function minDepth($root) {
        if($root ==null ) return 0;
        if($root->left == null) return $this->minDepth($root->right)+1;
        if($root->right== null) return $this->minDepth($root->left)+1; 
        return min($this->minDepth($root->left),$this->minDepth($root->right))+1;
    }


    function minDepth2($root){
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
                    break 2;
                }
                if($node->left !=null) array_push($arr,$node->left);
                if($node->right !=null) array_push($arr,$node->right);
            }
        }

        return $min;
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
$root->right->left->left = new TreeNode(50);

$res = $class->minDepth($root);
$res2 = $class->minDepth2($root);
var_dump($res);
var_dump($res2);
exit;
