
//每条产品纪录鼠标滑过TR变色
$(function(){
	$('#recordlist tr').mouseover(function(){
		if ( $(this).attr('class')=="changecolour"){$(this).find("td").addClass("hover"); }
	})
	$("#recordlist tr").mouseout(function(){ 
	$(this).find("td").removeClass("hover"); 
	}); 
})



//同步产品信息
function getupdateproducts(){
	var myDate = new Date();
	var mytime=myDate.toLocaleTimeString();
	var d = dialog({
		width: 400,
		title: '操作提示',
		//cancel: false,
		content: '产品信息同步中，需要一点时间的哦，请耐心等待一下哦...'
	});
	d.showModal();
	$.post("ProductsEdit.asp",
		{
		RecentDays:$("#RecentDays").val(),
		mytime:mytime
		},
		function(data,status){
		d.close().remove();
		if (data.indexOf("session") >= 0){
		//alert('授权失败');
			dialog({
				width: 400,
				title: '授权失败',
				content: '请先进入授权页面进行授权操作<br>点击"确定"按钮进入授权页面',
				cancelValue: '取消',
				okValue: '确定',
				ok: function () {location.href = '../authorize/index.asp?action=authorize&geturl='+window.location.href },
				cancel: function () {}
				}).showModal();
					
		}else{
			 var dd = dialog({
				width: 400,
				title: '操作提示',
				content: data,
				okValue: '确定',
				ok: function () {}
				});
				dd.showModal();
				setTimeout(function(){
				dd.close().remove();
				location.reload();
			}, 10000);
		}
	});
		
};


//保存产品
function AjaxSaveSortName(id){

	var d = dialog({
		width: 400,
		title: '操作提示',
		//cancel: false,
		content: '商品信息保存中，请稍候...'
	});
	d.showModal();
	$.post("ProductsEdit.asp",
		{
		action:'savesortname',
		shortname:$("#shortname_"+id).val(),
		weight:$("#weight_"+id).val(),
		id:id
		},
		function(data,status){
		d.close().remove();
		var dd = dialog({
			width: 400,
			title: '操作提示',
			content: data,
			okValue: '确定',
			ok: function () {}
			});
			dd.showModal();
			setTimeout(function(){
			dd.close().remove();
			//location.reload();
		}, 1000);
	});
		
};


//删除产品
function AjaxDelIteam(id,stype){

	var d = dialog({
		width: 400,
		title: '操作提示',
		//cancel: false,
		content: '商品信息处理中，请稍候...'
	});
	d.showModal();
	$.post("products.asp",
		{
		action:'delitem',
		stype:stype,
		id:id
		},
		function(data,status){
		d.close().remove();
		var dd = dialog({
			width: 400,
			title: '操作提示',
			content: data,
			okValue: '确定',
			ok: function () {}
			});
			dd.showModal();
			setTimeout(function(){
			dd.close().remove();
			location.reload();
		}, 1000);
	});
		
};


//删除产品
function AjaxDelTemplet(idval){

	var d = dialog({
		width: 400,
		title: '操作提示',
		//cancel: false,
		content: '模板信息处理中，请稍候...'
	});
	d.showModal();
	$.post("index.asp",
		{
		action:'deltemplet',
		id:idval
		},
		function(data,status){
		d.close().remove();
		var dd = dialog({
			width: 400,
			title: '操作提示',
			content: data,
			okValue: '确定',
			ok: function () {}
			});
			dd.showModal();
			setTimeout(function(){
			dd.close().remove();
			location.reload();
		}, 1000);
	});
		
};


//删除产品
function AjaxSaveTemplet(idval){

	var d = dialog({
		width: 400,
		title: '操作提示',
		//cancel: false,
		content: '模板信息处理中，请稍候...'
	});
	d.showModal();
	$.post("index.asp",
		{
		action:'savetemplet',
		id:idval,
		title: $("#title").val(),
		content:$("#content").innerHTML,
		OrderNum: $("#OrderNum").val()
		},
		function(data,status){
		d.close().remove();
		var dd = dialog({
			width: 400,
			title: '操作提示',
			content: data,
			okValue: '确定',
			ok: function () {}
			});
			dd.showModal();
			setTimeout(function(){
			dd.close().remove();
			location.reload();
		}, 1000);
	});
		
};

//删除产品
function AjaxEditTemplet(id){
	location.href = "../templet/index.asp?action=editusage&id="+id;
};


//编辑产品模板
function EditUsage(id,act,keywords,classid,p){
	location.href = "../products/index.asp?action=editusage&act="+act+"&classid="+classid+"&keywords="+keywords+"&p="+p+"&id="+id;
};



//编辑产品模板
function EditUsageLocal(id,act,keywords,classid,p){
	location.href = "../products/products.asp?action=editusage&act="+act+"&classid="+classid+"&keywords="+keywords+"&p="+p+"&id="+id;
};

function UsagePrint(id){
	//location.href = "../trade/printout.asp?action=usageprint&showtype=1&id="+id;
	window.open ("../trade/printout.asp?action=usageprint&showtype=1&id="+id)
};


function showusagemode(stype){
	switch (stype)
	{
	case 0:
		$('#showcontent').css("display","none");
		$('#showtemplet').css("display","none");
		break;
	case 1:
		$('#showcontent').css("display","");
		$('#showtemplet').css("display","none");
		break;
	case 2:
		$('#showcontent').css("display","none");
		$('#showtemplet').css("display","");
		break;
	}
}


function GetProTitle(TitleLen){
	var myDate = new Date();
	var mytime=myDate.toLocaleTimeString();
	$.get("../products/gettitle.asp?TitleLen="+TitleLen+"&mytime="+mytime,function(data,status){
		//$("#SubTitleBNum").html(data);
		$("#SubTitleA").val(data);
		});
}
