<?php

class Solution {

    /**
     * @param Integer[] $pre
     * @param Integer[] $post
     * @return TreeNode
     */
    function constructFromPrePost($pre, $post) {
        //第一点前序遍历第一位是根几点
        //后序遍历尾部为根节点
        //第二点根据pre[1]的在post的位置算出左子树的长度
        //
        $preLength = count($pre);
        if(!$preLength) return null;
        $root = new TreeNode($pre[0]);
        if($preLength == 1) return $root;
        $L = array_search($pre[1],$post);
        $left = array_slice($pre,1,$L+1);
        $right = array_slice($pre,$L+1+1,$preLength);
        $root->left = $this->constructFromPrePost($left, array_slice($post,0,$L));
        $root->right = $this->constructFromPrePost($right,array_slice($post,$L+1,$preLength-1));
       
        
        return $root;
    }

    function constructFromPrePost2($pre, $post) {
        //第一点前序遍历第一位是根几点
        //后序遍历尾部为根节点
        //第二点根据pre[1]的在post的位置算出左子树的长度
        
        
    }
}