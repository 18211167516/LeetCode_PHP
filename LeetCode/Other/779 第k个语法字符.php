<?php

namespace Leet\Other;

/**
 * @category 在第一行我们写上一个 0。接下来的每一行，将前一行中的0替换为01，1替换为10。
 *           给定行数 N 和序数 K，返回第 N 行中第 K个字符。（K从1开始）
 *
 * @author baichonghua <18211167516@163.com>
 * @example 
 * 
 * 0                     N=1 K=1  0
 * 01                    N=2 k=1  0 k=2 1 
 * 0110                  N=3 k=1  0 k=2 1 k=3 1 k=4 0
 * 01101001              N=4 k=1  0 k=2 1 k=3 1 k=4 0 k=5 1 k=6 0 k=7 0 k=8 0
 * 0110100110010110      N=5 K=1  0 
 * @thinking
 */
class Solution{
    function kthGrammar($N,$K){
        if ($K==1) {
            return 0;
        }
        return (~$K & 1) ^ $this->kthGrammar($N-1, ($K+1)>>1);
    }

}

$a = new Solution();
print_r($a->kthGrammar(3,3));