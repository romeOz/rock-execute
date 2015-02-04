<?php

namespace rock\execute;


use rock\base\Alias;
use rock\helpers\FileHelper;

class CacheExecute extends Execute
{
    public $path = __DIR__;

    /**
     * @inheritdoc
     */
    public function get($value, array $params = null, array $data = null)
    {
        $path = static::preparePath($value);

        if (!file_exists($path) && !$this->createFile($path, $value)) {
            throw new ExecuteException(ExecuteException::NOT_CREATE_FILE, ['path' => $path]);
        }
        unset($value);

        return include($path);
    }


    /**
     * Create file
     *
     * @param string $path
     * @param string $value
     * @return bool
     */
    protected function createFile($path, $value)
    {
        return FileHelper::create($path, "<?php\n" . $value, LOCK_EX);
    }

    /**
     * @param string $value
     * @return string
     */
    protected function preparePath($value)
    {
        return Alias::getAlias($this->path) . DIRECTORY_SEPARATOR . md5($value) . '.php';
    }
}