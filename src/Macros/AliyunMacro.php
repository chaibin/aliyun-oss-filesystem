<?php

namespace Jewdore\AliyunOssFileSystem\Macros;

use Closure;

interface AliyunMacro
{
    /**
     * @return string
     */
    public function name(): string;

    /**
     * @return Closure
     */
    public function macro(): Closure;
}
