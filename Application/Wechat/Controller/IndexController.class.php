<?php
namespace Wechat\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
      $wechatObj = new \Vendor\Weixin\Amei();
      if (!isset($_GET['echostr'])) {
        //file_get_contents("php://input")
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        if (!empty($postStr)){
          //$wechatObj->logger("R ".$postStr);
          $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
          $RX_TYPE = trim($postObj->MsgType);
          //消息类型分离
          //$wechatObj->logger("RX_TYPE ".$RX_TYPE);
          switch ($RX_TYPE)
          {
            case "event":
              break;
            case "text":
              $result = $wechatObj->receiveText($postObj);
              break;
            case "image":
              $result = $wechatObj->receiveText($postObj);
              break;
            case "location":
              $result = $wechatObj->receiveLocation($postObj);
              break;
            case "voice":
              $result = $wechatObj->receiveVoice($postObj);
              break;
            case "video":
              $result = $wechatObj->receiveText($postObj);
              break;
            case "link":
              $result = $wechatObj->receiveText($postObj);
              break;
            default:
              $result = "unknown msg type: ".$RX_TYPE;
              break;
          }
          $wechatObj->logger("T ".$result);
          echo $result;
        }else {
          echo "";
          exit;
        }
      }else{
        $wechatObj->valid();
      }
    }
}