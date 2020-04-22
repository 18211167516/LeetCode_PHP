<?php

class Solution {

    /**
     * @param Integer[] $A
     * @param Integer $m
     * @param Integer[] $B
     * @param Integer $n
     * @return NULL
     */
    function merge(&$A, $m, $B, $n) {
        //
        if(empty($B)){
            return $A;
        }elseif(empty($A)){
            return $B;
        }else{
            $curra = $currb = 0;
            $arr = [];
            while($currb<$n || $curra<$m){
                if($curra == $m){
                    $arr[] = $B[$currb];
                    $currb++;
                }elseif($currb == $n){
                    $arr[] = $A[$curra];
                    $curra++;
                }elseif($A[$curra]<$B[$currb]){
                    $arr[] = $A[$curra];
                    $curra++;
                }else{
                    $arr[] = $B[$currb];
                    $currb++;
                }
            }

            return $arr;
        }
    }

    /**
     * 尾插法
     * @param [type] $A
     * @param [type] $m
     * @param [type] $B
     * @param [type] $n
     *
     * @return void
     * @thinking
     */
    function merge2(&$A, $m, $B, $n) {
        //
        if(empty($B)){
            return $A;
        }elseif(empty($A)){
            return $B;
        }else{
            $curra = $m-1;
            $currb = $n-1;
            $tail = $m+$n-1;//占位尾部指针
            while($currb>=0 || $curra>=0){
                if($curra == -1){
                    $A[$tail] = $B[$currb];
                    $currb--;
                }elseif($currb == -1){
                    $A[$tail] = $A[$curra];
                    $curra--;
                }elseif($A[$curra]<$B[$currb]){
                    $A[$tail] = $B[$currb];
                    $currb--;
                }else{
                    $A[$tail] = $A[$curra];
                    $curra--;
                }
                $tail--;
            }

            return $A;

        }
    }

}

$a = new Solution();
$A=[1,2,4,0,0,0];
$m=3;
$B=[3,5,6];
$n=3;

print_r($a->merge2($A,$m,$B,$n));