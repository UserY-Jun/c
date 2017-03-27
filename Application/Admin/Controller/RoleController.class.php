<?php
namespace Admin\Controller;
use Think\Controller;
class RoleController extends BaseController{
           public function getLeftArr(){
           $LeftArr=array(
                '0'=>array(
                    '0Name'=>'工作岗位',
                    '0Url' =>U('roleList'),
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
    
    
    
    public function rolelist(){
        $model=D('role');
        $data=$model->search();

                    //模板信息
        $LeftArr=  $this->getLeftArr();
        
        $this->assign(array(
             //main基本信息
            //左边
          'left'=>$LeftArr,
            //右边
          'right'=>array(
                 'One'=>array(
                    'OneName'=>'工作岗位',
                    'OneUrl' =>U('roleList'),
                    'Color'  =>'employee_menu_curr employee_menu',   //curr 显示颜色  type 不显示
                ),
                'Two'=>array(
                    'TwoName'=>'添加新岗位',
                    'TwoUrl'=>U('roleadd'),
                    'Color' =>'employee_menu_type employee_menu',
                ),      
            ),
                   
            'showPage'=>$data['showPage'],
            'rolelist' =>$data['role_list'],

            
            
        ));
       // var_dump($data['role_list']);
        $this->display();
    }
    
     
   public function roleadd(){
       //显示权限
       $model=D('privilege');
       $prilist=$model->getTree();
        $model=D('role');
       if(IS_POST){
           if($model->create(I('post.'),1)){
               if($model->add()){
                   $this->success('添加成功',U('rolelist'));
                   exit;
               }
           }
           
           $error=$model->getError();
           $this->error($error);
       }
      
       
               //模板信息
        $this->assign(array(
            'list'=>'所有岗位',
            'add'=>'添加新岗位',
            'listurl' =>'role/roleList',
            'addurl' =>'role/roleadd',
            
        ));
        
       
       
           $LeftArr=  $this->getLeftArr();
        
        $this->assign(array(
             //main基本信息
            //左边
          'left'=>$LeftArr,
            //右边
          'right'=>array(
                 'One'=>array(
                    'OneName'=>'工作岗位',
                    'OneUrl' =>U('roleList'),
                    'Color'  =>'employee_menu_type employee_menu',   //curr 显示颜色  type 不显示
                ),
                'Two'=>array(
                    'TwoName'=>'添加新岗位',
                    'TwoUrl'=>U('roleadd'),
                    'Color' =>'employee_menu_curr employee_menu',
                ),      
            ),
            'prilist'  =>$prilist,
            
            

        ));
        $this->display();
    }
        
    
    public function roleedit($role_id){
       $model=D('privilege');
       $prilist=$model->getTree();
       
       $model=D('role');
       $role_name=$model->where(array('id'=>array(EQ,$role_id)))->find();
       
       $model=D('role_pri'); 
       $pri_id=$model->where(array('role_id'=>array(EQ,$role_id)))->field('GROUP_CONCAT(pri_id) pri_id')->find(); 
       
       
       if(IS_POST){ 
       $model=D('role');
       if($model->create(I('post.'),2)){
           if($model->save()!==false){
               $this->success('修改成功',U('rolelist'));
               exit;
           }
       }
       $error=$model->getError();
       $this->error($error);
       }
           $LeftArr=  $this->getLeftArr();
        
        $this->assign(array(
             //main基本信息
            //左边
          'left'=>$LeftArr,
            //右边
          'right'=>array(
                 'One'=>array(
                    'OneName'=>'工作岗位',
                    'OneUrl' =>U('roleList'),
                    'Color'  =>'employee_menu_type employee_menu',   //curr 显示颜色  type 不显示
                ),
                'Two'=>array(
                    'TwoName'=>'修改岗位',
                    'TwoUrl'=>U('roleedit'),
                    'Color' =>'employee_menu_curr employee_menu',
                ),      
            ),
            
            
            'role_name'=>$role_name,
            'pri_id' =>$pri_id,
            'prilist'  =>$prilist,

        ));
        $this->display();
        
        
    }

    

    public function roledel($role_id){
        $model=D('role');
        if($model->delete($role_id)){
            $this->success('删除成功',U('rolelist'));
        }
        
        
        
        
        
    }
    
    
    
    
}

