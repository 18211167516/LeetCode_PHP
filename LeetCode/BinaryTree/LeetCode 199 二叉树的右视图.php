
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
    public function rightSideView($root)
    {
        $res = $arr = [];
        if ($root ==null) {
            return $res;
        }
        array_push($arr, $root);
        while ($count = count($arr)) {
            for ($i=$count;$i>0;$i--) {
                $node = array_shift($arr);//先入先出
                $tmp = $node->val;
                if ($node->left !=null) {
                    array_push($arr, $node->left);
                }
                if ($node->right !=null) {
                    array_push($arr, $node->right);
                }
            }
            $res[] = $tmp;
            $res[] = $tmp;
            return $res;
        }
    }


    /**
     * 递归算法
     * @param [type] $root
     *
     * @return void
     */
    public function rightSideView2($root)
    {
        $res = [];
        $this->level($root, 0, $res);
        return $res;
    }

    function level($root, $level, &$res)
    {
        //深度算法 先读右子树
        if ($root == null) return;
        if($level == count($res)) $res[] = $root->val;
        $this->level($root->right, $level+1, $res);//先读右
        $this->level($root->left, $level+1, $res);
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

$res = $class->rightSideView2($root);

print_r($res);