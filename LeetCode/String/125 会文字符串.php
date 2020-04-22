<?php

class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function isPalindrome($s) {
        $s = preg_replace("/[^0-9a-z]/",'',$s);
        $len = strlen($s);
        $L=0;$R=$len-1;
        while($L<$R){
            if($s[$L] != $s[$R]){
                return false;break;
            }
            $L++;
            $R--;
        }

        return true;
    }

    function isPalindrome2($s) {
        $s = strtolower($s);
        $len = strlen($s);
        $L=0;$R=$len-1;
        while($L<$R){
            if(!ctype_alnum($s[$L])){
                $L++;
                continue;
            }
            if (!ctype_alnum($s[$R])) {
                $R--;
                continue;
            }

            
            if($s[$L] != $s[$R]){
                return false;break;
            }
            $L++;
            $R--;
        }

        return true;
    }
}

$a = new Solution();

$str = "A man, a plan, a canal: Panama";
$str = strtolower($str);
print_r($a->isPalindrome2($str));