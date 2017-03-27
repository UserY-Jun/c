<?php
namespace Admin\Model;
use Think\Model;

class ClockModel extends Model{
    
     
         /******************************数据************************************/
           public function search($pagelist=3,$recOns=0)
           { 
               
               
           //     $sql = 'select * from cms_clock where 1=1 AND MONTH(s_time_)=MONTH(CURDATE()) ORDER BY id DESC;';
          //      $oldOrder = $this->query($sql); 
                
                 /********  分页数据 *************/
       
         
         $count = $this->where($where)->count();        //获取总页数
         $page=new \Think\Page($count,$pagelist); //实例化分页类并传参
         
        // $page->setConfig('header','<a class="pages">共%TOTAL_ROW%条记录  第%NOW_PAGE%页/共%TOTAL_PAGE%页<a/>');
           $page->setConfig('header','<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
         //跟该配置文件样式
         $page->setConfig('prev', '<input type="button" value="上一页">');
         $page->setConfig('next', '<input type="button" value="下一页">');
         $page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER% ');
        
         //获取显示数据
         $show=$page->show();
               
               
                
                $oldOrder=$this
                        ->where('MONTH(s_time_)=MONTH(CURDATE()) AND 1')
                        ->order('id desc')
                         ->limit($page->firstRow,$page->listRows)
                        ->select();
             
                
             return array(
             'oldOrder' => $oldOrder,
             'showPage' =>$show
                     );    
               
           }
    
    
       
    
    
    
}