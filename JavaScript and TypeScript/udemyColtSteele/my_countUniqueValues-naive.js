// Accepts a sorted array and counts the unique values in it
// Can have negative numbers
// Naive
function countUniqueValues(sortedArr) {
	let count = 0;
	for (let i = 0; i < sortedArr.length; i++) {
		var newIndex = 1;

		for (let j = newIndex; j < sortedArr.length; j++) {
			if (sortedArr[i] < sortedArr[j]) {
				
				count++;
			}
		}
	}
	return count;
}


countUniqueValues([1,1,1,1,2]);
countUniqueValues([1,2,3,4,4,4,7,7,12,12,13]);
countUniqueValues([]);
countUniqueValues([-2,-1,-1,0,1]);

// use two pointers
// get value in array
// check for uniqueness
// add to count
