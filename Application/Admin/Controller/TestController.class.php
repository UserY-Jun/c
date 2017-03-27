<?php
namespace Admin\Controller;
use Think\Controller;

class TestController extends Controller{
    public function test(){
       //商品的 基本信息
        $model=D('Stock');
        $data=$model->search();
        //sku与库存信息。与上面的商品对应
       
       // $sku_stock_list=$model->
        
      

     //   var_dump($data);
        
        $this->assign(array(
            'left'=>$LeftArr,//左 列表信息  
               
            'right'=>array(
                 'One'=>array(
                    'OneName'=>'库存概况',
                    'OneUrl' =>U('Stock/StockList'),
                    'Color'  =>'employee_menu_curr employee_menu',   //curr 显示颜色  type 不显示
                ),
                'Two'=>array(
                    'TwoName'=>'产品入库',
                    'TwoUrl'=>U('Stock/StockList'),
                    'Color' =>'employee_menu_type employee_menu',
                       ),      
                 ),
            
            'pro_list'=>$data['pro_list'],
            'showPage'=>$data['showPage'],
            

        ));
        
        
        
        $this->display();
    } 
    
    public function TestTrade(){
        
        echo 1;
    }
    
    
 
    
    
    }
    
    
    
    
