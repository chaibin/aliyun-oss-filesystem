###  Laravel Oss Filesystem

Laravel 的Aliyun云存储OSS扩展，Fork自alphasnow/aliyun-oss-laravel，根据具体需求修改了部分代码。

- 客户端直传，通过postObject policy上传文件 `GetPostParams` 。
- 获取更多文件信息 `getMetaData`
- getTemporaryUrl 支持通过options指定HTTP_METHOD

### 安装

composer require jewdore/aliyun-oss-filesystem
