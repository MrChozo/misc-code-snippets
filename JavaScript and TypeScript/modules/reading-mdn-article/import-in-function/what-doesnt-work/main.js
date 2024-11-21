// Can I import inside another function?

function myFunc() {
    import { foo } from "./modules/myModule.js";

    foo(2);
}

myFunc();

// Apparently not.
// Result from Chrome: "Uncaught SyntaxError: Unexpected token '{'"