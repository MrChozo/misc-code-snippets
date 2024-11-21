function outside(x) {
    console.log("x:", x);

    function inside(y) {
        console.log("y:", y);
        return x + y;
    }
    return inside;
}

const fnInside = outside(2);

console.log(fnInside(5));
console.log(outside(3)(5));
