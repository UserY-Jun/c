//编辑订单备注信息及物流信息
function AjaxeditIuqn(WorkDate,UserID,NickName){    
	contentType: "application/x-www-form-urlencoded; charset=utf-8"
	var content = '<div style="padding:0 20px;line-height:35px;" >用户姓名：'+NickName+'<br>考勤日期：'+WorkDate+'<input id="UserID"  name="UserID" value="'+UserID+'" type="hidden"/><input id="WorkDate"  name="WorkDate" value="'+WorkDate+'" type="hidden"/><br>考勤状态：\n\
    <select id="WorkType" name="WorkType" style="width:180px;">\n\
        <option value="1">〖√〗 正常出勤</option><option value="2">〖√√〗 正常出勤（双班）</option>\n\
        <option value="3">〖√+✪〗 正常出勤 + 加班</option><option value="4">〖半〗 出勤半天</option>\n\
        <option value="5">〖—〗 迟到早退</option>\n\<option value="6">〖△〗 请假</option>\n\
        <option value="7">〖×〗 旷工</option><option value="8">〖✪〗 加班</option>\n\
        <option value="9">〖〇〗 未加班</option><option value="10">〖休〗 休息</option>\n\
        <option value="11">〖✪+✪〗 加班（双班）</option><option value="12">〖空〗 记录为空</option>\n\
        </select><br>备注信息：<input id="Remark" name="Remark" value="" class="input" style="width:180px;"/></div>';
	dialog({
			width: 400,
			title: '考勤状态',
			content: content,
			cancelValue: '关闭窗口',
			okValue: '确定提交',
			ok: function () {
				var UserID = $('#UserID').val();
				var WorkDate = $('#WorkDate').val();
				var WorkType = $('#WorkType').val();
				var Remark = $('#Remark').val();
				this.remove();
				AjaxIuqnStatus(WorkType,WorkDate,UserID,Remark);
			},
			cancel: function () {}
			}).showModal();
	return false;	
}


//更新考勤状态
function AjaxIuqnStatus(WorkType,WorkDate,UserID,Remark){
    
	var d = dialog({
		width: 400,
		title: '操作提示',
		content: '信息处理中，请稍候...'
	});
	d.showModal();
	$.post("/index.php/Admin/Admin/EditClock",
		{
		action:'editiuqnstatus',
		WorkType:WorkType,
		WorkDate:WorkDate,
		Remark:Remark,
		UserID:UserID
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