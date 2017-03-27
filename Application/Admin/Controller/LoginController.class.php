<?php
namespace Admin\Controller;
use Think\Controller;

class LoginController extends Controller{
    public function Login(){
        if(IS_POST){
            
            $accounts=I('post.accounts');
            $password=I('post.Password');
            $model=D('User');
            if($model->login($accounts,$password)){

                $self=cookie('self');
                if($self){
                   $this->success('登录成功',$self, $model); //进入退出时的页面
                   exit;
                }
                    
                $this->success('登录成功', U('index/index'), $model);
                exit;
            }else{
                $this->error('用户名或密码错误');
            }
            
            
        }
        
        

        $this->display();
    }
    
    public function loginout(){
        $model=D('User');
        $model->loginout();
        $this->redirect('login/login');
        
        
    }
    
    
    
}