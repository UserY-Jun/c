<?php 


$model=D('setup'); $admin= cookie('admin');$where['id']=$admin['id'];
$data=$model->where($where)->find();   

$PrinterName_Inv=$data['str_printer_name_inv'];     //打印机名称                            0
$intOrient_Inv=$data['int_orient_inv'];             // 发货单纸张方向 1为纵向 2 为横向       1
$PagSizeType_Inv =$data['pag_size_type_inv'];       //是否自定义纸张                         2
$PageSizeName_Inv = $data['pagsize_type_inv'];      //纸张                                  3
$intPageWidth_Inv =$data['int_page_width_inv'];     //发货单自定义纸张宽度  单位CM            4
$intPageHeight_Inv = $data['int_page_height_inv'];  //发货单自定义纸张高度 单位CM             5
$offsetLeft_Inv = $data['offset_left_inv'];         //发货单左偏移                           6
$offsetTop_Inv = $data['offset_top_inv'];           //发货单上偏移                           7
$intCopies_Inv = $data['int_copies_inv'];           //发货单打印份数                         8

if($PagSizeType_Inv==2){
    $intPageWidth_Inv=0;
    $intPageHeight_Inv=0;
}else{ 
    $intPageWidth_Inv = $intPageWidth_Inv * 100;
    $intPageHeight_Inv = $intPageHeight_Inv * 100;
}

        $PrinterName_Ord   = $data['str_printer_name_ord'];   //配货单打印机名称  0                          0
	$intOrient_Ord     = $data['int_orient_ord'];       //配货单纸张方向1
	$PagSizeType_Ord   = $data['pag_size_type_ord'];    //配货单是否自定义纸张2
	$PageSizeName_Ord  = $data['str_page_name_ord'];    // 配货单指定纸张 lodop获取3
	$intPageWidth_Ord  = $data['int_page_width_ord'];   // 配货单自定义宽度 单位CM 4
	$intPageHeight_Ord = $data['int_page_height_ord'];  //配货单自定义高度  单位CM  5
	$offsetLeft_Ord    = $data['offset_left_ord'];      //配货单左偏移 6
	$offsetTop_Ord     = $data['offset_top_ord'];   //配货单上偏移7
	$intCopies_Ord     = $data['int_copies_ord'];       //配货单打印份数8
        if($PagSizeType_Ord==2){
            $intPageWidth_Ord=0;
            $intPageHeight_Ord=0;
        }else{ 
            $intPageWidth_Ord = $intPageWidth_Ord * 100;
            $intPageHeight_Ord = $intPageHeight_Ord * 100;
        }

?>
    
<script>
var LODOP; //声明为全局变量
//trade/index.asp 订单管理页面发货单打印    



function InvoicesPrint(stype){  
	var myDate = new Date();
	var mytime=myDate.toLocaleTimeString();
    
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
	
	LODOP=getLodop();  
	LODOP.SET_LICENSES("","388939153565759531031161165612","647464550565952555560596056128","642454550586052566362576169715");
	$('[name="check_row"]:checkbox:checked').each(function(){ 
	LODOP.PRINT_INIT("发货单批量打印");
	LODOP.SET_PRINT_PAGESIZE("<?php echo $intOrient_Inv; ?>","<?php echo $intPageWidth_Inv; ?>","<?php echo $intPageHeight_Inv; ?>","<?php echo $PageSizeName_Inv; ?>");
	LODOP.SET_PRINT_MODE("POS_BASEON_PAPER",true);
	LODOP.SET_PRINTER_INDEXA("<?php echo $PrinterName_Inv; ?>");
    LODOP.SET_PRINT_COPIES("<?php echo $intCopies_Inv; ?>");
	LODOP.NewPage();
	LODOP.ADD_PRINT_URL("5mm","5mm","RightMargin:1mm","BottomMargin:1mm","http://www.c.com/index.php/Admin/Trade/InvoicesPrintList/tid_s/"+$(this).val());
    	if (stype==1){LODOP.PREVIEW();}
        else if (stype==0){LODOP.PRINT();}
        else if (stype==2){AjaxOrdersStatus($(this).val(),2,1,0);}
        else if (stype==3){AjaxOrdersStatus($(this).val(),2,0,0);};
	})

    if (stype==2){
        dialog({
			width: 400,
			title: '操作提示',
			content: "操作完成，所选订单的发货单已全部标记为已打印",
			okValue: '确定',
			ok: function () {setTimeout(function(){location.reload(); }, 1000);}
			}).showModal();
         }
     else if (stype==3){
        dialog({
			width: 400,
			title: '操作提示',
			content: "操作完成，所选订单的发货单已全部标记为未打印",
			okValue: '确定',
			ok: function () {setTimeout(function(){location.reload(); }, 1000);}
			}).showModal();
      };

	};


