window.onload=function(){
	FixerTopMume();	//固定底部导航菜单的位置
	$(window).scroll( function (){FixerTopMume();}); 
}

//固定底部导航菜单的位置
function FixerTopMume() {
	var  scroll_height=$(window).scrollTop();   
	if (scroll_height>276){
		$('#divtopnav').addClass('fixer');       
	} else {
		$('#divtopnav').removeClass('fixer');
	}
};

//顶部悬浮导航下拉菜单代码
$(document).ready(function(){   
  
    $("ul.topnav li a").click(function() { //When trigger is clicked... 
      
				//Following events are applied to the subnav itself (moving subnav up and down)   
				$(this).parent().find("ul.subnav").slideDown('fast').show(); //Drop down the subnav on click   
		  
				$(this).parent().hover(function() {   
				}, function(){   
					$(this).parent().find("ul.subnav").slideUp('slow'); //When the mouse hovers out of the subnav, move it back up   
				});   
		  
				//Following events are applied to the trigger (Hover events for the trigger)   
				}).hover(function() {   
					$(this).addClass("subhover"); //On hover over, add class "subhover"   
				}, function(){  //On Hover Out   
					$(this).removeClass("subhover"); //On hover out, remove class "subhover"  
    });   
  
});


//每条产品纪录鼠标滑过TR变色
$(function(){
	$('#recordlist tr').mouseover(function(){
		if ( $(this).attr('class')=="changecolour"){$(this).find("td").addClass("hover"); }
	})
	$("#recordlist tr").mouseout(function(){ 
		$(this).find("td").removeClass("hover"); 
	}); 
	
})

function showorder(tid){
	var imgsrc = $('#lable_order_info_'+tid).attr("src")
	
	if (imgsrc.indexOf("retract.png") >= 0) {
		$('#row_'+tid).css("background","#FFFFFF");
		$('#showtradeinfo_'+tid).css("display","none"); 
		$('#lable_order_info_'+tid).attr("src","/Public/images/Expand.png"); 
	}else{
		$('#row_'+tid).css("background","#eef5fe");
		$('#showtradeinfo_'+tid).css("display",""); 
		$('#lable_order_info_'+tid).attr("src","/Public/images/retract.png"); 
		showorderinfo(tid);
	}
}
//

function showallorder(){ 
	var imgsrc = $('#lable_order_info').attr("src")
	if (imgsrc.indexOf("retract.png") >= 0) {
		$('[name="check_row"]').each(function() {
			$('#row_'+$(this).val()).css("background","#FFFFFF");
			$('#showtradeinfo_'+$(this).val()).css("display","none"); 
			$('#lable_order_info_'+$(this).val()).attr("src","/Public/images/Expand.png");
		})
		$('#lable_order_info').attr("src","/Public/images/Expand.png"); 
	}else{
		$('[name="check_row"]').each(function() {
			$('#row_'+$(this).val()).css("background","#eef5fe");
			$('#showtradeinfo_'+$(this).val()).css("display",""); 
			$('#lable_order_info_'+$(this).val()).attr("src","/Public/images/retract.png"); 
			showorderinfo($(this).val());
		})
		$('#lable_order_info').attr("src","/Public/images/retract.png"); 
	}
}


function showorderinfo(oid){
	var myDate = new Date();
	var mytime=myDate.toLocaleTimeString();
	$("#orderinfo_"+oid).html("<p style='height:50px; line-height:50px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;订单载入中，请稍后...</p>");
	$.get("/index.php/Admin/trade/ShoworderInfo/tids/"+oid,function(data,status){
		$("#orderinfo_"+oid).html(data);
		});
}






