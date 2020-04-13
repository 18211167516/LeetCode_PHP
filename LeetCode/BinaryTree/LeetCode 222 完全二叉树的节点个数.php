
<?php


class TreeNode {
      public $val = null;
      public $left = null;
      public $right = null;
      function __construct($value) { $this->val = $value; }
 }

class Solution
{

    /**
     * @param TreeNode $root
     * @return Integer[]

     */
    function countNodes($root) {
        if($root ==null) return 0;
        return 1+$this->countNodes($root->left) + $this->countNodes($root->right);
    }

    function countNodes2($root){
        if ($root == null) {
            return 0;
        }
        //先找树的高度
        $d = $this->getHeight($root);
        //计算最后一层
        return pow(2, $d) - 1;
    }

    function getHeight($root){
        if ($root == null) {
            return 0;
        }
        return $this->getHeight($root->left)+1;
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

$res = $class->countNodes2($root);

print_r($res);