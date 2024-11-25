// Might have been a pseudo code example
// import { assert } from "node.console";

// This is working instead
import { strict as assert } from "assert";

type Foo = {
  bar?: number
}

function morphFoo(foo: Foo): number {
  assert(foo.bar !== undefined, "foo must exist");

  return foo.bar * 5;
}

console.log(morphFoo({ bar: 2 })); // Outputs: 10
