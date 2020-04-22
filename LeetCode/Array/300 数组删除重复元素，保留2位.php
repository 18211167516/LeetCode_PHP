<?php

class Solution{
    function removeDuplicates(&$nums) {
        $len = count($nums);
        if($len<=2) return $len;
        $i=0;
        $count = 1;
        while($i<$len){
           if($nums[$i] == $nums[$i+1]){
               $count++;
               if($count>2){
                   unset($nums[$i+1]);
                   $nums = array_values($nums);
                   $i--;
                   $len--;
                   $count--;
               }
           }else{
               $count =1;
            }
            $i++;
        }
        
        return $len;
    }
}

$a = new Solution();

$nums = [0,0,0,0,0];
print_r($a->removeDuplicates($nums));