//同步订单信息
function getupdatetrade() {
	$("#tradelist").html("<div id='tradelist_info'><span style='padding:10px;'>订单载入中，请稍后...</span></div>");
	$.post("TradeDownload.asp", {
		RecentDays: $("#RecentDays").val(),
		OrderStateID: $("#OrderStateID").val()
	},
	function(data, status) {
		if (data.indexOf("session") >= 0) {
			dialog({
				width: 400,
				title: '授权失败',
				content: '请先进入授权页面进行授权操作<br>点击"确定"按钮进入授权页面',
				cancelValue: '取消',
				okValue: '确定',
				ok: function() {
					location.href = '../authorize/index.asp?action=authorize&geturl=' + window.location.href
				},
				cancel: function() {$("#tradelist").html("<div id='tradelist_info'><span style='padding:10px;'>用户取消操作！</span></div>");}
			}).showModal();
		} else {
			$("#tradelist").html("<div id='tradelist_info'><span style='padding:10px;'>"+data+"</span></div>");
			setTimeout(function() {
				switch ($("#OrderStateID").val())
				 {
				case "2":
					location.href = 'index.asp?action=waitpay&OrderStateID='+$("#OrderStateID").val()+'&RecentDays='+$("#RecentDays").val()
					break;
				case "3":
					location.href = 'index.asp?action=tradeclosed&OrderStateID='+$("#OrderStateID").val()+'&RecentDays='+$("#RecentDays").val()
					break;
				case "4":
					location.href = 'index.asp?action=traderefund&OrderStateID='+$("#OrderStateID").val()+'&RecentDays='+$("#RecentDays").val()
					break;
				case "5":
					if ($("#RecentDays").val()=="-1"){
						location.href = 'index.asp?action=waitsend&OrderStateID='+$("#OrderStateID").val()+'&RecentDays='+$("#RecentDays").val()
						}else{
						location.href = 'index.asp?action=waitprint&OrderStateID='+$("#OrderStateID").val()+'&RecentDays='+$("#RecentDays").val()
						};
					break;
				case "7":
					location.href = 'index.asp?action=waitconfirm&OrderStateID='+$("#OrderStateID").val()+'&RecentDays='+$("#RecentDays").val()
					break;
				case "9":
					location.href = 'index.asp?action=finished&OrderStateID='+$("#OrderStateID").val()+'&RecentDays='+$("#RecentDays").val()
					break;
				case "0":
					location.href = 'index.asp?action=list&OrderStateID='+$("#OrderStateID").val()+'&RecentDays='+$("#RecentDays").val()
					break;
				default:
					location.reload();
				}
			},
			300);
		}
	});
};


//通过CSV同步订单信息
function getupdatetrades() {
	location.href = '/index.php/admin/trade/UpdateTradesList'
};


//获取已打印发货单的订单，近3分钟
function getprintedtrades(printtime) {
	//alert("111");
	location.href = "/index.php/Admin/trade/tradeLIST/PrintTime/"+printtime+""
};


//更新订单状态，打印状态，发货状态，说明书打印状态，快递单打印状态等等
function AjaxOrdersStatus(tid,stype,strval,isreload){
  //  alert(strval);return false;
	$.post("/index.php/Admin/trade/AjaxOrdersStatus",
		{
		action:'edittradestatus',
		tid:tid,
		stype:stype,
		strval:strval
		},
		function(data,status){
			setTimeout(function(){	if (isreload==1){location.reload();} }, 1000);
	});
		
};


//更新订单状态，打印状态，发货状态，配货单打印状态，说明书打印状态，快递单打印状态等等
function AjaxOrdersMerger(tid,stype){
	var myDate = new Date();
	var mytime=myDate.toLocaleTimeString();
	
	var tids = "";
	$('[name="check_row"]:checkbox:checked').each(function(){ 
	 tids = tids + "," + $(this).val();	//给物流单号赋值
    })
	
	if($('[name="check_row"]:checkbox:checked').length==0){
		dialog({
				width: 400,
				title: '操作提示',
				content: "请先选择需要操作的订单",
				cancelValue: '取消',
				okValue: '确定',
				ok: function () {setTimeout(function(){ }, 1000);},
				cancel: function () {}
				}).showModal();
		return false;
	}
	
	if (stype == 1){
		if($('[name="check_row"]:checkbox:checked').length<2 ){
			dialog({
					width: 400,
					title: '操作提示',
					content: "需要2单以上的订单才能使用合并订单的功能",
					cancelValue: '取消',
					okValue: '确定',
					ok: function () {setTimeout(function(){ }, 1000);},
					cancel: function () {}
					}).showModal();
			return false;
		}
	}
	
	if (stype == 0){
		if($('[name="check_row"]:checkbox:checked').length != 1 ){
			dialog({
					width: 400,
					title: '操作提示',
					content: "取消合并订单不可对多个订单同时操作<br>只能选择一个已合并的订单进行取消合并操作",
					cancelValue: '取消',
					okValue: '确定',
					ok: function () {setTimeout(function(){ }, 1000);},
					cancel: function () {}
					}).showModal();
			return false;
		}
	}
	
	$.get("/index.php/Admin/trade/editmerger/stype/"+stype+"/tids/"+tids+"/mytime/"+mytime,function(data,status){
			dialog({
				width: 400,
				title: '操作提示',
				content: data,
				cancelValue: '取消',
				okValue: '确定',
				ok: function () {setTimeout(function(){location.reload();}, 1000);},
				cancel: function () {}
				}).showModal();
		});
};


