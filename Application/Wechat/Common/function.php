<?php
//wxff1a1a9d018ab7b8
//5baefe482f681fe3671d204498b88a7a
function getAT(){
	$wechatObj = new \Vendor\Weixin\Amei();
	$token=M("token");
	$t=$token->where("id=1")->select();
	if(time()-$t[0]["get_time"]>7000){
		$AccessToken=$wechatObj->getAccessToken();
		$arr["access_token"]=$AccessToken;
		$arr["get_time"]=time();
		$token->where("id=1")->save($arr);
		$getToken=$AccessToken;
	}else{
		$getToken=$t[0]["access_token"];
	}
	return $getToken;
}
//存用户到数据库
function saveUser($openID){
	$wechatObj = new \Vendor\Weixin\Amei();
	$uInfo=$wechatObj->get_user_info(getAT(),$openID);
	$user=M("muser");
	$uCount=$user->where('wxid="'.$openID.'"')->count();
	$arr["wxid"]=$uInfo["openid"];
	$arr["wxname"]=$uInfo["nickname"];
	$arr["wxsex"]=$uInfo["sex"];
	$arr["wxaddress"]=$uInfo["country"].",".$uInfo["province"].",".$uInfo["city"];
	$arr["wxtype"]=1;
	$arr["wximg"]=$uInfo["headimgurl"];
	$arr["wxtime"]=$uInfo["subscribe_time"];
	if($uCount>0){
		$user->where('wxid="'.$openID.'"')->save($arr);
	}else{
		$user->add($arr);
	}
}
//获取关注者列表
    function get_user_list()
    {
		$wechatObj = new \Vendor\Weixin\Amei();
        $url = "https://api.weixin.qq.com/cgi-bin/user/get?access_token=".getAT()."&next_openid=";
        $res = $wechatObj->https_request($url);
        return json_decode($res, true);
    }
?>