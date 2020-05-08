<?php

class Solution {

    /**
     * @param String[] $strs
     * @return String[][]
     */
    function groupAnagrams($strs) {
        $len = count($strs);
        $map = [];

        for($i=0;$i<$len;$i++){
            $keyArr = str_split($strs[$i]);
            sort($keyArr);
            $str = implode('', $keyArr);
            $map[$str][] =  $strs[$i];
        }

        return $map;
    }

    /**
     * 计算每个字母的出现的个数
     * @param [type] $strs
     *
     * @return void
     * @thinking
     */
    function groupAnagrams1($strs) {
        $len = count($strs);
        $map = array_fill(0,26,0);
        $res = [];
        //print_r($map);exit;

        for($i=0;$i<$len;$i++){
            $strlen = strlen($strs[$i]);
            for($j=0;$j<$strlen;$j++){
               $map[ord($strs[$i][$j])-ord('a')]++;
            }

            $key = '';
            for($k=0;$k<26;$k++){
                while($map[$k]){
                    $key .= chr($k+ord('a'));
                    $map[$k]--;
                }
            }
            $res[$key][] =  $strs[$i];
        }

        return $res;
    }
}

$s = new Solution();

$strs = ["eat", "tea", "tan", "ate", "nat", "bat"];

print_r($s->groupAnagrams1($strs));