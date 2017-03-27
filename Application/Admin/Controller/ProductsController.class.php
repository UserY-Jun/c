<?php
namespace Admin\Controller;
use Think\Controller;


class ProductsController extends BaseController{
    
    public function getLeftArr(){
        
        $LeftArr=array(
                '0'=>array(
                    '0Name'=>'产品列表',
                    '0Url' =>U('ProductsList'),
                ),
                '1'=>array(
                    '1Name'=>'添加新品',
                    '1Url'=>U('ProductsAdd'),
                ),
                '2'=>array(
                    '2Name'=>'获取代码',    
                ),
                '3'=>array(
                    '3Name'=>'淘宝图片入库',
                ),
                '4'=>array(
                  '4Name'  =>'分类管理', 
                  '4Url'  =>U('CationList'),
                ),
                '5' =>array(
                    '5Name' =>'风格管理',
                    '5Url' =>U('StyleList'),
                ),
                '6' =>array(
                    '6Name' =>'类型管理',
                    '6Url' =>U('TypeList'),
                ),
                        
             );

        return $LeftArr;
        
    }


    //产品的显示
    public function ProductsList(){

        //我们先获取显示的资源
        $model=D('Products');
        $data=$model->search();
       
        //显示分类资源，让其搜索
        $model=D('cation');
        $cat_list=$model->field('id,cat_name')->select();

        $LeftArr=  $this->getLeftArr();
        $this->assign(array(
            
             //main基本信息
            //左边
          'left'=>$LeftArr,
            //右边
          'right'=>array(
                 'One'=>array(
                    'OneName'=>'产品列表',
                    'OneUrl' =>U('ProductsList'),
                    'Color'  =>'employee_menu_curr employee_menu',   //curr 显示颜色  type 不显示
                ),
                'Two'=>array(
                    'TwoName'=>'添加新品',
                    'TwoUrl'=>U('ProductsAdd'),
                    'Color' =>'employee_menu_type employee_menu',
                ),      
            ),
            
            //回收功能  没有可以不填
            'recname'=>'回收站',
            'recurl'=>'reclist',
            
            'pro_list'  =>$data['pro_list'],
            'showPage'  =>$data['showPage'],
            
            //分类
            'cat_list'  =>$cat_list,
        ));
        
        
        
        $this->display();
    }
    
    //产品的增加
    public function ProductsAdd(){
        //获取风格的数据  让其在添加时候显示 以便添加
        $model=D('Style');
        $stylelist=$model->select();
        
        //获取分类的数据 作用同上
        $model=D('Cation');
        $catlist=$model->select(); 
        
        //获取店铺的数据 同上
        $model=D('shop_group');
        $grouplist=$model->select();
        

        if(IS_POST){
            //打印出结构数据
            //echo '<pre>';
            //$a=$_POST;
           // var_dump($a);exit;
            
            $model=D('Products');
            if($model->create(I('post.'),1)){
                if($model->add()){
                    $this->success('添加成功', U('ProductsList'));exit;
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
                    'OneName'=>'产品列表',
                    'OneUrl' =>U('ProductsList'),
                    'Color'  =>'employee_menu_type employee_menu',   //curr 显示颜色  type 不显示
                ),
                'Two'=>array(
                    'TwoName'=>'添加新品',
                    'TwoUrl'=>U('ProductsAdd'),
                    'Color' =>'employee_menu_curr employee_menu',
                ),      
            ),
            
            //回收功能  没有可以不填
            'recname'=>'',
            'recurl'=>'reclist',
            
            //风格的数据
            'stylelist' =>$stylelist,
            //类别的数据
            'catlist'   =>$catlist,
            //店铺的数据
            'grouplist'=>$grouplist,
            
        ));
        
   
        
