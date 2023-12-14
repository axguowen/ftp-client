<?php
// +----------------------------------------------------------------------
// | FtpClient [Simple FTP Client For PHP]
// +----------------------------------------------------------------------
// | FTP客户端
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: axguowen <axguowen@qq.com>
// +----------------------------------------------------------------------

namespace axguowen\facade;

use axguowen\Facade;

/**
 * @see \axguowen\FtpClient
 * @mixin \axguowen\FtpClient
 */
class FtpClient extends Facade
{
    /**
     * 获取当前Facade对应类名（或者已经绑定的容器对象标识）
     * @access protected
     * @return string
     */
    protected static function getFacadeClass()
    {
        return 'axguowen\FtpClient';
    }
}
