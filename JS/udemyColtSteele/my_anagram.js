function validAnagram(string1, string2) {
  if (string1.length !== string2.length) {
    return false;
  }
  let freqCounter1 = {};
  let freqCounter2 = {};
  for (let char of string1) {
    freqCounter1[char] = (freqCounter1[char] || 0) + 1;
  }
  for (let char of string2) {
    freqCounter2[char] = (freqCounter2[char] || 0) + 1;
  }
  console.log(freqCounter1);
  console.log(freqCounter2);
  for (let key in freqCounter1) {
  	if (!(key in freqCounter2)) {
  		return false;
  	}
  	if (freqCounter2[key] !== freqCounter1[key]) {
  		return false;
  	}
  }
  return true;
}


validAnagram('cowboy', 'boowcy');