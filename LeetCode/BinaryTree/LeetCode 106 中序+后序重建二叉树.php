<?php
class TreeNode {
         public $val = null;
         public $left = null;
         public $right = null;
         function __construct($value) { $this->val = $value; }
}
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution {
    function buildTree($inorder, $postorder) {
        $count = count($inorder);
        $posIndex = $count-1;
        return $this->build($inorder,$postorder,0,$count-1,$posIndex);

    }

    /**
     * 
     * $inorder = [9,3,15,20,7];//中序
     * $postorder = [9,15,7,20,3];//后续
     * 
     *    3 
     *      20
     *        7
     *         
     *        
     *       
     */
    function build($inorder,$postorder,$leftIndex,$rightIndex,&$posIndex){
        //终止条件
        if ($leftIndex > $rightIndex) {
            return null;
        }
        //在后序遍历找到根节点【最后一位】
        $root = new TreeNode($postorder[$posIndex]);
        //找到根节点在中序遍历的位置
        $rootIndex = array_search($root->val,$inorder);
        //得出左子树长度
        $posIndex--;
        //$rootIndex  右边是右子树
        $root->right = $this->build($inorder,$postorder,$rootIndex+1,$rightIndex,$posIndex);
        //$rootIndex  左边是左子树
        $root->left  = $this->build($inorder,$postorder,$leftIndex,$rootIndex-1,$posIndex);
        return $root;
    }
}

$s= new Solution();

$preorder = [3,9,20,15,7];//前序

$inorder = [9,3,15,20,7];//中序
$postorder = [9,15,7,20,3];//后续

/**
 * 1、后序遍历最后一个节点一定是根节点
 * 2、根节点对应在中序的位置左边是 左子树 右边是右子树
 * 3、后序遍历
 * 
 * 
 */
$res = $s->buildTree($inorder,$postorder);
var_dump(json_encode($res));