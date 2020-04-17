<?php

namespace Leet\LinkedList;

class ListNode{
    public $val;
    public $next=null;
    public function __construct($val)
    {
        $this->val  = $val;
    }
}