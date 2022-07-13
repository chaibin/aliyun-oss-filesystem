<?php

namespace Jewdore\AliyunOssFileSystem\FileSystem\Plugins;

class PutResult extends AliyunOssAbstractPlugin
{
    /**
     * @return string
     */
    public function getMethod()
    {
        return 'putResult';
    }

    /**
     * @param string $path
     * @param mixed $content
     * @param int $position
     * @param array $config
     * @return int
     * @throws \OSS\Core\OssException
     */
    public function handle($path, $content, $config = [])
    {
        return $this->adapter->write(
            $path,
            $content,
            $this->prepareConfig($config)
        );
    }
}
