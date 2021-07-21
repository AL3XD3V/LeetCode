<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s) {
        $longest = 0;
        $sLen = strlen($s);
        
        for ($i = 0; $i < $sLen; $i++) {
            $current = '';
            
            for ($j = $i; $j < $sLen; $j++) {
                $char = substr($s, $j, 1);
                
                if (strpos($current, $char) === false) {
                    $current .= $char;
                    continue;
                }
                
                break;
            }
            
            if (strlen($current) > $longest) {
                $longest = strlen($current);
            }
        }
        
        return $longest;
    }
}