function show_invoice_btn(){
	var str = "";
	var tmpstr = "";
	var star_invoice_no = "";
	
	$('[name="check_row"]:checkbox:checked').each(function(){ 
     str+=$(this).val()+"\r\n";
	 var star_invoice_no =$("#Text1").val();
	 $("#invoice_no_"+$(this).val()).val($(this).val());	//给物流单号赋值
	
	 
   alert($(this).val());
    })
   alert(str);
};



function getCloudinvoice(tid) {
	var myDate = new Date();
	var mytime=myDate.toLocaleTimeString();
	
    var str = "";
    var tmpstr = "";
    var star_invoice_no = "";
    var i = 0;
    var j = 0;
    var tidVal = $("#invoice_no_" + tid).val()

    $('[name="check_row"]:checkbox:checked').each(function() {
        if ($(this).val() == tid) {return false};
        j = j + 1;
    })

    $('[name="check_row"]:checkbox:checked').each(function() {
		var invoice_no = tidVal * 1 + i - j
		var tids = $(this).val();
     	$("#invoice_no_" + tids).val(invoice_no);
        //给物流单号赋值
		$.get("../trade/orderhandling.asp?action=addinvoice&invoice_no="+invoice_no+"&logistics_company=申通快递&tids="+tids+"&mytime="+mytime,function(data,status){});
        i = i + 1;
    })
};

function getCloudinvoice2(tid){
	var str = "";
	var tmpstr = "";
	var star_invoice_no = "";
	var i=0
	var tidVal = parseInt($("#invoice_no_"+tid).val())
	$('[name="check_row"]:checkbox:checked').each(function(){ 
	 $("#invoice_no_"+$(this).val()).val(tidVal+i);	//给物流单号赋值
	 i = i+1;
    })
};



//全选或取消全选
function getCheckedAll(){
	if( $('[name="check_row_all"]').is(':checked') ){
		$('[name="check_row"]').prop("checked",'true');//全选
		$("#checkboxtitle").html("取消")
	}else{
		$('[name="check_row"]').removeAttr("checked");//取消全选
		$("#checkboxtitle").html("全选")
	}
	getCheckedLength();
}


//全选或取消全选
function getCheckedList2(stype){
	if( stype==0 ){$('[name="check_row"]').removeAttr("checked");}//取消全选
	else if( stype==1 ){	$('[name="check_row"]').prop("checked",'true');	}//全选
	else if( stype==2 ){	
		$('[name="check_row"]').each(function(){ 
		 if($(this).prop("checked")){$(this).removeAttr("checked");}else{$(this).prop("checked",'true');};
		})
	}
	else{$('[name="check_row"]').removeAttr("checked");}
	getCheckedLength();
}


//全选或取消全选
function getCheckedEach(){
	getCheckedLength();
}

//全选或取消全选
function getCheckedList(stype){
	if( stype==0 ){$('[name="check_row"]').removeAttr("checked");}//取消全选
	else if( stype==1 ){	$('[name="check_row"]').prop("checked",'true');	}//全选
	else if( stype==2 ){	
		$('[name="check_row"]').each(function(){ 
			if($(this).prop("checked")){$(this).removeAttr("checked");}else{$(this).prop("checked",'true');};
		})
	}
	else if( stype==3 ){	
		if($('[name="check_row"]').prop("checked")){$('[name="check_row"]').removeAttr("checked");	}else{$('[name="check_row"]').prop("checked",'true');};
	}
	else{$('[name="check_row"]').removeAttr("checked");}
	getCheckedLength();
}


function getCheckedLength(){
	$("#checkboxlength").html($('[name="check_row"]:checkbox:checked').length)
	if($('[name="check_row"]').prop("checked")){$("#checkboxtitle").html("取消")}else{$("#checkboxtitle").html("全选")};
}


