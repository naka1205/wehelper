<?php
namespace WeHelper\WeMini;

use WeHelper\Driver\WeChat;

/**
 * 小程序生物认证
 * Class Soter
 * @package WeMini
 */
class Soter extends WeChat
{
    /**
     * SOTER 生物认证秘钥签名验证
     * @param array $data
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function verifySignature($data)
    {
        $url = 'https://api.weixin.qq.com/cgi-bin/soter/verify_signature?access_token=ACCESS_TOKEN';
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->callPostApi($url, $data, true);
    }

}