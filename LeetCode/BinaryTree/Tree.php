<?php
class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($value) { $this->val = $value; }
}

class Tree{
    private $arr, $len;
    public function createTree(array $arr){
        if ($arr == null)  return null;
        $this->arr = (array)$arr;
        $this->len = count($this->arr);
        $root = new TreeNode($this->arr[0]);    //数组第一个为根结点
        $root->left = $this->generate(1);       //根据数组下标进行构建二叉树
        $root->right = $this->generate(2);
        return $root;
    }

    private function generate($index)
    {
        if ($this->arr[$index] == 'null') {          //为#则构建节点后直接返回
            $node = new TreeNode(null);
            return $node;
        }
        $node = new TreeNode($this->arr[$index]); //有值则按照具体值构建子节点
        $key = $index * 2 + 1;                    //二叉树在数组上的显示是2倍跳着的
        if ($key < $this->len) {                  //防止数组越界
            $node->left = $this->generate($key++);
        }
        if ($key < $this->len) {
            $node->right = $this->generate($key);
        }
        return $node;
    }
}