<?php
namespace WeHelper\WeQiye;

use WeHelper\Driver\WeQiye;

class User extends WeQiye
{

    public function createUser($openid, $data)
    {
        $url = 'https://qyapi.weixin.qq.com/cgi-bin/user/create?access_token=ACCESS_TOKEN';
        return $this->callPostApi($url, $data);
    }

    /**
     * 获取用户基本信息
     */
    public function getUserInfo($userid)
    {
        $url = "https://qyapi.weixin.qq.com/cgi-bin/user/get?access_token=ACCESS_TOKEN&userid={$userid}";
        return $this->callGetApi($url);
    }

    /**
	 * 获取部门成员
	 */
	function simpleList($department_id,$child=1){
        $url = "https://qyapi.weixin.qq.com/cgi-bin/user/simplelist?access_token=ACCESS_TOKEN&department_id={$department_id}&fetch_child={$child}";
		return $this->callGetApi($url);
    }

    /**
	 * 获取部门列表
	 */
	function departmentList($id=0){
        $url = "https://qyapi.weixin.qq.com/cgi-bin/department/list?access_token=ACCESS_TOKEN";
        if($id > 0){
            $url .= "&id=" . $id;
        }
		return $this->callGetApi($url);
    }
    
    /**
	 * OPENID转换
	 */
    function uidToOpenid($data){
        $url = 'https://qyapi.weixin.qq.com/cgi-bin/user/convert_to_openid?access_token=ACCESS_TOKEN';
		return $this->callPostApi($url, $data);
	}
}