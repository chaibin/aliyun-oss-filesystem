<?php

namespace Jewdore\AliyunOssFileSystem\FileSystem;

use League\Flysystem\FilesystemException;
use RuntimeException;

class AliyunException extends RuntimeException implements FilesystemException
{
}
