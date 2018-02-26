<?php
namespace Home\Controller;
use Think\Controller;
class AjaxController extends Controller {
    public function getUserList(){
      $user=M('user');
      $ulist=$user->where("1=1")->select();
      if($ulist>0){
        $data["code"]=0;
        $data["msg"]='';
        $data["count"]=10;
        $data["data"]=$ulist;
        $this->ajaxReturn($data);
      }
    }
}