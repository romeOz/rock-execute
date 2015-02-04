<?php

namespace rock\execute;


class EvalExecute extends Execute
{
    /**
     * @inheritdoc
     */
    public function get($value, array $params = null, array $data = null)
    {
        return eval($value);
    }
} 