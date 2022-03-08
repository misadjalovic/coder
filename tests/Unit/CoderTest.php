<?php

namespace Tests\Unit;

use Misadjalovic\Coder\Coder;
use PHPUnit\Framework\TestCase;
use RangeException;
use TypeError;


class CoderTest extends TestCase
{

    public function testStrengthCannotBeGreaterThanThree()
    {
        try {
            $coder = new Coder();
            $coder->generate(4,6);
            $this->fail("Expected Exception has not been raised.");
        } catch (RangeException $ex) {
            $this->assertEquals("Unable to generate: Strenght can range from 1 to 3.", $ex->getMessage());
        }
    }

    public function testStrengthCannotBeLessThanOne()
    {
        try {
            $coder = new Coder();
            $coder->generate(0,6);
            $this->fail("Expected Exception has not been raised.");
        } catch (RangeException $ex) {
            $this->assertEquals("Unable to generate: Strenght can range from 1 to 3.", $ex->getMessage());
        }
    }

    public function testLenghtCannotBeLessThanSix()
    {
        try {
            $coder = new Coder();
            $coder->generate(2,1);
            $this->fail("Expected Exception has not been raised.");
        } catch (RangeException $ex) {
            $this->assertEquals("Unable to generate: Lenght cannot be less than 6.", $ex->getMessage());
        }
    }

    public function testLenghtCannotBeString()
    {
        try {
            $coder = new Coder();
            $coder->generate(2,'ss');
            $this->fail("Expected Exception has not been raised.");
        } catch (TypeError $ex) {
            $this->addToAssertionCount(1);
        }
    }

    public function testStrengthCannotBeString()
    {
        try {
            $coder = new Coder();
            $coder->generate('f',3);
            $this->fail("Expected Exception has not been raised.");
        } catch (TypeError $ex) {
            $this->addToAssertionCount(1);
        }
    }

    //WEAKEST
    public function testWeakestCodeHasMinOneLowerCaseLetter()
    {
        $coder = new Coder();
        $code = $coder->generate(1,10);

        if (!preg_match("/[a-z]/", $code)) {
            $this->fail();
        }

        $this->assertTrue(true);
    }
    public function testWeakestCodeHasMinTwoUpperCaseLetter()
    {
        $coder = new Coder();
        $code = $coder->generate(1,10);

        preg_match_all("/[A-Z]/", $code,$matches);

        if (count($matches[0]) < 2) {
            $this->fail();
        }

        $this->assertTrue(true);
    }
    public function testWeakestCodeDoesNotHaveDigits()
    {
        $coder = new Coder();
        $code = $coder->generate(1,10);

        if (preg_match("/[2-5]/", $code)) {
            $this->fail();
        }

        $this->assertTrue(true);
    }
    public function testWeakestCodeDoesNotHaveSpecialChars()
    {
        $coder = new Coder();
        $code = $coder->generate(1,10);

        if (preg_match("/[(!|#|$|%|&|(|)|{|}|[|\]|=)]/", $code)) {
            $this->fail();
        }

        $this->assertTrue(true);
    }

    //MIDDLE
    public function testMidCodeHasMinOneLowerCaseLetter()
    {
        $coder = new Coder();
        $code = $coder->generate(2,10);

        if (!preg_match("/[a-z]/", $code)) {
            $this->fail();
        }

        $this->assertTrue(true);
    }
    public function testMidCodeHasMinTwoUpperCaseLetter()
    {
        $coder = new Coder();
        $code = $coder->generate(2,10);

        preg_match_all("/[A-Z]/", $code,$matches);

        if (count($matches[0]) < 2) {
            $this->fail();
        }

        $this->assertTrue(true);
    }
    public function testMidCodeHasDigits()
    {
        $coder = new Coder();
        $code = $coder->generate(2,10);

        if (!preg_match("/[2-5]/", $code)) {
            $this->fail();
        }

        $this->assertTrue(true);
    }
    public function testMidCodeDoesNotHaveSpecialChars()
    {
        $coder = new Coder();
        $code = $coder->generate(2,10);

        if (preg_match("/[(!|#|$|%|&|(|)|{|}|[|\]|=)]/", $code)) {
            $this->fail();
        }

        $this->assertTrue(true);
    }

    //STRONGEST
    public function testStrongestCodeHasMinOneLowerCaseLetter()
    {
        $coder = new Coder();
        $code = $coder->generate(3,10);

        if (!preg_match("/[a-z]/", $code)) {
            $this->fail();
        }

        $this->assertTrue(true);
    }
    public function testStrongestCodeHasMinTwoUpperCaseLetter()
    {
        $coder = new Coder();
        $code = $coder->generate(3,10);

        preg_match_all("/[A-Z]/", $code,$matches);

        if (count($matches[0]) < 2) {
            $this->fail();
        }

        $this->assertTrue(true);
    }
    public function testStrongestCodeHasDigits()
    {
        $coder = new Coder();
        $code = $coder->generate(3,10);

        if (!preg_match("/[2-5]/", $code)) {
            $this->fail();
        }

        $this->assertTrue(true);
    }
}
