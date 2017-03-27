<?php
namespace Admin\Controller;
use Think\Controller;

class PrivilegeController extends BaseController{
       public function getLeftArr(){
           $LeftArr=array(
                '0'=>array(
                    '0Name'=>'工作岗位',
                    '0Url' =>U('role/roleList'),
                ),
                '1'=>array(
                    '1Name'=>'权限列表',
                    '1Url'=>U('privilege/prilist'),
                ),  
               '2'=>array(
                   '2Name'=>'操作日志',
                   '2Url'=>U(''),
               ),
             );
           return $LeftArr;
        
    }
    
    
    
    public function prilist(){
        $model=D('Privilege'); 
        $prilist=$model->getTree($data);
                       //模板信息
        $LeftArr=  $this->getLeftArr();
        $this->assign(array(
             //main基本信息
            //左边
          'left'=>$LeftArr,
            //右边
          'right'=>array(
                 'One'=>array(
                    'OneName'=>'权限列表',
                    'OneUrl' =>U('prilist'),
                    'Color'  =>'employee_menu_curr employee_menu',   //curr 显示颜色  type 不显示
                ),
                'Two'=>array(
                    'TwoName'=>'添加新权限',
                    'TwoUrl'=>U('priadd'),
                    'Color' =>'employee_menu_type employee_menu',
                ),      
            ),         
            'prilist'=>$prilist,
        ));
        $this->display();
    }
    
    
    public function priadd(){
        $model=D('privilege');
        if(IS_POST){
            if($model->create()){
                if($model->add()){
                    $this->success('添加成功', U('prilist'));
                    exit;
                }       
            }
         $error=$model->getError();
         $this->error($error);      
        }
        $model=D('privilege');
        $data=$model->field('id,pri_name,parent_id')->select();
        $prilist=$model->getTree($data);     
                        //模板信息
        $LeftArr=  $this->getLeftArr();
        
        $this->assign(array(
             //main基本信息
            //左边
          'left'=>$LeftArr,
            //右边
          'right'=>array(
                 'One'=>array(
                    'OneName'=>'权限列表',
                    'OneUrl' =>U('prilist'),
                    'Color'  =>'employee_menu_type employee_menu',   //curr 显示颜色  type 不显示
                ),
                'Two'=>array(
                    'TwoName'=>'添加新权限',
                    'TwoUrl'=>U('priadd'),
                    'Color' =>'employee_menu_curr employee_menu',
                ),      
            ),
            
            'prilist'=>$prilist,

        ));
        $this->display();
    }
    
    
    public function priedit($pri_id){
        $model=D('privilege');
        if(IS_POST){
            if($model->create(I('post.'),2)){
                if($model->where(array('id'=>array('EQ',$pri_id)))->save()!==false){
                    $this->success('修改成功', U('prilist'));
                    exit;
                }       
            }
         $error=$model->getError();
         $this->error($error);      
        }
        $model=D('privilege');
        $data=$model->field('id,pri_name,parent_id')->select();
        $url_data=$model->where(array('id'=>array('EQ',$pri_id)))->find();
        var_dump($url_data);
        
        
        $prilist=$model->getTree($data);     
                        //模板信息
        $LeftArr=  $this->getLeftArr();
        $this->assign(array(
            //main基本信息
            //左边
          'left'=>$LeftArr,
            //右边
          'right'=>array(
                 'One'=>array(
                    'OneName'=>'权限列表',
                    'OneUrl' =>U('prilist'),
                    'Color'  =>'employee_menu_type employee_menu',   //curr 显示颜色  type 不显示
                ),
                'Two'=>array(
                    'TwoName'=>'修改权限',
                    'TwoUrl'=>U('priedit'),
                    'Color' =>'employee_menu_curr employee_menu',
                ),      
            ),
            
            'prilist'=>$prilist,
            'url_data'=>$url_data,
        ));
        
        
        $this->display();
    }

    



    public function pridel($pri_id){
        $model=D('privilege');
        if($model->where(array('id'=>array('EQ',$pri_id)))->delete()){
             $this->success('删除成功', U('prilist'));
        }else{
            $this->error('删除失败'); 
        };

    }
    
    public function shop_pri(){
        
         $this->redirect('/Admin/index/index');
    }   
}