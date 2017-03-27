
//每条用户纪录鼠标滑过TR变色
$(function(){
	$('#recordlist tr').mouseover(function(){
		if ( $(this).attr('class')=="changecolour"){$(this).find("td").addClass("hover"); }
	})
	$("#recordlist tr").mouseout(function(){ 
	$(this).find("td").removeClass("hover"); 
	}); 
	
    $('#Employee_color').iColor();

})

//更新店铺验证码
function AjaxUpdateShopBarCode(){
	var myDate = new Date();
	var mytime=myDate.toLocaleTimeString();
	$.get("../employee/index.asp?action=shopbarcode&sid=3&mytime="+mytime,function(data,status){
			dialog({
				width: 400,
				title: '操作提示',
				content: data,
				cancelValue: '取消',
				okValue: '确定',
				ok: function () {setTimeout(function(){location.reload();}, 10000);},
				cancel: function () {}
				}).showModal();
		});
};



function PrintIuqn(CountDate,stype){
	var myDate = new Date();
	var mytime = myDate.toLocaleTimeString();
	LODOP = getLodop();
	LODOP.SET_LICENSES("", "388939153565759531031161165612", "647464550565952555560596056128", "642454550586052566362576169715");
	SelectAsDefaultPrinter();
	LODOP.PRINT_INIT("考勤记录打印");
	LODOP.SET_PRINT_PAGESIZE(2, 2100, 2970, "");
	LODOP.SET_PRINT_MODE("POS_BASEON_PAPER", true);
	LODOP.ADD_PRINT_URL("8mm", "10mm", "RightMargin:5mm", "BottomMargin:10mm", "../employee/index.asp?action=printiuqn&CountDate=" + CountDate + "&mytime=" + mytime);
	//LODOP.ADD_PRINT_URL(30,20,746,"100%",document.getElementById(strID).value);
	//LODOP.SET_SHOW_MODE("MESSAGE_GETING_URL",""); //该语句隐藏进度条或修改提示信息
	//LODOP.SET_SHOW_MODE("MESSAGE_PARSING_URL","");//该语句隐藏进度条或修改提示信息
    if (stype==1){LODOP.PREVIEW();}
    else if (stype==0){LODOP.PRINT();};
		
};



//删除操作
function AjaxDelEmployee(idval){

	var d = dialog({
		width: 400,
		title: '操作提示',
		//cancel: false,
		content: '信息处理中，请稍候...'
	});
	d.showModal();
	$.post("index.asp",
		{
		action:'delemployee',
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

//还原操作
function AjaxRecoveryEmployee(idval){

	var d = dialog({
		width: 400,
		title: '操作提示',
		//cancel: false,
		content: '信息处理中，请稍候...'
	});
	d.showModal();
	$.post("index.asp",
		{
		action:'Recovery',
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


//删除用户
function AjaxSaveEmployee(idval){

	var d = dialog({
		width: 400,
		title: '操作提示',
		//cancel: false,
		content: '模板信息处理中，请稍候...'
	});
	d.showModal();
	$.post("index.asp",
		{
		action:'saveemployee',
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

//编辑用户
function AjaxEditEmployee(id,p){
	location.href = "../employee/index.asp?action=editemployee&id="+id+"&p="+p;
};

//查看用户日志
function AjaxLogList(id,p){
	location.href = "../employee/index.asp?action=loglist&UserID="+id+"&p="+p;
};


//编辑用户
function EditEmployee(num_iid,act,keywords,p){
	location.href = "../employee/index.asp?action=editemployee&act="+act+"&keywords="+keywords+"&p="+p+"&num_iid="+num_iid;
};




//删除用户
function SaveBarCodePrinterSet(){

	var d = dialog({
		width: 400,
		title: '操作提示',
		//cancel: false,
		content: '打印设置信息处理中，请稍候...'
	});
	d.showModal();
	var myDate = new Date();
	var mytime=myDate.toLocaleTimeString();
	$.post("../employee/index.asp",
		{
		action:'saveprinterset',
		PagSizeType:$('input:radio[name=PagSizeType]:checked').val(),
		strPageName:$("#strPageName").val(),
		strPrinterName:$("#strPrinterName").val(),
		intPageWidth:$("#intPageWidth").val(),
		intPageHeight:$("#intPageHeight").val(),
		intOrient:$('input:radio[name=intOrient]:checked').val(),
		offsetLeft:$("#offsetLeft").val(),
		offsetTop:$("#offsetTop").val(),
		intCopies:$("#intCopies").val(),
		mytime:mytime
		},
		function(data,status){
		d.close().remove();
		var dd = dialog({
			width: 400,
			title: '操作提示',
			content: data,
			okValue: '确定',
			ok: function () {location.reload();}
			});
			dd.showModal();
			setTimeout(function(){
			dd.close().remove();
			location.reload();
		}, 5000);
	});
		
};


function ColorChoict(){
	$("#Employee_color").colorpicker({
    fillcolor:true
	});
}




