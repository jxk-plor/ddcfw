<?php
/**
 * 获取微信操作对象
 * @staticvar array $wechat
 * @param type $type
 * @return WechatReceive
 */
function & load_wechat($type = '') {
  !class_exists('Wechat\Loader', FALSE) && Vendor('Wechat.Loader'); 
    static $wechat = array();
    $index = md5(strtolower($type));
    if (!isset($wechat[$index])) {
        // 从数据库查询配置参数
        $config = M('Config')->field('token,appid,appsecret,encodingaeskey,mch_id,partnerkey,ssl_cer,ssl_key,qrc_img')->find();
        // 设置SDK的缓存路径
        $config['cachepath'] = CACHE_PATH . 'Data/';
        $wechat[$index] = \Wechat\Loader::get_instance($type, $config);
    }
    return $wechat[$index];
}
?>