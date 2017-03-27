<?php
 $stime=microtime(true);
return array(
    
    
	//'配置项'=>'配置值'
    
    //数据库配置信息
    'DB_TYPE'   => 'mysql', 
    // 数据库类型
    'DB_HOST'   => 'localhost', 
    // 服务器地址
    'DB_NAME'   => 'sq_jingyi',
    // 数据库名
    'DB_USER'   => 'root', 
    // 用户名
    'DB_PWD'    => 'root', 
    // 密码
    'DB_PORT'   => 3306,
    // 端口
    'DB_PREFIX' => 'cms_',
    // 数据库表前缀 
    'SHOW_PAGE_TRACE' =>true, //开发者调试
    
    
    'MD5_KEY'=>'chenyajun',  //添加用户时密码加密的秘钥
  //  'LAYOUT_ON'=>true,'LAYOUT_NAME'=>'layout',
    'KEY'   =>'jingyi7168',
    'month' => "3600*24*30",
    
  //  'ERROR_PAGE' =>'http://www........com'
    
     'IMAGE_CONFIG'=>array(
        'maxSize'  => 500*1024,
        'exts'     =>array('jpg','gif','png','jpeg'),
        'rootPath' =>'./Public/Uploads/',
        'htmlPath' =>'/Public/Uploads/',
        
    ),
    
  // 'ERROR_PAGE' =>'http://www.myDomain.com/Public/error.html',
    'LOG_RECORD' => true,'LOG_TYPE'              =>  'File', 'LOG_LEVEL'  =>'', //日志
    'etime' =>$etime,
  //  'MD5_KEY'   => 'chenyajuntoyajunchen',
                            /* 错误页面模板 */
 //  'TMPL_ACTION_ERROR'     =>  'Public/error.html', // 默认错误跳转对应的模板文件
 //   'TMPL_ACTION_SUCCESS'   =>  MODULE_PATH.'View/Public/success.html', // 默认成功跳转对应的模板文件
 //   'TMPL_EXCEPTION_FILE'   =>  MODULE_PATH.'View/Public/exception.html',// 异常页面的模板文件
    
    'DEFAULT_MODULE'        =>  'Admin', 
    // 默认模块
    'DEFAULT_CONTROLLER'    =>  'login', // 默认控制器名称
    'DEFAULT_ACTION'        =>  'login',
    
    
    
);
