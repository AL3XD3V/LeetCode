<?php

/**
 * Runtime: 236 ms, faster than 32.84% of PHP online submissions for Longest Substring Without Repeating Characters.
 * Memory Usage: 15.6 MB, less than 79.70% of PHP online submissions for Longest Substring Without Repeating Characters.
 */
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