//对一条记录进行操作，是否选中
function CheckedOne(tid){
	if( $("input:checkbox[value='"+tid+"']").is(':checked') ){
	$("input:checkbox[value='"+tid+"']").removeAttr("checked");
	}else{
	$("input:checkbox[value='"+tid+"']").prop('checked','true');
	}
	getCheckedLength();
};


//全选或取消全选
function AjaxeditOrder2(tid,Invoice_No,Remarks){
	
	dialog({
			width: 400,
			title: '订单管理',
			content: '<div style="padding:0 10px;line-height:35px;" >订单编号：'+tid+'<input id="tid"  name="tid" value="'+tid+'" type="hidden"/><br>&nbsp;&nbsp;&nbsp;&nbsp;正确单号：<input id="real_Invoice_No" name="real_Invoice_No" value="" class="input Tooltip" title="当物流单号填写错误导致无法正常确认的时候，可以在这里填写正确单号以便确认" size=30 /><br>&nbsp;&nbsp;&nbsp;&nbsp;补发单号：<input id="re_Invoice_No"  name="re_Invoice_No" value="" class="input Tooltip" size=30  /><br>&nbsp;&nbsp;&nbsp;&nbsp;订单备注：<input id="Remarks"  name="Remarks" value="" class="input Tooltip" size=30  />&nbsp;&nbsp;&nbsp;&nbsp;错发漏发：<input id="isSigned"  name="isSigned" value="1" class="input Tooltip" type="checkbox"  /></div>',
			cancelValue: '取消编辑',
			okValue: '确定提交',
			ok: function () {
				var tid = $('#tid').val();
				var real_Invoice_No = $('#real_Invoice_No').val();
				var re_Invoice_No = $('#re_Invoice_No').val();
				var Remarks = $('#Remarks').val();
				
				$.post("index.asp", {
				action:editorder,
				tid: tid,
				real_Invoice_No: real_Invoice_No,
				re_Invoice_No: re_Invoice_No,
				Remarks: Remarks
					},
					function(data, status) {
						dialog({
								width: 400,
								title: '操作提示',
								content: data,
								cancelValue: '取消',
								okValue: '确定',
								ok: function() {alert("提交中.."+tid);
									setTimeout(function(){	location.reload();}, 2000)
								},
								cancel: function() {location.reload();}
							}).showModal();
					});
				},
			cancel: function () {}
			}).showModal();
	return false;
	
}



//编辑订单备注信息及物流信息
function AjaxeditOrder1(tid,Invoice_No,real_Invoice_No,re_Invoice_No,New_Invoice_No,Remarks,isSigned){
	contentType: "application/x-www-form-urlencoded; charset=utf-8"
	var content = '<div style="padding:0 10px;line-height:35px;" >原物流单号：'+Invoice_No+'<input id="tid"  name="tid" value="'+tid+'" type="hidden"/><br>&nbsp;&nbsp;关联单号1：<input id="real_Invoice_No" name="real_Invoice_No" value="'+real_Invoice_No+'" class="input Tooltip" title="这里填写关联单号信息" size=30 /><br>&nbsp;&nbsp;关联单号2：<input id="New_Invoice_No" name="New_Invoice_No" value="'+New_Invoice_No+'" class="input Tooltip" size=30 /><br>&nbsp;&nbsp;关联单号3：<input id="re_Invoice_No"  name="re_Invoice_No" value="'+re_Invoice_No+'" class="input Tooltip" size=30  /><br>&nbsp;&nbsp;&nbsp;&nbsp;订单备注：<input id="Remarks"  name="Remarks" value="'+Remarks+'" class="input Tooltip" size=30  /><br>&nbsp;&nbsp;&nbsp;&nbsp;错发漏发：<input id="isSigned"  name="isSigned" value="3" class="Tooltip" type="checkbox"  style="vertical-align:middle;"';
	if( isSigned==3 ){ content = content + ' checked="checked" ' };
	content = content + ' />（选中则表示该件为错发漏发件）</div>'
	dialog({
			width: 400,
			title: '编辑订单',
			content: content,
			cancelValue: '取消编辑',
			okValue: '确定提交',
			ok: function () {
				var real_Invoice_No = $('#real_Invoice_No').val();
				var re_Invoice_No = $('#re_Invoice_No').val();
				var New_Invoice_No = $('#New_Invoice_No').val();
				var Remarks = $('#Remarks').val();
				if( $('#isSigned').is(':checked') ){
				var isSigned = 3;
				}else{
				var isSigned = 0;
				}
				
				this.remove();
				AjaxSaveeditOrder(tid,real_Invoice_No,re_Invoice_No,New_Invoice_No,Remarks,isSigned);
			},
			cancel: function () {}
			}).showModal();
	return false;	
}

