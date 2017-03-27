<?php
namespace Admin\Model;

use Think\Model;


  Class OrdersBaseModel extends Model{
      
          public function add($data='',$options=array(),$replace=false){
               
              parent::add($data, $options, $replace); 
              
                //记录 $sql....... 
                //可以用文件记录，如果用数据库记录注意得用parent::add
                //否则可能死循环
                 }
      
      
      
      
      
  }