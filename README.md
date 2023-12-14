# PHP FTP 客户端管理器

一个简单的 PHP FTP 客户端连接管理工具

## 特性

- 支持断线重连
- 支持单例模式
- 支持动态切换连接
- 支持设置根目录

## 安装
~~~
composer require axguowen/ftp-client
~~~

## 使用

### 配置连接
~~~php
use \axguowen\facade\FtpClient;

// FTP服务器配置信息设置（全局有效）
FtpClient::setConfig([
    // 默认连接本机
    'default' => 'localhost',
    // 临时文件目录
    'temp_dir' => '',
    // 连接配置
    'connections' => [
        // 本机连接参数
        'localhost' => [
            // 主机
            'host'              => '127.0.0.1',
            // 端口
            'port'              => 21,
            // 用户名
            'username'          => '',
            // 密码
            'password'          => '',
            // 被动模式
            'passive'           => false,
            // 根目录
            'root_path'         => '',
            // 超时时间
            'timeout'           => 5,
            // 是否需要断线重连
            'break_reconnect'   => false,
            // 断线重连标识
            'break_match_str'   => [],
        ],
        // 其它主机连接参数
        'other' => [
            // 主机
            'host'      => '192.168.0.2',
            // 端口
            'port'      => 21,
            // 用户名
            'username'  => '',
            // 密码
            'password'  => '',
            // 超时时间
            'timeout'   => 5
        ],
    ]
]);
~~~

### 简单使用
~~~php
use \axguowen\facade\FtpClient;
// 传送指定内容到文件
$putObjectResult = FtpClient::putObject('/test/myfile.txt', 'file content');
// 成功
if(!is_null($putObjectResult[0])){
    echo '上传成功';
}else{
    echo $putObjectResult[1]->getMessage();
}

~~~

### 切换连接其它主机
~~~php
use \axguowen\facade\FtpClient;
// 连接其它服务器
$ftpClientOther = FtpClient::connect('other');
// 传送指定内容到文件
$putObjectResult = $ftpClientOther->putObject('/test/myfile.txt', 'file content');
// 成功
if(!is_null($putObjectResult[0])){
    echo '上传成功';
}else{
    echo $putObjectResult[1]->getMessage();
}
~~~

### 动态传入连接的主机参数
~~~php
use \axguowen\facade\FtpClient;
// 动态连接
$ftpClient = FtpClient::connect([
    // 主机
    'host' => 'xx.xx.xx.xx',
    // 端口
    'port' => 21,
    // 用户名
    'username' => 'username',
    // 密码
    'password' => 'password',
]);
// 传送指定内容到文件
$putObjectResult = $ftpClient->putObject('/test/myfile.txt', 'file content');
// 成功
if(!is_null($putObjectResult[0])){
    echo '上传成功';
}else{
    echo $putObjectResult[1]->getMessage();
}
~~~

### 其它方法
~~~php
use \axguowen\facade\FtpClient;
// 传送指定内容到指定文件
$putObjectResult = FtpClient::putObject('/test/myfile.txt', 'file content');
// 上传本地文件到指定文件
$putFileResult = FtpClient::putFile('/test/myfile.txt', '/test/localfile.txt');
// 删除FTP上的文件
$deleteFileResult = FtpClient::deleteFile('/test/myfile.txt');
// 删除FTP上的目录
$deleteDirResult = FtpClient::deleteDir('/test/mydir');
// 重命名FTP上的文件
$renameFileResult = FtpClient::renameFile('/test/oldfilename.txt', '/test/newfilename.txt');
// 重命名FTP上的目录
$renameDirResult = FtpClient::renameDir('/test/olddirname', '/test/newdirname');
// 返回指定文件大小, 第二个参数传入单位, 支持b, kb, mb, gb;
$fileSizeResult = FtpClient::fileSize('/test/myfile.txt', 'kb');
// 返回文件最后修改时间, 第二个参数传入格式, 不传默认返回时间戳;
$fileUpdateTimeResult = FtpClient::fileUpdateTime('/test/myfile.txt', 'Y-m-d H:i:s');
// 返回指定目录下的文件列表
$fileListResult = FtpClient::fileList('/test/mydir');
~~~