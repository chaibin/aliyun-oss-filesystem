<?php

namespace Jewdore\AliyunOssFileSystem\FileSystem\Plugins;

class GetPostParams extends AliyunOssAbstractPlugin
{
    /**
     * @return string
     */
    public function getMethod()
    {
        return 'getPostParams';
    }

    public function handle($object, $expiration)
    {
        return $this->adapter->getPostParams($object, $expiration);
    }
}
