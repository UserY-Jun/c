
$(function() {  
            x = 5;  
            y = 15;  
            $(".Tooltip").hover(function(e) {  
                otitle = this.title;  
                this.title = "";  
                var ndiv = "<div id='simpleTooltip' style='z-index:9999;'>" + otitle + "</div>";  
                $("body").append(ndiv);  
                $("#simpleTooltip").css({  
                    "top" : (e.pageY + y) + "px",  
                    "left" : (e.pageX + x) + "px"  
                }).show(2000);
                $(this).mousemove(function(e) {  
                    $("#simpleTooltip").css({  
                        "top" : (e.pageY + y) + "px",  
                        "left" : (e.pageX + x) + "px"  
                    }).show(1000);  
                });  
            }, function() {  
                this.title = otitle;  
                $("#simpleTooltip").remove();  
            });  
        });  




//出现提示手动选择打印机
function SelectAsDefaultPrinter() {
	LODOP=getLodop();  
    if (LODOP.SELECT_PRINTER()>=0) 
    LODOP.SET_PRINTER_INDEXA(LODOP.SELECT_PRINTER())
};


function AutoUpdateTrade(RecentDays) {
	$("#updatestate").html("正在同步淘宝订单，请勿刷新浏览器，请耐心等候...");
	$.post("../trade/TradeDownload.asp", {
		RecentDays: RecentDays,
		OrderStateID: 0
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
				cancel: function() {}
			}).showModal();
		} else {
			$("#updatestate").html("正在同步淘宝订单，请勿刷新浏览器，请耐心等候...");
			setTimeout(function() {$("#updatestate").html("订单更新完成");},300);
		}
	});
};