        $this->display();
    }
    
    //产品的修改
    public function ProductsEdit($id){
        //先查出这个产品的所有属性********** .
        $model=D('pro_attr');
        //$where['pro_id']=$id;
        $paData=$model->alias('a')
                ->field('a.*,b.attr_name,b.attr_type,b.attr_option_values,dimension')
                ->join('LEFT JOIN __ATTRIBUTE__ b ON a.attr_id=b.id')
                ->where(array('a.pro_id'=>array('EQ',$id)))
                ->order('b.dimension asc')
                ->select();
      
        
        
        //获取风格的数据  让其在添加时候显示 以便修改
        $model=D('Style');
        $stylelist=$model->select();
        
        //获取分类的数据 作用同上
        $model=D('Cation');
        $catlist=$model->select();
        
        //获取店铺的数据 同上
        $model=D('shop_group');
        $grouplist=$model->select();
        
        //获取这个宝贝的信息
        $model=D('Products');
        $where['id']=$id;
        $pro_info=$model->where($where)->find();
        
        
        if(IS_POST){
            if($model->create(I('post.'),2)){
                if($model->save()!==false){
                    $this->success('修改成功', U('ProductsList'));exit;
                } 
            }
            
            $error=$model->getError();
            $this->error($error);
        }
        
        
        

        $LeftArr=  $this->getLeftArr();
        $this->assign(array(
            'paData'    =>$paData,//此产品的属性数据
            
            
             //main基本信息
            //左边
          'left'=>$LeftArr,
            //右边
          'right'=>array(
                 'One'=>array(
                    'OneName'=>'产品列表',
                    'OneUrl' =>U('ProductsList'),
                    'Color'  =>'employee_menu_type employee_menu',   //curr 显示颜色  type 不显示
                ),
                'Two'=>array(
                    'TwoName'=>'修改产品',
                    'TwoUrl'=>U('ProductsAdd'),
                    'Color' =>'employee_menu_curr employee_menu',
                ),      
            ),
            
            //回收功能  没有可以不填
            'recname'=>'',
            'recurl'=>'reclist',
            
            //风格的数据
            'stylelist' =>$stylelist,
            //类别的数据
            'catlist'   =>$catlist,
            //店铺的数据
            'grouplist'=>$grouplist,
            
            //本次修改的数据  产品信息
            'pro_info'=>$pro_info,
            
        ));
        
   
        
        $this->display();
        

    }
    
    //产品的删除
    public function ProductsDel($id){
        $model=D('Products');
        $where['id']=$id;
        if($model->where($where)->delete()){
            $this->success('删除成功', U('ProductsList'));exit;  
        }else{
            $error=$model->getError();
            $this->error($error);
        }
        
      
    }    
    
    
    /*******************产品分类的管理**************************************/
    
    public function CationList(){
            
        $model=D('cation');
        $data=$model->getTree();
        
        
        
        
        
        $LeftArr=  $this->getLeftArr();
        $this->assign(array(
            
             //main基本信息
            //左边
          'left'=>$LeftArr,
            //右边
          'right'=>array(
                 'One'=>array(
                    'OneName'=>'分类列表',
                    'OneUrl' =>U('CationList'),
                    'Color'  =>'employee_menu_curr employee_menu',   //curr 显示颜色  type 不显示
                ),
                'Two'=>array(
                    'TwoName'=>'添加分类',
                    'TwoUrl'=>U('CationAdd'),
                    'Color' =>'employee_menu_type employee_menu',
                ),      
            ),
            
            //回收功能  没有可以不填
            'recname'=>'',
            'recurl'=>'reclist',
            
             
            'catlist'=>$data,
 
             
             ));       
        
        
        
        $this->display();
        
    }
    
    //分类的添加
        public function CationAdd(){
            
        $model=D('cation');
        $data=$model->getTree();
        
        if(IS_POST){
            if($model->create(I('post.'),1)){
                if($model->add()){
                    $this->success('添加成功',U('CationList'));exit;
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
                    'OneName'=>'分类列表',
                    'OneUrl' =>U('CationList'),
                    'Color'  =>'employee_menu_type employee_menu',   //curr 显示颜色  type 不显示
                ),
                'Two'=>array(
                    'TwoName'=>'添加分类',
                    'TwoUrl'=>U('CationAdd'),
                    'Color' =>'employee_menu_curr employee_menu',
                ),      
            ),
            
            //回收功能  没有可以不填
            'recname'=>'',
            'recurl'=>'reclist',
            
             'catlist'=>$data,
             
             
             
        ));       
        
        
        
        $this->display();
        
    }
    
    

    
    //风格***************************************************************************************
    
    public function StyleList(){
        //获取风格
        $model=D('Style');
        $data=$model->search();

        $LeftArr=  $this->getLeftArr();
        $this->assign(array(
            
             //main基本信息
            //左边
          'left'=>$LeftArr,
            //右边
          'right'=>array(
                 'One'=>array(
                    'OneName'=>'风格列表',
                    'OneUrl' =>U('StyleList'),
                    'Color'  =>'employee_menu_curr employee_menu',   //curr 显示颜色  type 不显示
                ),
                'Two'=>array(
                    'TwoName'=>'添加风格',
                    'TwoUrl'=>U('StyleAdd'),
                    'Color' =>'employee_menu_type employee_menu',
                ),      
            ),
            
            //回收功能  没有可以不填
            'recname'=>'',
            'recurl'=>'reclist',
       
            
            //模板页面显示
            'stylelist'=>$data['stylelist'],
            'showPage' =>$data['showPage'],
            
        ));       
   
        $this->display();
  
    }
    
    
    public function  StyleAdd(){
        
        //实现风格的添加
        $model=D('Style');
        if(IS_POST){
            if($model->create(I('post.'),1)){
                if($model->add()){
                    $this->success('风格添加成功', U('StyleList'));exit;
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
                    'OneName'=>'风格列表',
                    'OneUrl' =>U('StyleList'),
                    'Color' =>'employee_menu_type employee_menu',  //curr 显示颜色  type 不显示
                ),
                'Two'=>array(
                    'TwoName'=>'添加风格',
                    'TwoUrl'=>U('StyleAdd'),
                    'Color'  =>'employee_menu_curr employee_menu',
                ),      
            ),
            
            //回收功能  没有可以不填
            'recname'=>'',
            'recurl'=>'reclist',
        ));       
        $this->display();
    }
    
    //风格的删除
    public function StyleDel($id){
        $model=D('Style');
        $where['id']=$id;
        if($model->where($where)->delete()){
            $this->success('删除成功', U('StyleList'));exit;
        }else{
            $this->error('删除失败',U('StyleList'));
        }
     
    }
    
    //风格的修改
        public function StyleEdit($id){
          $model=D('Style');
          $where['id']=$id;
          $styleinfo=$model->where($where)->find(); 
           
          if(IS_POST){
              if($model->create(I('post.'),2)){
                  if($model->where($where)->save()!==false){
                      $this->success('修改成功',U('StyleList'));exit;
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
                    'OneName'=>'风格列表',
                    'OneUrl' =>U('StyleList'),
                    'Color' =>'employee_menu_type employee_menu',  //curr 显示颜色  type 不显示
                ),
                'Two'=>array(
                    'TwoName'=>'修改风格',
                    'TwoUrl'=>U('StyleEdit'),
                    'Color'  =>'employee_menu_curr employee_menu',
                ),      
            ),
            
            //回收功能  没有可以不填
            'recname'=>'',
            'recurl'=>'reclist',
       
            'styleinfo'=>$typeinfo,
            
        ));       
  
        $this->display();
            
    }
    
    
    /******************************************************************************************************/
    //*******************类型****************************************类商城start***************************/
    /******************************************************************************************************/
     public function TypeList(){
        //获取类型
        $model=D('Type');
        $data=$model->search();
       

        $LeftArr=  $this->getLeftArr();
        $this->assign(array(
            
            //main基本信息
            //左边
          'left'=>$LeftArr,
            //右边
          'right'=>array(
                 'One'=>array(
                    'OneName'=>'类型列表',
                    'OneUrl' =>U('TypeList'),
                    'Color'  =>'employee_menu_curr employee_menu',   //curr 显示颜色  type 不显示
                ),
                'Two'=>array(
                    'TwoName'=>'添加类型',
                    'TwoUrl'=>U('TypeAdd'),
                    'Color' =>'employee_menu_type employee_menu',
                ),      
            ),
            
            //回收功能  没有可以不填
            'recname'=>'',
            'recurl'=>'reclist',
  
            //模板页面显示
            'typelist'=>$data['typelist'],
            'showPage' =>$data['showPage'],
            
        ));       
  
        $this->display();
     
    }
    
    public function  TypeAdd(){
        //实现类型的添加
        $model=D('Type');
        if(IS_POST){
            if($model->create(I('post.'),1)){
                if($model->add()){
                    $this->success('类型添加成功', U('TypeList'));exit;
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
                    'OneName'=>'类型列表',
                    'OneUrl' =>U('TypeList'),
                    'Color' =>'employee_menu_type employee_menu',  //curr 显示颜色  type 不显示
                ),
                'Two'=>array(
                    'TwoName'=>'添加类型',
                    'TwoUrl'=>U('TypeAdd'),
                    'Color'  =>'employee_menu_curr employee_menu',
                ),      
            ),
            
            //回收功能  没有可以不填
            'recname'=>'',
            'recurl'=>'reclist',
        ));       
        $this->display();
        }
    
        
     //类型的删除
    public function TypeDel($id){
        $model=D('Type');
        $where['id']=$id;
        if($model->where($where)->delete()){
            $this->success('删除成功', U('TypeList'));exit;
        }else{
            $this->error('删除失败',U('TypeList'));
        }
     
    }
    
    //类型的修改
        public function TypeEdit($id){
          $model=D('Type');
          $where['id']=$id;
          $typeinfo=$model->where($where)->find(); 
           
          if(IS_POST){
              if($model->create(I('post.'),2)){
                  if($model->where($where)->save()!==false){
                      $this->success('修改成功',U('TypeList'));exit;
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
                    'OneName'=>'类型列表',
                    'OneUrl' =>U('TypeList'),
                    'Color' =>'employee_menu_type employee_menu',  //curr 显示颜色  type 不显示
                ),
                'Two'=>array(
                    'TwoName'=>'修改类型',
                    'TwoUrl'=>U('TypeEdit'),
                    'Color'  =>'employee_menu_curr employee_menu',
                ),      
            ),
            
            //回收功能  没有可以不填
            'recname'=>'',
            'recurl'=>'reclist',
       
            'typeinfo'=>$typeinfo,   
        ));       
  
        $this->display();
            
    }       
        

    
    /************************************************************************/
      /**********************AJAX********************************************************/ 
    public function ajaxGetAttr() {
        //获取类型id
        
        $typeId = I('get.type_id');
        
        $model = M('Attribute');
        $data = $model->where(array(
            'type_id'=>array('eq',$typeId)
        ))->select();

        echo json_encode($data);
    }
    
    
    //删除商品的属性   ajax
    public function ajaxDelProAttr() {
        
        $paId = I('get.paid');
        if(empty($paId)){echo json_encode(null);}
        
        
        $model = M('pro_attr');
        //先根据pro_attr id 找出 表attribute里面的维度层级  
        $attr_arr=$model
                ->field('attr_id,pro_id,attr_value')
                ->where(array('id'=>array('EQ',$paId)))
                ->find(); 
        $pro_id=$attr_arr['pro_id'];
        $attr_value=$attr_arr['attr_value'];
        //然后再找出维度
        $model=M('attribute');
       
        $dimension_arr=$model
                ->field('dimension')
                ->where(array('id'=>array('EQ',$attr_arr['attr_id'])))
                ->find();
        $dimension=$dimension_arr['dimension'];
        
        //找库存，。没库存的可以删除，顺带 sku 属性，库存  都删了
        //由pro_id 找出其带的sku属性id多少  再由id查找库存 看是否有库存
             // 删除产品的时候 我们判断一下 是否有库存。有则不让其删除
       $model=D('sku');
       //条件
      $where['pro_id']=$pro_id;   //$where下面还要用。所以是唯一的where  不允许更改
      //维度判断  筛选条件
           switch ($dimension)
      {
      case 1:
        $where['one']=$attr_value;
        break;  
      case 2:
        $where['two']=$attr_value;
        break;
      case 3:
        $where['three']=$attr_value;
        break;    
      default:return false;
      }
      //这是查出sku此产品的此维度的id
        $sku_list=$model
                ->field('id')
                ->where($where)
                ->select();     //查询出SKU的id
        //库存中有skuid  我们把库存中skuid的都查询出来。查看是否有值
       
       // var_dump($dimension);exit;
        $model=D('stock');
        foreach($sku_list as $v=>$k){
           // $where['sku_id']=$k['id'];
            $stock=$model->field('stock_num')->where(array('sku_id'=>array('EQ',$k['id'])))->find();
            if($stock['stock_num']!=0){
                 echo json_encode('该属性的产品还有库存');
                return false;
            }
            
        }
        //判断完毕
        
        //如果没有库存了 把他删掉***************************************************************
                //删除sku
         $model=D('sku');                  
         //查出sku的id
         $sku_list=$model->field('id')->where($where)->select();
         $model->where($where)->delete();  
         $model=D('stock');
         foreach($sku_list as $v=>$k){
             $model->where(array('sku_id'=>array('EQ',$k['id'])))->delete();//删除sku对应的库存   
         }
        
 
            $model=D('pro_attr');
          $model->delete($paId);
        echo json_encode(null); //说明删除成功
    }
     
    
    //MD5反加密解密  暂未使用
