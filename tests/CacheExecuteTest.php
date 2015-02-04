<?php

namespace rockunit;


use rock\execute\CacheExecute;

class CacheExecuteTest extends EvalExecuteTest
{
    public function testGet()
    {
        $execute = new CacheExecute(['path' => ROCKUNIT_RUNTIME]);
        $params = [
            'value' => 2
        ];
        // success
        $this->assertSame('success', $execute->get($this->code, $params));

        // fail
        $params = [
            'value' => 5
        ];
        $this->assertSame('fail', $execute->get($this->code, $params));
    }
}