//编辑订单备注信息及物流信息
function AjaxeditOrder0(tid,Invoice_No,real_Invoice_No,re_Invoice_No,New_Invoice_No,Remarks,isSigned){
	contentType: "application/x-www-form-urlencoded; charset=utf-8"
	var content = '<div style="padding:0 10px;line-height:35px; " >\n\
    原物流单号：'+Invoice_No+'<input id="tid"  name="tid" value="'+tid+'" type="hidden"/><br>&nbsp;&nbsp;\n\
关联单号1：<input id="real_Invoice_No" name="real_Invoice_No" value="'+real_Invoice_No+'" class="input Tooltip" title="这里填写关联单号信息" size=30 /><br>&nbsp;&nbsp;\n\
关联单号2：<input id="New_Invoice_No" name="New_Invoice_No" value="'+New_Invoice_No+'" class="input Tooltip" size=30 /><br>&nbsp;&nbsp;\n\
关联单号3：<input id="re_Invoice_No"  name="re_Invoice_No" value="'+re_Invoice_No+'" class="input Tooltip" size=30  /><br>&nbsp;&nbsp;&nbsp;&nbsp;\n\
订单备注：<input id="Remarks"  name="Remarks" value="'+Remarks+'" class="input Tooltip" size=30  /><br>&nbsp;&nbsp;&nbsp;&nbsp;\n\
错发漏发：<input id="isSigned"  name="isSigned" value="3" class="Tooltip" type="checkbox"  style="vertical-align:middle;"';
	if( isSigned==3 ){ content = content + ' checked="checked" ' };
	content = content + ' />（选中则表示该件为错发漏发件）</div>'
	dialog({
			width: 400,
			title: '编辑订单',
			content: content,
			cancelValue: '取消编辑',
			okValue: '确定提交',
			ok: function () {
				var real_Invoice_No = $('#real_Invoice_No').val();
				var re_Invoice_No = $('#re_Invoice_No').val();
				var New_Invoice_No = $('#New_Invoice_No').val();
				var Remarks = $('#Remarks').val();
				if( $('#isSigned').is(':checked') ){
				var isSigned = 3;
				}else{
				var isSigned = 0;
				}
				
				this.remove();
				AjaxSaveeditOrder(tid,real_Invoice_No,re_Invoice_No,New_Invoice_No,Remarks,isSigned);
			},
			cancel: function () {}
			}).showModal();
	return false;	
}
//编辑订单备注信息及物流信息
function AjaxeditOrder(tid,Invoice_No,real_Invoice_No,re_Invoice_No,New_Invoice_No,Remarks,isSigned){
                       document.getElementById('tid_s').innerHTML = tid; 
                       $('.theme-popover-mask').fadeIn(100);
                       $('.theme-popover').slideDown(200);

}
function close_(){  
                       $('.theme-popover-mask').fadeOut(100);
                        $('.theme-popover').slideUp(200);
}


//保存订单备注信息及物流信息
function AjaxSaveeditOrder(tid,real_Invoice_No,re_Invoice_No,New_Invoice_No,Remarks,isSigned){
	contentType: "application/x-www-form-urlencoded; charset=utf-8"
	var myDate = new Date();
	var mytime=myDate.toLocaleTimeString();
	$.post("../trade/index.asp",
	{
	action:"saveeditorder",
	tid:tid,
	real_Invoice_No:real_Invoice_No,
	re_Invoice_No:re_Invoice_No,
	New_Invoice_No:New_Invoice_No,
	Remarks:Remarks,
	isSigned:isSigned,
	mytime:mytime
	},
	function(data,status){
		dialog({
				width: 400,
				title: '操作提示',
				content: data,
				cancelValue: '取消',
				okValue: '确定',
				ok: function() {location.reload();},
				cancel: function() {location.reload();}
			}).showModal();	
	});

}