//trade/index.asp 订单管理页面配货单打印
function OrderBlankPrint(stype){ 
	var myDate = new Date();
	var mytime=myDate.toLocaleTimeString();
    
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
	
	LODOP=getLodop();  
	LODOP.SET_LICENSES("","388939153565759531031161165612","647464550565952555560596056128","642454550586052566362576169715");
	$('[name="check_row"]:checkbox:checked').each(function(){ 
	LODOP.PRINT_INIT("发货单批量打印");
	LODOP.SET_PRINT_PAGESIZE("<?php echo $intOrient_Ord; ?>","<?php echo $intPageWidth_Ord; ?>","<?php echo $intPageHeight_Ord; ?>","<?php echo $PageSizeName_Ord; ?>");
	LODOP.SET_PRINT_MODE("POS_BASEON_PAPER",true);
	LODOP.SET_PRINTER_INDEXA("<?php echo $PrinterName_Ord; ?>");
    LODOP.SET_PRINT_COPIES("<?php echo $intCopies_Ord; ?>");
	LODOP.NewPage();
	LODOP.ADD_PRINT_URL("5mm","5mm","RightMargin:1mm","BottomMargin:1mm","http://www.c.com/index.php/Admin/Trade/OrderBlankPrintInfoList/tid_s/"+$(this).val());
    	if (stype==1){LODOP.PREVIEW();}
        else if (stype==0){LODOP.PRINT();}
        else if (stype==2){AjaxOrdersStatus($(this).val(),3,1,0);}
        else if (stype==3){AjaxOrdersStatus($(this).val(),3,0,0);};
	})

    if (stype==2){
        dialog({
			width: 400,
			title: '操作提示',
			content: "操作完成，所选订单的发货单已全部标记为已打印",
			okValue: '确定',
			ok: function () {setTimeout(function(){location.reload(); }, 1000);}
			}).showModal();
         }
     else if (stype==3){
        dialog({
			width: 400,
			title: '操作提示',
			content: "操作完成，所选订单的发货单已全部标记为未打印",
			okValue: '确定',
			ok: function () {setTimeout(function(){location.reload(); }, 1000);}
			}).showModal();
      };

};





//trade/index.asp 订单管理页面配货单打印
function StatisticsListPrint(stype){ 
	var myDate = new Date();
	var mytime=myDate.toLocaleTimeString();
    
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
	
	LODOP=getLodop();  
	LODOP.SET_LICENSES("","388939153565759531031161165612","647464550565952555560596056128","642454550586052566362576169715");
	$('[name="check_row"]:checkbox:checked').each(function(){ 
	LODOP.PRINT_INIT("发货单批量打印");
	LODOP.SET_PRINT_PAGESIZE("<?php echo $intOrient_Ord; ?>","<?php echo $intPageWidth_Ord; ?>","<?php echo $intPageHeight_Ord; ?>","<?php echo $PageSizeName_Ord; ?>");
	LODOP.SET_PRINT_MODE("POS_BASEON_PAPER",true);
	LODOP.SET_PRINTER_INDEXA("<?php echo $PrinterName_Ord; ?>");
    LODOP.SET_PRINT_COPIES("<?php echo $intCopies_Ord; ?>");
	LODOP.NewPage();
	LODOP.ADD_PRINT_URL("5mm","5mm","RightMargin:1mm","BottomMargin:1mm","http://www.c.com/index.php/Admin/Trade/OrderBlankPrintInfoList/tid_s/"+$(this).val());
    	if (stype==1){LODOP.PREVIEW();}
        else if (stype==0){LODOP.PRINT();}
        else if (stype==2){AjaxOrdersStatus($(this).val(),3,1,0);}
        else if (stype==3){AjaxOrdersStatus($(this).val(),3,0,0);};
	})

    if (stype==2){
        dialog({
			width: 400,
			title: '操作提示',
			content: "操作完成，所选订单的发货单已全部标记为已打印",
			okValue: '确定',
			ok: function () {setTimeout(function(){location.reload(); }, 1000);}
			}).showModal();
         }
     else if (stype==3){
        dialog({
			width: 400,
			title: '操作提示',
			content: "操作完成，所选订单的发货单已全部标记为未打印",
			okValue: '确定',
			ok: function () {setTimeout(function(){location.reload(); }, 1000);}
			}).showModal();
      };

};




</script>