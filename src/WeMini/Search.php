<?php
namespace WeHelper\WeMini;

use WeHelper\Driver\WeChat;

/**
 * 小程序搜索
 * Class Search
 * @package WeMini
 */
class Search extends WeChat
{
    /**
     * 提交小程序页面url及参数信息
     * @param array $pages
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function submitPages($pages)
    {
        $url = 'https://api.weixin.qq.com/cgi-bin/guide/getguideacct?access_token=ACCESS_TOKEN';
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->callPostApi($url, ['pages' => $pages], true);
    }

}