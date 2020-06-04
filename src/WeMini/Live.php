<?php
namespace WeHelper\WeMini;

use WeHelper\Driver\WeChat;

/**
 * 小程序直播接口
 * Class Live
 * @package WeMini
 */
class Live extends WeChat
{

    /**
     * 获取直播房间列表
     * @param integer $start 起始拉取房间
     * @param integer $limit 每次拉取的个数上限
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function getLiveList($start = 0, $limit = 10)
    {
        $url = 'http://api.weixin.qq.com/wxa/business/getliveinfo?access_token=ACCESS_TOKEN';
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->callPostApi($url, ['start' => $start, 'limit' => $limit], true);
    }

    /**
     * 获取回放源视频
     * @param array $data
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function getLiveInfo($data = [])
    {
        $url = 'http://api.weixin.qq.com/wxa/business/getliveinfo?access_token=ACCESS_TOKEN';
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->callPostApi($url, $data, true);
    }

}