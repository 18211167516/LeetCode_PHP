<?php
class Node{
    public $val;
    public $next=null;
    public $prev=null;
    public function __construct($val)
    {
        $this->val  = $val;
    }
}

class MyLinkedList {
    /**
     * Initialize your data structure here.
     */
    function __construct($val=null) {
        $this->header = new Node(null);
        $this->size = 0;
    }
  
    /**
     * Get the value of the index-th node in the linked list. If the index is invalid, return -1.
     * @param Integer $index
     * @return Integer
     */
    function get($index) {
        $current = $this->header;
        if($index>$this->size-1){
            return -1;
        }
        $i =0;
        while($current->next!=null){
            $current = $current->next;
            if($i == $index){
                return $current->val;
            }
            $i++;
        }
        return -1;
    }
  
    /**
     * Add a node of value val before the first element of the linked list. After the insertion, the new node will be the first node of the linked list.
     * @param Integer $val
     * @return NULL
     */
    function addAtHead($val) {
        $node = new Node($val);
        $current = $this->header;
        $node->next = $current->next;
        $current->next = $node;
        $this->size++;
    }
  
    /**
     * Append a node of value val to the last element of the linked list.
     * @param Integer $val
     * @return NULL
     */
    function addAtTail($val) {
        $current = $this->header;
        while($current->next !=null){
            $current = $current->next;
        }
        $node = new Node($val);
        $node->prev = $current;
        $current->next = $node;
        $this->size++;
    }
  
    /**
     * Add a node of value val before the index-th node in the linked list. If index equals to the length of linked list, the node will be appended to the end of linked list. If index is greater than the length, the node will not be inserted.
     * @param Integer $index
     * @param Integer $val
     * @return NULL
     */
    function addAtIndex($index, $val) {
        if($index>$this->size){
            return;
        }
        if($index<=0){
            return $this->addAtHead($val);
        }
        if($index == $this->size){
            return $this->addAtTail($val);
        }
        $current = $this->header;
        while($index>0){
            $current = $current->next;
            $index--;
        }

        $node = new Node($val);
        $current->next->prev = $node;
        $node->next = $current->next;
        $node->prev = $current;
        $current->next = $node;
        $this->size++;
    }
  
    /**
     * Delete the index-th node in the linked list, if the index is valid.
     * @param Integer $index
     * @return NULL
     */
    function deleteAtIndex($index) {
        if($index>=0 && $index<$this->size){
            $current = $this->header;
            while($index>0){
                $current = $current->next;
                $index--;
            }
            //删除尾部
            if($index+1 == $this->size){
                $current->prev->next = null;
            }else{
                $current->next->prev = $current->prev;
                //$current->prev->next = $current->next;
            }
            $this->size--;
        }else{
            return 'key not found linked list';
        }
    }
}

