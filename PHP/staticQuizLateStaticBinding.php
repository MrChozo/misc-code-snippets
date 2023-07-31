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


