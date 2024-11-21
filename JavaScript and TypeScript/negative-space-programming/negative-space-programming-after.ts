import { assert } from "node.console";

type Foo = {
  bar?: number
}

function morphFoo(foo: Foo): number {
  assert(foo.bar !== undefined, "foo must exist");

  return foo.bar * 5;
}
