<?php
namespace WeHelper\WeQiye;

use WeHelper\Driver\WeQiye;

class Media extends WeQiye
{

    public function getMedia($media_id)
    {
        $url = "https://qyapi.weixin.qq.com/cgi-bin/media/get?access_token=ACCESS_TOKEN&media_id={$media_id}";
        return $this->callGetApi($url,false);
    }

}