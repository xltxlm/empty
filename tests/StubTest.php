<?php

class SomeClass
{

    /**
     * SomeClass constructor.
     */
    public function __construct()
    {
        echo "<pre>-->";print_r(__LINE__);echo "<--@in ".__FILE__." on line ".__LINE__."\n";
    }

    public function doSomething()
    {
        return __FUNCTION__;
    }

    public function hello()
    {
        return "hello";
    }
}

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-15
 * Time: 下午 10:43
 */
class StubTest extends \PHPUnit\Framework\TestCase
{
    public function testStub()
    {
        // 为 SomeClass 类创建桩件。
        $stub = $this->createMock(SomeClass::class);
        $realObject=new SomeClass();
        // 配置桩件。
        $stub->method('doSomething')
            ->willReturn('foo');
        $stub->method('hello')
            ->willReturn($realObject->hello());

        // 现在调用 $stub->doSomething() 将返回 'foo'。
        $this->assertEquals('foo', $stub->doSomething());
        // 现在调用 $stub->doSomething() 将返回 'foo'。
        $this->assertEquals('hello', $stub->hello());
    }

    /**
     * 会调起原来类的构造函数
     */
    public function testStub2() {
        // Create a stub for the SomeClass class.
        $stub = $this->getMockBuilder('SomeClass')->getMock();

        // Configure the stub.
        $stub->expects($this->any())
            ->method('doSomething')
            ->will($this->returnValue('foo'));

        // Calling $stub->doSomething() will now return
        // 'foo'.
        $this->assertEquals('foo', $stub->doSomething());
        $this->assertEquals('hello', $stub->hello());
    }

}