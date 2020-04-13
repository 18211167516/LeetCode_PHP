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

    /**
     * @param Integer[] $preorder
     * @param Integer[] $inorder
     * @return TreeNode
     */
    function buildTree($preorder, $inorder) {
       return $this->build($preorder,$inorder,0,count($preorder)-1,0,count($inorder)-1);
    }

    /**
     *        28
     *     16     30
     *  13   22 29  43
     * 
     * $left = [28,16,13,22,30,29,43]
     * $zhon = [13,16,22,28,29,30,43]
     * @param [type] $preorder
     * @param [type] $inorder
     * @param [type] $preStart
     * @param [type] $preEnd
     * @param [type] $inoStart
     * @param [type] $inoEnd
     *
     * @return void
     */
    private function build($preorder,$inorder,$preStart,$preEnd,$inoStart,$inoEnd){
        //停止递归
        if ($preStart > $preEnd || $inoStart > $inoEnd) {return null;}
        //前序中左起第一位肯定是根结点
         $root = new TreeNode($preorder[$preStart]);
         $rootIndex = array_search($preorder[$preStart],$inorder);
         $leftLen = $rootIndex-$inoStart;
         $root->left = $this->build($preorder,$inorder,$preStart+1,$preStart+$leftLen,$inoStart,$inoEnd);
         $root->right = $this->build($preorder,$inorder,$preStart+1+$leftLen,$preEnd,$rootIndex+1,$inoEnd);
         return $root;
    }


    function buildTree2($inorder, $preorder) {
        $count = count($inorder);
        //$posIndex = $count-1;
        $preIndex = 0;
        return $this->build2($inorder,$preorder,0,$count-1,$preIndex);

    }

    /**
     * $preorder = [3,9,20,15,7];
     * $inorder = [9,3,15,20,7];
     * $postorder = [9,15,7,20,3];
     * @return void
     */
    function build2($inorder,$preorder,$leftIndex,$rightIndex,&$preIndex){
        //终止条件
        if ($leftIndex > $rightIndex) {
            return null;
        }
        //在前序序遍历找到根节点
        $root = new TreeNode($preorder[$preIndex]);
        //找到根节点在中序遍历的位置
        $rootIndex = array_search($root->val,$inorder);
        
        $preIndex++;
        //$rootIndex  左边是左子树
        $root->left  = $this->build2($inorder,$preorder,$leftIndex,$rootIndex-1,$preIndex);
        //$rootIndex  右边是右子树
        $root->right = $this->build2($inorder,$preorder,$rootIndex+1,$rightIndex,$preIndex);
        return $root;
    }
}

$s= new Solution();

$preorder = [3,9,20,15,7];
$inorder = [9,3,15,20,7];

$res = $s->buildTree($preorder,$inorder);
var_dump(json_encode($res));

$res2 = $s->buildTree2($inorder, $preorder);
var_dump(json_encode($res2));