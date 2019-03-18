<?php
/**
 * Created by PhpStorm.
 * User: lujiang
 * Date: 2019/3/18
 * Time: 11:28
 */

namespace Tools\basic;


class ArrayHelper
{
    /**
     * @deprecated   重新定义数组索引
     * @author       lujiang
     *
     * @param $rows
     * @param $key
     *
     * @return array
     *
     */
    public static function reIndex(array $rows, string $key) :array
    {
        if (empty($rows) || empty($key)) {
            return [];
        }

        $keys = array_column($rows, $key);
        $array = array_combine($keys,$rows);

        return $array;
    }
}