var foo = [
    // A-OK
    { name: 'foo' },
    // Throws error: "Object literal may only specify known properties, and 'foobar' does not exist in type '{ name: string; }'."
    { foobar: 'bar' },
    // Throws error: "Type 'number' is not assignable to type 'string'."
    { name: 12 }
];
console.log(foo);
