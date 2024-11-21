// Example of $.Deferred() provided by ChatGPT

var deferred1 = $.Deferred();
var deferred2 = $.Deferred();

deferred1.then(function(result) {
    console.log("Step 1:", result);
    return deferred2;
}).then(function(result) {
    console.log("Step 2:", result);
});

deferred1.resolve("Step 1 completed");
deferred2.resolve("Step 2 completed");

// Outputs:

// Step 1: Step 1 completed
// Step 2: Step 2 completed






