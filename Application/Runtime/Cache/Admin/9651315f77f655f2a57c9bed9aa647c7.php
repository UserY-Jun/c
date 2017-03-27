<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>更新成功</title>
   
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
             <style type="text/css">
#show{width:800px;
      height:200px;
      line-height:200px;
      text-align:center;
      background-color:#888;
  //    color:#000;
      font-size:64px;
      position:absolute;
      top:30%;
      left:30%;margin:-100px 0 0 -100px;}
#t_show{width:800px;
      height:100px;
      line-height:50px;
      text-align:center;
      background-color:#aaa;
      //color:#111;
      font-size:34px;
      position:absolute;
      top:10%;
      left:30%;margin:-50px 0 0 -100px;}


</style>
    </head>
    
    <body>
        <div id="t_show">订单存在</div>
        <div  id="show">更新成功</div>
        
        
  <script language="JavaScript">
                function ok(){
                        location.href='/index.php/admin/Weightstation/index';
                  }
                window.setTimeout("ok();",1000);

</script>
    </body>
</html>