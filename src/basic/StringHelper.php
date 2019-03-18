<?php
/**
 * Created by PhpStorm.
 * User: lujiang
 * Date: 2019/3/18
 * Time: 11:27
 */

namespace Tools\basic;


class StringHelper
{
    /**
     * @Describe  [生成随机字符串]
     * @Author    普修米洛斯
     *
     * @param int $length
     *
     * @return string
     * @Version   1.0
     * @DateTime  : 2018/7/13T16:59+0800
     */
    public static function getRandStr($length = 8) {
        $str        = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randString = '';
        $len        = strlen($str) - 1;
        for ($i = 0 ; $i < $length ; $i++) {
            $num        = mt_rand(0, $len);
            $randString .= $str[$num];
        }

        return $randString;
    }

    /**
     * [规则 name-base+nanosecond and hashed with SHA1]
     * @Describe  [Default generate a version5 UUID object]
     * @Author    George
     * @return string
     * @Version   1.0
     * @DateTime  : 2018/7/13T17:00+0800
     */
    public static function uuid() {
        $uuid      = Uuid::uuid1();
        $timestamp = $uuid->getTimestampHex();
        $name      = self::getRandStr(32).$timestamp;

        return Uuid::uuid5(Uuid::NAMESPACE_DNS, $name)->toString();
    }
}