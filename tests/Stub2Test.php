<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-15
 * Time: 下午 10:46
 */
class Stub2Test extends \PHPUnit\Framework\TestCase
{
    public function testStub()
    {
        // 为 SomeClass 类建立桩件。
        $stub = $this->getMockBuilder($originalClassName)
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->disableArgumentCloning()
            ->disallowMockingUnknownTypes()
            ->getMock();

        // 配置桩件。
        $stub->method('doSomething')
            ->willReturn('foo');

        // 现在调用 $stub->doSomething() 将返回 'foo'。
        $this->assertEquals('foo', $stub->doSomething());
    }
}