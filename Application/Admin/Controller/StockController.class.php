<?php
namespace Admin\Controller;
use Think\Controller;

class StockController extends BaseController{
    
    public function getLeftArr(){  
        $LeftArr=array(
                '1' =>array(
                    '1Name' =>'库存概况',
                    '1Url' =>U('Stock/StockList'),
                ),   
             );
        return $LeftArr;   
    } 
    
    
    
    
    //产品概况
    public function StockList(){
        
        //商品的 基本信息
        $model=D('Stock');
        $data=$model->search();
     //   var_dump($data);
        //sku与库存信息。与上面的商品对应
       
       // $sku_stock_list=$model->
      //  echo '<pre>';
       // var_dump($data);exit;
        $model=D('cation');
        $cat_list=$model->field('id,cat_name')->select();
        
        
        $LeftArr=  $this->getLeftArr();
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
            
            'pro_list'=>$data['pro_list'], //商品信息
            'showPage'=>$data['showPage'], //分页数据
            'cat_list'=>$cat_list,              //分类数据

        ));
        
        
        
        $this->display();
    } 
    
    
    
    public function StockEdit($sku_id){
        
        if(IS_POST){
         
            $model=D('stock');
            if($model->create(I('post.'),2)){
                if($model->save()!==false){       
                    $this->success('修改成功', U('StockList'));exit;
                }     
            }
                $error=$model->getError();
                $this->error($error);
        }
        
        
        
        
    
       
 
        //查询这条数据。。显示出来
        $model=D('Stock');
        $data=$model->EditData($sku_id);
        $LeftArr=  $this->getLeftArr();
        var_dump($data);
        $this->assign(array(
            'left'=>$LeftArr,//左 列表信息  
               
            'right'=>array(
                 'One'=>array(
                    'OneName'=>'库存概况',
                    'OneUrl' =>U('Stock/StockList'),
                    'Color'  =>'employee_menu_type employee_menu',   //curr 显示颜色  type 不显示
                ),
                'Two'=>array(
                    'TwoName'=>'产品入库',
                    'TwoUrl'=>U('Stock/StockList'),
                    'Color' =>'employee_menu_curr employee_menu',
                       ),      
                 ),
            'data'=>$data
            

        ));

        $this->display();
        
    }
    

} 
