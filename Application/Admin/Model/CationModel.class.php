<?php
namespace Admin\Model;
use Think\Model;

class CationModel extends BaseModel{
  public function getTree(){
        $data=$this->select();
        
      //  return $data;
        
        return $this->Tree($data);
        
        
    }
    
    
    public function Tree($data,$parentid=0,$lave=0)
    {
        static $arr=array();
        foreach($data as $rows)
        {
            if($rows['parent_id']==$parentid){   
                
                $rows['lave']=$lave;
                
                $arr[]=$rows;
                
                $this->Tree($data,$rows['id'],$lave+1);  
            }
            
        }
           return $arr;   
        
        
    }
    
    
    public function getChildren($catId)
    {
        $data = $this->select();
        return $this->_getChildren($catId, $data);
    }

    



    public function _getChildren($parentId,$data)
    {
        static $_ret=array();
        
        foreach($data as $v)
        {
            if($v['parent_id']==$parentId)
            {   //把子分类的id挑出来
                $_ret[]=$v['id'];
                //再找出这个子分类下的所有分类id
                $this->_getChildren($v['id'], $data);
            }        
        }
       
        return $_ret;    
    }
       

    
}
