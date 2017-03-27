<?php
namespace Admin\Controller;
use Think\Controller;

class AttributeController extends Controller{
  
    public function getLeftArr(){
        
        $LeftArr=array(
                '1' =>array(
                    '1Name' =>'类型管理',
                    '1Url' =>U('Products/TypeList'),
                ),
                        
             );

        return $LeftArr;
        
    } 
    
    
    
    
    
    public function AttributeList(){
          
             //实例属性模型
             $model = D('Attribute');
             $data = $model->search();
           //获取类型数据
             $typeModel = D('Type');
             $typeData  = $typeModel->select();
             
            //设置页面信息


        $LeftArr=  $this->getLeftArr();
        $this->assign(array(
  
            'typeData'  =>$typeData,
            'pageString'=>$data['pageString'],
            'data'       =>$data['data'],
            'link'=>'add?type_id='.I('get.type_id'), 
    
            //main基本信息
            //左边
          'left'=>$LeftArr,
            //右边
          'right'=>array(
                 'One'=>array(
                    'OneName'=>'属性列表',
                    'OneUrl' =>U('AttributeList'),
                    'Color'  =>'employee_menu_curr employee_menu',   //curr 显示颜色  type 不显示
                ),
                'Two'=>array(
                    'TwoName'=>'添加属性',
                    'TwoUrl'=>U('AttributeAdd'),
                    'Color' =>'employee_menu_type employee_menu',
                       ),      
                 ),
             )
        );
        
        
        $this->display();
     
    }
    
    
    
    public function AttributeAdd(){
     //验证表单是否有提交的动作
          if(IS_POST){
            //1 创建属性模型
            $model = D("Attribute");
            //2 a 调用模型中的create()方法,将数据保存到模型中
            //  b 自定义规则验证,比如商品名称 价格 详情不能为空  输入的价格是否为货币格式
             //create()  方法第二个参数,表示当前是修改还是添加,1 表示添加,2表示修该
            //$_POST==I('post.');
           
            if($model->create(I('post.'),1)){  
                //3 调用add()方法将数据插入库中
                if($model->add()){
                   //4 插入成功进行跳转
                    $this->success('插入成功',U('AttributeList?type_id='.I('get.type_id')));
                    //停止后面代码,不再执行
                    exit;
                }
            } 
               //获取失败进行提示
                $error = $model->getError();
                $this->error($error);
            }        
        //获取所有的类型
            $tModel = D('Type');
            $tData = $tModel->select();
        
        
                    //设置页面信息
        $LeftArr=  $this->getLeftArr();
        $this->assign(array(
             'tData' =>$tData,
            
             'link'=>'AttributeList',
            //main基本信息
            //左边
          'left'=>$LeftArr,
            //右边
          'right'=>array(
                 'One'=>array(
                    'OneName'=>'属性列表',
                    'OneUrl' =>U('AttributeList'),
                    'Color'  =>'employee_menu_type employee_menu',   //curr 显示颜色  type 不显示
                ),
                'Two'=>array(
                    'TwoName'=>'添加属性',
                    'TwoUrl'=>U('AttributeAdd'),
                    'Color' =>'employee_menu_curr employee_menu',
                       ),      
                 ),
             )
        );

        $this->display();
    }
    
    
    public function AttributeEdit(){
         //获取属性ID
         $attrId = I('attr_id');
         //实例化属性模型
         $model = D('Attribute');
         $data = $model->alias('a')->field('a.*,b.type_name')
                 ->join('LEFT JOIN __TYPE__ b on a.type_id=b.id')
                 ->where(array('a.id'=>array('eq',$attrId)))->find();
        
         
         if(IS_POST){
             if($model->create(I('post.'),2)){
                 if($model->save()){
                     $this->success('修改成功', U('AttributeList?type_id='.I('gei.type_id')));exit;
                 }
                 
             }
             $error=$model->getError();
             $this->error($error);
       
         }
       
             //获取所有的类型
            $tModel = D('Type');
            $typeData = $tModel->select();
        
                            //设置页面信息
        $LeftArr=  $this->getLeftArr();
        $this->assign(array(
            'typeData'     =>$typeData,
             'data'         =>$data,
             'link'=>'AttributeList',
            //main基本信息
            //左边
          'left'=>$LeftArr,
            //右边
          'right'=>array(
                 'One'=>array(
                    'OneName'=>'属性列表',
                    'OneUrl' =>U('AttributeList'),
                    'Color'  =>'employee_menu_type employee_menu',   //curr 显示颜色  type 不显示
                ),
                'Two'=>array(
                    'TwoName'=>'添加属性',
                    'TwoUrl'=>U('AttributeAdd'),
                    'Color' =>'employee_menu_curr employee_menu',
                       ),      
                 ),
             )
        );
        
        
        $this->display();
    }
    
         public function AttributeDel() {
         //获取属性
         $AttributeId = I('attr_id');
         //实例化属性模型
         $model = D('Attribute');
       
         if($model->delete($AttributeId)=='1'){
             $this->success('删除属性成功!',U('AttributeList?type_id='.I('get.type_id')));
             
         }else{
              $this->success('删除属性失败!',U('AttributeList?type_id='.I('get.type_id')));
         }
     }

     
    
}