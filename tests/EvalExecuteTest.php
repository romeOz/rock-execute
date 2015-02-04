<?php

namespace rockunit;


use rock\execute\EvalExecute;

class EvalExecuteTest extends \PHPUnit_Framework_TestCase
{
    protected $code = 'if ($params["value"] > 1 && $params["value"] < 3) return "success"; else return "fail";';

    public function testGet()
    {
        $execute = new EvalExecute();
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
