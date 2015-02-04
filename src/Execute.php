<?php

namespace rock\execute;


use rock\base\ObjectInterface;
use rock\base\ObjectTrait;

abstract class Execute implements ObjectInterface
{
    use ObjectTrait;

    /**
     * @param string $value
     * @param array $params
     * @param array $data
     * @return mixed
     */
    abstract public function get($value, array $params = null, array $data = null);
} 