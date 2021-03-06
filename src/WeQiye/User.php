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
    
    /**
	 * 打卡记录
	 */
    function checkin($list,$starttime,$endtime){
        $data = [
            'opencheckindatatype' => 1, //打卡类型。1：上下班打卡；2：外出打卡；3：全部打卡
            'useridlist' => $list,
            'starttime' => $starttime,
            'endtime' => $endtime
        ];

        $url = 'https://qyapi.weixin.qq.com/cgi-bin/checkin/getcheckindata?access_token=ACCESS_TOKEN';
        return $this->callPostApi($url, $data);
    }

    function checkAll($list,$starttime,$endtime){
        $data = [
            'opencheckindatatype' => 3, //打卡类型。1：上下班打卡；2：外出打卡；3：全部打卡
            'useridlist' => $list,
            'starttime' => $starttime,
            'endtime' => $endtime
        ];

        $url = 'https://qyapi.weixin.qq.com/cgi-bin/checkin/getcheckindata?access_token=ACCESS_TOKEN';
        return $this->callPostApi($url, $data);
    }
}