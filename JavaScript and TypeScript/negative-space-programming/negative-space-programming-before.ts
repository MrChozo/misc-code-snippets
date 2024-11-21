import { assert } from "node.console";

type Foo = {
  bar?: number
}

function morphFoo(foo: Foo): number {
  return foo.bar * 5;
}
