<?php

namespace Jewdore\AliyunOssFileSystem;

use Jewdore\AliyunOssFileSystem\Flysystem\AliyunFactory;
use Jewdore\AliyunOssFileSystem\Macros\AliyunMacro;
use Jewdore\AliyunOssFileSystem\Macros\AppendFile;
use Jewdore\AliyunOssFileSystem\Macros\AppendObject;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\Filesystem;

class AliyunServiceProvider extends ServiceProvider
{
    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function boot(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . "/../config/config.php",
            "filesystems.disks.oss"
        );

        $this->app->make("filesystem")
            ->extend("oss", function (Application $app, array $config) {
                $adapter = (new AliyunFactory())->createAdapter($config);
                $driver = (new Filesystem($adapter));
                $filesystem = new FilesystemAdapter($driver, $adapter, $config);
                $this->registerMicros($filesystem, array_merge($this->defaultMacros, $config["macros"] ?? []));
                return $filesystem;
            });
    }

    /**
     * @var array
     */
    protected $defaultMacros = [
        AppendFile::class,
        AppendObject::class,
    ];

    /**
     * @param FilesystemAdapter $filesystemAdapter
     * @param array $macros
     */
    protected function registerMicros(FilesystemAdapter $filesystemAdapter, array $macros): void
    {
        foreach ($macros as $macro) {
            if (!class_exists($macro)) {
                continue;
            }
            $aliyunMacro = new $macro();
            if (!$aliyunMacro instanceof AliyunMacro) {
                continue;
            }
            if ($filesystemAdapter->hasMacro($aliyunMacro->name())) {
                continue;
            }
            $filesystemAdapter::macro($aliyunMacro->name(), $aliyunMacro->macro());
        }
    }
}
