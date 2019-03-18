<?php
/**
 * Created by PhpStorm.
 * User: lujiang
 * Date: 2019/3/18
 * Time: 11:52
 */

namespace Tools\encrypt;


class SignHelper
{
    const SIGN_KEY             = 'UUabc';           // sign的key

    /**
     * @deprecated   生成一个sign
     * @author       lujiang
     *
     * 第一步：对参数按照 key=value 的格式，并按照参数名 ASCII 字典序排序：
     *      string="arguments={"code":885588}&content=验证码885588，您正在进行身份验证，打死不要告诉别人哦！&mobile=18516051096&platform=3&platform_key=message_test&send_time=2018/07/30T07:30:00+08:00&server=2&template=SMS_130990029&type=2"
     * 第二步：拼接 API 密钥:
     *  string="arguments={"code":885588}&content=验证码885588，您正在进行身份验证，打死不要告诉别人哦！&mobile=18516051096&platform=3&platform_key=message_test&send_time=2018/07/30T07:30:00+08:00&server=2&template=SMS_130990029&type=2&key=UUabc"。
     * 第三步：对结果进行 MD5 32位 运算，并将结果转换为小写形式。
     *
     * @param array $data
     *
     * @return string
     *
     */
    public function getSign(array $data) : string
    {
        // 按照参数名 ASCII 码从小到 大排序
        ksort($data);

        // 转换成url格式并拼接key
        $string = urldecode(http_build_query($data)).'&key='.self::SIGN_KEY;

        // 然后进行md5的32位运算，最后转换成小写
        $sign = md5($string);

        return  $sign;
    }
}