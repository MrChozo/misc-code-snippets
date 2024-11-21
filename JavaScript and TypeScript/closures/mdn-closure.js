function outside(x) {
    function inside(y) {
        return x + y;
    }
    return inside;
}

const fnInside = outside(3); // Think of it like: give me a function that adds 3 to whatever you give it

console.log(fnInside(5)); // 8
console.log(outside(3)(5)); // 8
