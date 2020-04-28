<?php

class Solution {

    /**
     * @param Integer[][] $matrix
     * @return Integer[]
     */
    function findDiagonalOrder($matrix) {
        $n = count($matrix);
        $m = count($matrix[0]);
        if(!$n) return [];
        $result = [];
        for($i=0;$i<$m;$i++){
            $x=$i;//m行
            $y=0;//n列
            $new = [];
            $new[] = $matrix[0][$i];
            while($x>=0 && $y<=$n){
                $leftPie = $this->getPie($matrix, --$x, ++$y);
                //echo sprintf('m = %s,n = %s,pie = %s', $x, $y, $leftPie),PHP_EOL;
                if(is_null($leftPie)){
                    break;
                }
                $new[] = $leftPie;
            }

            if(!($i & 1)){
                $new = array_reverse($new);
            }
            $result = array_merge($result,$new);
        }

        for($i=1;$i<$n;$i++){
            $x=$m-1;//m行
            $y=$i;//n列
            $new = [];
            $new[] = $matrix[$y][$x];
            while($x>=0 && $y<=$n){
                $leftPie = $this->getPie($matrix, --$x, ++$y);
                //echo sprintf('m = %s,n = %s,pie = %s', $x, $y, $leftPie),PHP_EOL;
                if(is_null($leftPie)){
                    break;
                }
                $new[] = $leftPie;
            }
            if(($x & 1)==0){
                $new = array_reverse($new);
            }
            $result = array_merge($result,$new);
        }

        return $result;
    }
                
    function getPie($matrix,$m,$n){
        return $matrix[$n][$m]??null;
    }
}

$a = new Solution();

$nums = [
    [1,2,3,4],
    [5,6,7,8],
    [9,10,11,12],
    [13,14,15,16]
];

print_r($a->findDiagonalOrder($nums));