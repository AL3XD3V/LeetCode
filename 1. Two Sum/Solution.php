<?php

//TODO: find solution faster than O(n2)

/**
 * Runtime: 1580 ms, faster than 23.66% of PHP online submissions for Two Sum.
 * Memory Usage: 16.2 MB, less than 83.44% of PHP online submissions for Two Sum.
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        $indexes = [];
        
        for ($i = 0; $i <= count($nums) - 2; $i++) {
            for ($j = $i + 1; $j <= count($nums) - 1; $j++) {
                if ($nums[$i] + $nums[$j] === $target) {
                    $indexes = [$i, $j];
                }
            }
        }
        
        return $indexes;
    }
}