function authcode($string=123, $operation = 'DECODE', $key ='123', $expiry = 0) {  

 
    // 动态密匙长度，相同的明文会生成不同密文就是依靠动态密匙  
    $ckey_length = 4;  
      
    // 密匙  
    $key = md5($key ? $key : $GLOBALS['discuz_auth_key']);  
      
    // 密匙a会参与加解密  
    $keya = md5(substr($key, 0, 16));  
    // 密匙b会用来做数据完整性验证  
    $keyb = md5(substr($key, 16, 16));  
    // 密匙c用于变化生成的密文  
    $keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length):
substr(md5(microtime()), -$ckey_length)) : '';  
    // 参与运算的密匙  
    $cryptkey = $keya.md5($keya.$keyc);  
    $key_length = strlen($cryptkey);  
    // 明文，前10位用来保存时间戳，解密时验证数据有效性，10到26位用来保存$keyb(密匙b)，
//解密时会通过这个密匙验证数据完整性  
    // 如果是解码的话，会从第$ckey_length位开始，因为密文前$ckey_length位保存 动态密匙，以保证解密正确  
    $string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : 
sprintf('%010d', $expiry ? $expiry + time() : 0).substr(md5($string.$keyb), 0, 16).$string;  
    $string_length = strlen($string);  
    $result = '';  
    $box = range(0, 255);  
    $rndkey = array();  
    // 产生密匙簿  
    for($i = 0; $i <= 255; $i++) {  
        $rndkey[$i] = ord($cryptkey[$i % $key_length]);  
    }  
    // 用固定的算法，打乱密匙簿，增加随机性，好像很复杂，实际上对并不会增加密文的强度  
    for($j = $i = 0; $i < 256; $i++) {  
        $j = ($j + $box[$i] + $rndkey[$i]) % 256;  
        $tmp = $box[$i];  
        $box[$i] = $box[$j];  
        $box[$j] = $tmp;  
    }  
    // 核心加解密部分  
    for($a = $j = $i = 0; $i < $string_length; $i++) {  
        $a = ($a + 1) % 256;  
        $j = ($j + $box[$a]) % 256;  
        $tmp = $box[$a];  
        $box[$a] = $box[$j];  
        $box[$j] = $tmp;  
        // 从密匙簿得出密匙进行异或，再转成字符  
        $result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));  
    }  
    if($operation == 'DECODE') { 
        // 验证数据有效性，请看未加密明文的格式  
        if((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && 
substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16)) {  
            return substr($result, 26);  
        } else {  
            return '';  
        }  
    } else {  
        // 把动态密匙保存在密文里，这也是为什么同样的明文，生产不同密文后能解密的原因  
        // 因为加密后的密文可能是一些特殊字符，复制过程可能会丢失，所以用base64编码  
        return $keyc.str_replace('=', '', base64_encode($result));  
    }  
} 


}