<?php
namespace WeHelper\WeQiye;

use WeHelper\Driver\WeQiye;

class User extends WeQiye
{

    public function createUser($openid, $data)
    {
        $url = 'https://qyapi.weixin.qq.com/cgi-bin/user/create?access_token=ACCESS_TOKEN';
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->httpPostForJson($url, $data);
    }

    /**
     * 获取用户基本信息（包括UnionID机制）
     */
    public function getUserInfo($openid, $lang = 'zh_CN')
    {
        $url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=ACCESS_TOKEN&openid={$openid}&lang={$lang}";
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->httpGetForJson($url);
    }

    /**
	 * 获取部门成员
	 */
	function simpleList($department_id,$child=1){
        $url = "https://qyapi.weixin.qq.com/cgi-bin/user/simplelist?access_token=ACCESS_TOKEN&department_id={$department_id}&fetch_child={$child}";
        $this->registerApi($url, __FUNCTION__, func_get_args());
		return $this->httpGetForJson($url);
	}
}