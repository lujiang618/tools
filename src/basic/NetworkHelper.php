<?php
/**
 * Created by PhpStorm.
 * User: lujiang
 * Date: 2019/3/18
 * Time: 11:25
 */

namespace Tools\basic;


class NetworkHelper
{

    /**
     * @description  生成一个url
     * @author       lujiang
     *
     * @param string $url
     * @param array  $data
     *
     * @return string
     *
     */
    public static function generateUrl(string $url, array $data) :string
    {
        if (empty($url)) {
            return $url;
        }

        if (empty($url) || empty($data) || !is_array()) {
            return $url;
        }

        $args = url_encode(http_build_query($data));

        return $url.'?'.$args;
    }

    /**
     * @description  获取客户端请求的IP
     * @author       lujiang
     *
     *
     * @return string
     *
     */
    public static function getRequestIP() :string
    {
        if (getenv("HTTP_CLIENT_IP")) {
            return getenv("HTTP_CLIENT_IP");
        }

        if(getenv("HTTP_X_FORWARDED_FOR")) {
            return getenv("HTTP_X_FORWARDED_FOR");
        }

        if(getenv("REMOTE_ADDR")) {
            return  getenv("REMOTE_ADDR");
        }

        return '';
    }
}