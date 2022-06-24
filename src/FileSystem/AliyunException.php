<?php

namespace Jewdore\AliyunOssFileSystem\Flysystem;

use League\Flysystem\FilesystemException;
use RuntimeException;

class AliyunException extends RuntimeException implements FilesystemException
{
}
