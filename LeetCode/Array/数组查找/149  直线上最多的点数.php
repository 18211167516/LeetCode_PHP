<?php

class Solution {

    /**
     * @param Integer[][] $points
     * @return Integer
     */
    function maxPoints($points) {
        $len = count($points);
        if ($len<3) {
            return $len;
        }
        $max_count =1;
        for($i=0;$i<$len-1;$i++){
            $max_count = max($this->maxLinei($i,$len), $max_count);
        }
        return $max_count;
    }

    function maxLinei($i,$n){
        $lines = [];
        $horisontal_lines = 1;
        $count =1;
        $duplicates = 0;
        for($j=$i+1;$j<$n;$j++){
            
        }
    }
}

$points = [[1,1],[1,1],[2,3]];

$s = new Solution();

print_r($s->maxPoints($points));