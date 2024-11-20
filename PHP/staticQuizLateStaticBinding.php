<?php

class MyClass {
    protected static function iam() {
        echo "MyClass ";
    }

    public static function youare() {
        static::iam();
    }
}

class A extends MyClass {
    public static function test() {
        MyClass::youare();
        self::youare();
        parent::youare();
        A::youare();
        static::youare();
    }

    public static function iam() {
        echo "A ";
    }
}

class B extends A {
    public static function iam() {
        echo "B ";
    }
}

B::test();

// Outputs "MyClass B B A B"


/*
 * # Output breakdown
 *
 * All outputs start with: Statically-used class `B` using method `test()`, which
 * it has inherited from class `MyClass`. `test()` fires off variations of the `iam()`
 * method via the `youare()` method found directly on `MyClass`.
 *
 * They are fired off using the different reference keywords (`self`, `parent`, etc.)
 * to prove out which class is actually being referred to and how usage of the `static`
 * keyword works.
 *
 *
 * ## Output 1) "MyClass "
 *
 * Statically-used class `MyClass` uses its direct method `youare()`. Its understanding
 * of `static::iam()` says that it should resolve using the method found on `MyClass`.
 *
 *
 * ## Output 2) "B "
 *
 * Statically-used `self` refers to class `B` which uses its inherited (grandfather)
 * method `youare()`. Its understanding of `static::iam()` says that it should resolve
 * using the method found on `B`.
 *
 *
 * ## Output 3) "B "
 *
 * ...
 *
 */
