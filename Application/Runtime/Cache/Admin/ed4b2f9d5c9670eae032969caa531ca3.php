<?php if (!defined('THINK_PATH')) exit();?><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>ERP企业管理系统</title>
<style>
   

    body{ text-align:center; } 
    
</style>

<script src="/Public/js/jquery-1.3.2.js"></script>
<script src="/Public/js/jquery-barcode.min.js"></script>
<link href="/Public/skin/default/print.css" rel="stylesheet" type="text/css">

<script>
$(function() {
	$(document).ready(function(){
		//$("#barcode39").barcode({code: "70056408842391", crc:false}, "code128",{barWidth:3, barHeight:30});
		}
	);
});
</script>


</head>


<link href="/Public/skin/default/default.css" rel="stylesheet" type="text/css">

<style type="text/css">


.showcontent { padding-bottom:0px;padding-top:0px;}
</style>


<body rel="index">



<br>
<div   >
<table class="showcontent" style="margin-left:2px;" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF" align="center">
<tbody>
    <tr>
        <td colspan="2">
            <div style="text-align:center;font-size:20px;height:40px;"><?php echo $orderdata[0][seller_nick]; ?>&nbsp;&nbsp;发货清单</div>
        </td>
    </tr>

    <tr>
        <td width="50%">
            <div>买家会员名：<?php echo $orderdata[0][buyer_nick]; ?></div>
        </td>

        <td width="50%">
            <div>打印时间：<?php if(strtotime($orderdata[0][invoice_status_time])){echo $orderdata[0][invoice_status_time]; }else{echo date('Y/m/d H:i:s');}; ?></div>
        </td>
    </tr>
    <tr>
        <td width="50%">
            <div>收货人姓名：<?php echo $orderdata[0][receiver_name]; ?></div></td>
        <td width="50%"><div>买家电话：<?php echo $orderdata[0][receiver_mobile]; ?>&nbsp;<nobr></nobr>
            </div>
        </td>
    </tr>

    <tr>
        <td colspan="2">
            <div>收货人地址：<span><?php echo $orderdata[0][receiver_address]; ?></span></div>
        </td>
    </tr>
</tbody>
</table>

<table class="printtable showcontent" style="margin:10px 0px 10px 0px;" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF" align="center">
<tbody>
    <tr>
        <td width="10%"><div class="cr">No</div></td>
        <td width="13%"><div class="cr">货号</div></td>
        <td width="25%"><div class="cr">订单信息</div></td>
        <td width="13%"><div class="cr">总米数</div></td>
        <td style="border-bottom:1px dotted #000000;;" width="39%"><div class="cr">包装参考</div></td>
    </tr>
 <?php $count=count($datainfo); ?>
<tr>
 <td>
     <div class="cr">1</div></td> <td><div class="cr">
&nbsp;<?php $win=strtok($datainfo[0][sku_pro_name],'：'); $wing=strtok('/'); echo substr($wing,2); ?></div></td>
 <td>
     <div>
<?php
 $win=strtok($datainfo[0][sku_pro_name],'/'); $wide=strtok('*'); $long=strtok(';'); echo $wide.'×'; echo $long.'×'; echo $datainfo[0][num]; ?>
     </div>
 </td>
 
 <td>
     <div class="rt"><?php  $numLong=$long*$datainfo[0][num]; echo $numLong; ?>M</div
 </td>
 <td rowspan="<?php echo $count; ?>" valign="top">
     <div>
         <div style="clear:both;padding-top:-5px;text-align:left;">
          <?php echo $Package_Reference; ?>
     </div>
 </td>
</tr>
<?php array_shift($datainfo) ?>
<?php  foreach($datainfo as $v=>$k): ?>
<tr>
 <td>
     <div class="cr"><?php echo $v+2; ?></div>
 </td> 
 
 <td>
     <div class="cr">
&nbsp;<?php $win=strtok($k[sku_pro_name],'：'); $wing=strtok('/'); echo substr($wing,2); ?></div></td>
<td>
    <div>
<?php
 $win=strtok($k[sku_pro_name],'/'); $wide=strtok('*'); $long=strtok(';'); echo $wide.'×'; echo $long.'×'; echo $datainfo[0][num]; ?>
</div>
</td>
<td>
    <div class="rt"><?php  $numLong=$long*$datainfo[0][num]; echo $numLong; ?>M</div>
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
    
    
<table class="showcontent" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF" >
<tbody>
    <tr>
        <td width="50%">
            <div>店铺名称：<?php echo $orderdata[0][seller_nick]; ?></div>
        </td>
<td width="50%">
    <div>&nbsp;</div></td></tr>
<tr>
    <td colspan="4">
        <div>买家留言：<font color="red"><?php echo $orderdata[0][buyer_message]; ?></font>
        </div>
        <div>订单备注：<font color="red"><?php echo $orderdata[0][seller_memo]; ?></font>
        </div>
    </td>
</tr>
</tbody>
</table>
</div>
</body>
</html>