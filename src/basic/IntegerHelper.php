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
     * @deprecated   安装指定为数生成一个由数字组成的随机数
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
}