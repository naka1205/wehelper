<?php
namespace WeHelper\WeQiye;

use WeHelper\Tools;
use WeHelper\WXBizData;
use WeHelper\Driver\WeQiye;
use WeHelper\Exceptions\InvalidDecryptException;
use WeHelper\Exceptions\InvalidResponseException;


class WeMini extends WeQiye
{

    /**
     * 登录凭证校验
     * @param string $code 登录时获取的 code
     */
    public function session($code)
    {
        $url = "https://qyapi.weixin.qq.com/cgi-bin/miniprogram/jscode2session?access_token=ACCESS_TOKEN&js_code={$code}&grant_type=authorization_code";
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->callGetApi($url);
    }

    /**
     * 换取用户信息
     */
    public function userInfo($userid)
    {
        $url = "https://qyapi.weixin.qq.com/cgi-bin/user/get?access_token=ACCESS_TOKEN&userid={$userid}";
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->callGetApi($url);
    }

}