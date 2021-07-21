/**
 * Runtime: 252 ms, faster than 95.13% of Kotlin online submissions for Median of Two Sorted Arrays.
 * Memory Usage: 45.9 MB, less than 61.69% of Kotlin online submissions for Median of Two Sorted Arrays.
 */
class Solution {
    fun findMedianSortedArrays(nums1: IntArray, nums2: IntArray): Double {
        var nums1length = nums1.size;
        var nums2length = nums2.size;
        var numsLength = nums1length + nums2length;
        var halfIndex = Math.round((numsLength / 2).toDouble()).toInt();
        
        var medianIndexes: Array<Int>;
        if (numsLength % 2 == 0) {
            medianIndexes = arrayOf(((numsLength / 2) - 1).toInt(), (numsLength / 2).toInt());
        } else {
            medianIndexes = arrayOf(halfIndex);
        }
        
        if (nums1length == 0) {
             return getMedian(nums2, medianIndexes);
        }
        
        if (nums2length == 0) {
             return getMedian(nums1, medianIndexes);
        }
        
        var nums2currentIndex = 0;
        var mergedArray = IntArray(numsLength);
        for (i in 0..nums1length-1) {
            for (j in nums2currentIndex..nums2length-1) {
                if (nums2[j] <= nums1[i]) {
                    mergedArray[i + nums2currentIndex] = nums2[j];
                    nums2currentIndex++;
                } else {
                    break;
                }
            }
            
            mergedArray[i + nums2currentIndex] = nums1[i];
            
            if (i + nums2currentIndex > halfIndex) {
                break;
            }
        }
        
        for (j in nums2currentIndex..nums2length-1) {
            mergedArray[nums1length + nums2currentIndex] = nums2[j];
            nums2currentIndex++;
            if (nums1length + nums2currentIndex > halfIndex) {
                break;
            }
        }
        
        return getMedian(mergedArray, medianIndexes);
    }
    
    fun getMedian(array: IntArray, medianIndexes: Array<Int>): Double {
        var sum = 0;
        
        medianIndexes.forEach {
            sum += array[it];
        }
        
        return sum.toDouble() / medianIndexes.size.toDouble();
    }
}