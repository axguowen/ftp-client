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

namespace axguowen\ftpclient\utils;

class DirTool
{
    /**
     * 过滤多余的分隔符
     * @access public
     * @param string $path
     * @return string
     */
    public static function filterRedundantSeparator($path)
    {
        return preg_replace('/\/+/', '/', str_replace('\\', '/', $path));
    }

    /**
     * 裁剪两边的分隔符
     * @access public
     * @param string $path
     * @return string
     */
    public static function trimSeparator($path)
    {
        return trim(static::filterRedundantSeparator($path), '/');
    }
}