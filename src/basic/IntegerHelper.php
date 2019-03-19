<?php
/**
 * Created by PhpStorm.
 * User: lujiang
 * Date: 2019/3/18
 * Time: 11:24
 */

namespace Tools\basic;


class IntegerHelper
{
    /**
     * @deprecated   指定位数生成一个由数字组成的随机数
     * @author       lujiang
     *
     * @param int $length
     *
     * @return string
     *
     */
    public static function getRandInt(int $length = 8) : string
    {
        $str        = '123456789';
        $randString = '';
        $len        = strlen($str) - 1;

        for ($i = 0 ; $i < $length ; $i++) {
            $num        = mt_rand(0, $len);
            $randString .= $str[$num];
        }

        return $randString;
    }

    /**
     * @description  获取一个长度为4的数字随机数
     * @author       lujiang
     *
     *
     * @return int
     *
     * @throws \Exception
     */
    public static function getFour() {
        return random_int(1000,9999);
    }

    /**
     * @description  获取一个长度为6的数字随机数
     * @author       lujiang
     *
     *
     * @return int
     *
     * @throws \Exception
     */
    public static function getSix() {
        return random_int(100000,999999);
    }
}