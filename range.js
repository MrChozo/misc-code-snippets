// Working
function range(start, end) {
	var array = [];
	for (var i = start; i <= end; i++) {
		array.push(i);
	}
	return array;
}

function sumArray(arrayToSum) {
	var total = 0;
	for (var i = 0; i < arrayToSum.length; i++) {
    	total = total + arrayToSum[i];
	}
	return total;
}


console.log(sumArray(range(1,10)));




// i + step as the 3rd part of a "for" statement is no good.
function range(start, end) {
	var rangeArray = [];

	var step = 1;
	if (arguments.length > 2) {
		step = arguments[2];
	}

	for (var i = start; i <= end; i += step) {
		rangeArray.push(i);
	}
	
	return rangeArray;
}

function sumArray(arrayToSum) {
	var total = 0;
	for (var i = 0; i < arrayToSum.length; i++) {
    	total = total + arrayToSum[i];
	}
	return total;
}


console.log(range(1, 10, 2));