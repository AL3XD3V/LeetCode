<?php

/**
 * Runtime: 32 ms, faster than 86.96% of PHP online submissions for Median of Two Sorted Arrays.
 * Memory Usage: 15.8 MB, less than 95.65% of PHP online submissions for Median of Two Sorted Arrays.
 */
class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2)
    {
        $nums1length = count($nums1);
        $nums2length = count($nums2);
        
        $numsLength = $nums1length + $nums2length;
        
        $medianIndexes = ($nums1length + $nums2length) % 2 === 0
                          ? [(int)($numsLength / 2) - 1, (int)($numsLength / 2)]
                          : [(int)round($numsLength / 2, 0, PHP_ROUND_HALF_DOWN)];
        
        if ($nums1length === 0) {
            return $this->findMedian($nums2, $medianIndexes);
        }
        
        if ($nums2length === 0) {
            return $this->findMedian($nums1, $medianIndexes);
        }
        
        $nums2currentIndex = 0;
        $mergedArray = [];
        for ($i = 0; $i < count($nums1); $i++) {
            for ($j = $nums2currentIndex; $j < count($nums2); $j++) {
                if ($nums2[$j] <= $nums1[$i]) {
                    $mergedArray[] = $nums2[$j];
                    $nums2currentIndex++;
                } else {
                    break;
                }
            }
            
            $mergedArray[] = $nums1[$i];
            
            if (count($mergedArray) > round($numsLength / 2, 0, PHP_ROUND_HALF_UP) + 1) {
                break;
            }
        }
        
        for ($j = $nums2currentIndex; $j < count($nums2); $j++) {
            $mergedArray[] = $nums2[$j];
            if (count($mergedArray) > round($numsLength / 2, 0, PHP_ROUND_HALF_UP) + 1) {
                break;
            }
        }
        
        return $this->findMedian($mergedArray, $medianIndexes);
    }
    
    function findMedian($array, $medianIndexes)
    {
        $sum = 0;
        foreach ($medianIndexes as $index) {
            $sum += $array[$index];
        }
        
        return $sum / count($medianIndexes);
    }
}