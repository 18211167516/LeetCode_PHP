<?php

namespace Leet\Other;

/**
 * @category 斐波那契数列 通常用 F(n) 表示，形成的序列称为斐波那契数列。
 * 该数列由 0 和 1 开始，后面的每一项数字都是前面两项数字的和。
 * @author baichonghua <18211167516@163.com>
 * @example 
 * F(0) = 0,   F(1) = 1
 * F(N) = F(N - 1) + F(N - 2), 其中 N>1
 * 
 * 2 = 1 F(1)+F(0)
 * 
 * 3 = 2 F(2) + F(1) = F(1)+F(1)+F(0)
 * 
 * 4 = 3 F(3) + F(2) = F(2) + F(1) + F(2) = F(1) + F(1) + F(1)   
 * 
 * @thinking1
 * 递归
 * 
 * @thinking2
 *
 * 将结果存储在map中，避免重复计算
 * 
 * @thinking3
 * 
 * Dp 动态规划
 * 
 * 0           F(0)
 * 1           F(1)
 * 2           F(2) F(1)+F(0)
 * 3           F(3) F(2)+F(1)
 * 5           F(4) F(3)+F(2)
 * 8           F(5) F(4)+F(3)
 */

class Solution {

    public $map = [];
    /**
     * @param Integer $N
     * @return Integer
     */
    function fib1($N) {
        return $N<2?$N:$this->fib1($N-1)+$this->fib1($N-2);
    }

    /**
     * 缓存计算数空间换时间
     * @param [type] $N
     *
     * @return void
     */
    function fib2($N){
        return $this->map[$N]?? $this->map[$N] = $N<2?$N:$this->fib2($N-1)+$this->fib2($N-2);
    }

    /**
     * Dp 动态规划
     * @param [type] $N
     *
     * @return void
     */
    function fib3($N){
        if ($N<2) {
            return $N;
        }
        if ($N==2) {
            return 1;
        }

        //从N=3开始
        $curr = 0;
        $prev1 = 1;//F(1) 1
        $prev2 = 1;//F(2) 1
        while($N>2){
            $curr = $prev1+$prev2;
            $prev1 = $prev2;
            $prev2 = $curr;
            $N--;
        }
        return $curr;
    }
}

$s = new Solution();

print_r($s->fib1(6));
print_r($s->fib2(6));
print_r($s->fib3(6));