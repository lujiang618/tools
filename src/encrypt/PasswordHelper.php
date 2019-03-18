<?php
/**
 * Created by PhpStorm.
 * User: lujiang
 * Date: 2019/3/18
 * Time: 11:49
 */

namespace Tools\encrypt;


class PasswordHelper
{
    /**
     * @description对密码进行MD5加密,  加盐可以降低破解率
     * * 1. md5(md5($password).$salt)
     * 2. md5(md5($password.$salt))
     * 3. md5(md5($password.$salt).$salt)
     *
     * @author       lujiang
     *
     * @param string $password
     * @param string $salt
     *
     * @return string
     *
     */
    public function getByTwiceMd5(string $password, string $salt = '') :string
    {
        if (empty($password)) {
            return '';
        }

        return  md5(md5($password).$salt);
    }
}