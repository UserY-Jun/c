<?php
namespace Admin\Model;

use Think\Model;

    Class BaseModel extends Model{
        public function add($data='',$options=array(),$replace=false){
                 $ret=parent::add($data, $options, $replace); 
                 $sql = $this->_sql(); 
                 $model=D('journal');
                 $journal_data['sql']=$sql;
               
                    $journal_data['sql']=$sql;
                    $journal_data['user_id']=  cookie('admin')['id'];
                    $journal_data['operation']=$operation;
                    $journal_data['operation_url']=__SELF__;
                    $journal_data['operation_time']=strtotime(date('Y-m-d H:i:s',time()));  
                    $journal_data['shop_id']=cookie('shop_id');
                    $journal_data['operating_state']='添加';
                    $model->add($journal_data);
                 return $ret;
                  
                 //var_dump($sql);exit;
                 //记录 $sql....... 
                 //可以用文件记录，如果用数据库记录注意得用parent::add
                 //否则可能死循环
                 }
        //         UPDATE `cms_sku` SET `spec`='111,11,99999',`one`='111',`two`='11',`three`='99999' WHERE `id` = '250517
             public function save($data='',$options=array(),$replace=false){
            
                 $ret=parent::save($data, $options, $replace); 
                 $before_update_get_options_data=parent::_before_update_get_options_data();
              
                 if(!(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest")){
                    $sql = $this->_sql(); 
                    //查找出修改了什么  以文字表现出来
                  //  var_dump($sql);echo '<hr>';
                    $table_name= _cut('UPDATE ',"SET", $sql); 
                    
                    $str=str_replace(array('`',"'"),'',_cut('SET', 'WHERE', $sql));
                
                    $arr=  explode(',', $str);
                    $Narr=array();
                    foreach($arr as $v=>$k){
                        $Narr[trim(explode('=', $k)[0])]=trim(explode('=', $k)[1]);
                    };
                    foreach($Narr as $v=>$k){
                        if($k=='NULL'){
                            $Narr[$v]=null;
                        }
                    }

                   $str_sql='';
                   foreach($Narr as $v=>$k){
                       if($Narr[$v]!=$before_update_get_options_data[$v]){
                           $str_sql.= $table_name.'表的'.$v.'字段从'.$before_update_get_options_data[$v].'修改为'.$k.';';
                       };
                   }  
                   
                   if(!empty($before_update_get_options_data['id']) && $str_sql != ''){
                       $str_sql.="--(注)：修改字段id为".$before_update_get_options_data['id'];
                   }else if(empty($before_update_get_options_data['id']) && $str_sql != ''){
                        $str_sql.="--(注)：此表无id ,如要查询请呼叫管理员";  
                   }
                    if($str_sql == ''){$str_sql = '未做数据修改';}
                  
              
                    $model=D('journal');
                    $journal_data['sql']=$sql;
                    $journal_data['user_id']=cookie('admin')['id'];
                    $journal_data['operation']=$operation;
                    $journal_data['operation_url']=__SELF__;
                    $journal_data['operation_time']=strtotime(date('Y-m-d H:i:s',time()));  
                    $journal_data['shop_id']=cookie('shop_id');
                    $journal_data['operating_state']='修改';
                    $journal_data['detail_record']=$str_sql;
                    $model->add($journal_data);
                    
                 }
     
                 }    
               public function delete($options=array()){
                 $ret=parent::delete($options); 
                 $sql = $this->_sql(); 
                 $model=D('journal');
                    $journal_data['sql']=$sql;
                    $journal_data['user_id']=cookie('admin')['id'];
                    $journal_data['operation']=$operation;
                    $journal_data['operation_url']=__SELF__;
                    $journal_data['operation_time']=strtotime(date('Y-m-d H:i:s',time()));  
                    $journal_data['shop_id']=cookie('shop_id');
                    $journal_data['operating_state']='删除数据';
                    $model->add($journal_data);
                 return $ret;
                 //   exit;
                 
                 }     
             
  
  
                 
                 
    }