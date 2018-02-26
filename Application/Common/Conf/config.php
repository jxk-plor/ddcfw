<?php
return array(
	//'配置项'=>'配置值'
	'DB_TYPE'   => 'mysql', // 数据库类型
  'DB_HOST'   => '61.160.194.166', // 服务器地址
  'DB_NAME'   => 'rzyixing', // 数据库名
  'DB_USER'   => 'ddc', // 用户名
  'DB_PWD'    => 'linkage@123', // 密码
  'DB_PORT'   => 3306, // 端口
  'DB_PREFIX' => 'fc_', // 数据库表前缀 
  'DB_CHARSET'=> 'utf8', // 字符集
  'APP_GROUP_LIST'=>'Home,Wechat',//开启分组
  'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志
  'TMPL_CACHE_ON'=>  TRUE, 
  'SHOW_PAGE_TRACE' =>true, 
  'URL_CASE_INSENSITIVE'  =>true,  
  'URL_MODEL'=>  2, 
);