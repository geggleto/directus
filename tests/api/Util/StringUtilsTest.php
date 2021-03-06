<?php

use Directus\Util\StringUtils;

class StringUtilsTest extends PHPUnit_Framework_TestCase
{
    public function testContains()
    {
        $this->assertTrue(StringUtils::contains('I am learning the abc', 'abc'));
        $this->assertFalse(StringUtils::contains('I am John', 'Jack'));

        $this->assertTrue(StringUtils::contains('JavaScript, Java, PHP, C', ['Java', 'C']));
        $this->assertFalse(StringUtils::contains('JavaScript, Java, PHP, C', ['C#', 'C++']));
    }

    public function testStartsWith()
    {
        $string = 'john_mcclane';
        $this->assertTrue(StringUtils::startsWith($string, 'john'));
        $this->assertFalse(StringUtils::startsWith($string, 'mcclane'));
    }

    public function testEndsWith()
    {
        $string = 'john_marston';
        $this->assertTrue(StringUtils::endsWith($string, 'marston'));
        $this->assertFalse(StringUtils::endsWith($string, 'john'));
    }

    public function testLength()
    {
        $this->assertEquals(10, StringUtils::length('mr. falcon'));
    }

    public function testRandom()
    {
        $length = 10;
        $this->assertEquals(10, strlen(StringUtils::random($length)));
        $this->assertEquals(16, strlen(StringUtils::random()));
        $this->assertInternalType('string', StringUtils::random());
        $this->assertEquals(1, strlen(StringUtils::random(1)));
    }

    public function testRandomString()
    {
        $length = 10;
        $this->assertEquals(10, strlen(StringUtils::randomString($length)));
        $this->assertEquals(16, strlen(StringUtils::randomString()));
        $this->assertInternalType('string', StringUtils::randomString());
        $this->assertEquals(1, strlen(StringUtils::randomString(1)));
    }

    /**
     * @expectedException     InvalidArgumentException
     */
    public function testRandomHasException()
    {
        StringUtils::random(0);
    }

    public function testUnderscoreToCamelCase()
    {
        $this->assertSame('camelCase', StringUtils::underscoreToCamelCase('camel_case'));
        $this->assertSame('CamelCase', StringUtils::underscoreToCamelCase('camel_case', true));
    }

    public function testToCamelCase()
    {
        $this->assertSame('camelCase', StringUtils::toCamelCase('camel_case'));
        $this->assertSame('CamelCase', StringUtils::toCamelCase('camel_case', true));

        $this->assertSame('camelCase', StringUtils::toCamelCase('camel-case', false, '-'));
        $this->assertSame('CamelCase', StringUtils::toCamelCase('camel-case', true, '-'));
    }

    public function testCharSequence()
    {
        $this->assertSame('a', StringUtils::charSequence());
        $this->assertSame('b', StringUtils::charSequence('a'));
        $this->assertSame('aa', StringUtils::charSequence('z'));
        $this->assertSame('ab', StringUtils::charSequence('aa'));
    }
}
