<?php
namespace Admin\Model;
use Think\Model;

class ProductsModel extends BaseModel{
    
    
    
        protected $_validate = array(
        array('title', 'require','产品名字不能为空'),
        array('sub_title', 'require','产品标题不能为空'),
        array('outer_id', 'require','产品编号不能为空'),
        array('summ', 'require','产品简介不能为空'),
        array('sku', 'require','产品sku不能为空'),
        array('cat_id', 'require','产品分类不能为空'),
       //array('','require','本店价格不能为空'),
        //array('brand_id','require','品牌不能为空'),
       // array('goods_price','currency','本店价格必须为货币格式'),      
        
       // array('cat_id','cat_id','最少填写一个分类',1,'callback'),
    );
    
    

        
         /******************************数据************************************/
           public function search($pagelist=30,$recOns=0)
    { 
               
          
        /**********  查询数据****模糊查询  *******************/
        // 1 模糊查询
            $keyword=I('get.keywords');
           
            if($keyword){  //判断是否有提交值
                $where['_string']="(outer_id like '%$keyword%') OR(title like '%$keyword%')"; // 将获取的值带入模糊查询where条件
               
                
            }
            /*   //2 价格区间
            $Pmin=I('get.Pmin');  //最小值
            $Pmax=I('get.Pmax');  //最大值
            if($Pmin && $Pmax)    //同时接收到数据
                $where['shop_price']=array('BETWEEN',array($Pmin,$Pmax)); //带入条件
            elseif($Pmin)        //只填写了最小值
                $where['shop_price']=array('EGT',$Pmin);                  //带入条件
            elseif($Pmin)       //只填写了最大值
                $where['shop_price']=array('ELT',$Pmax);                  //带入条件     
               
               */
               
               
 
               
       /***********************升序降序**************************************/
     /*      $kb='id';$desc_asc='asc';
            $ob=I('get.ob');
            if($ob=='price_desc')
            {   
                $kb='shop_price';
                $desc_asc='desc';
            }elseif($ob=='price_asc')
              {
                $kb='shop_price';
                $desc_asc='asc';
              };*/
             $cat_id=I('get.cat_id');    
             if($cat_id){
             $where['cat_id']=$cat_id;
             }
        /********  分页数据 *************/
         //import('ORG.Util.Page');
         //$where['type']=$_GET['type'];
         
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
        /**********  取出数据 ****************/
              $data=$this
                          ->alias('')           //取别名     
                          ->where($where)
                          ->limit($page->firstRow,$page->listRows)
                          ->select();
         
         return array(
             'pro_list' => $data,
             'showPage' =>$show
                     );
    } 
        

    /*****************************考勤需要的信息*** 现在没用  控制器中已经调用*******************************************************************************************************************/
        
        
        
        
   
    
    
    //我们要生成图片、在添加之前.
          public function _before_insert(&$data)
      {              
                        //sku   在商品添加之qian 我们给其分配sku属性。让其库存生成，以及价格
              //    $type_id=I('post.type_id');
     //     $model=D('attribute');
      //    $attr_id_arr=   $model->field('id')->select();
          //这是测试数据
         $pro_attr_arr=I('post.pro_attr');//获取其属性 这是生成sku的基本
          $len=  count($pro_attr_arr);//获取数组长度。
          $t_attr_pro;//重新定义一个数组 用来储存转化格式后的数据
          $a=0;
          foreach($pro_attr_arr as $v=>$k){
              
             $t_attr_pro[$a]=$k;
             $a++;
          }
          $ret = get_all($t_attr_pro,$len);//生成笛卡尔积
          $ret=  array_unique($ret);
       //   var_dump($ret);exit;
          foreach($ret as $v=>$k){
                $exp=explode(',',$k);
          };    
     //     echo '<pre>';
     //      var_dump($t_attr_pro);echo '<hr>';
    //      var_dump($ret);exit;
          
          
          
              
          $data['list_time']=date('Y:m:d');    
              
              
          if($_FILES['logo']['error']==0)
           {
                $upload = new \Think\Upload();// 实例化上传类  
                    $upload->maxSize   =     500*1024 ;// 设置附件上传大小  
                    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型   
                    $upload->rootPath  =     './Public/Uploads/';
                    $upload->savePath  =      'Products/'; // 设置附件上传目录    // 上传文件   
                    
                    $info   =   $upload->upload();  
                    
                    if(!$info) 
                   {// 上传错误提示错误信息      
                    $this->error=$upload->getError(); 
                    return false;
                    }else{// 上传成功   
                        
                            $image = new \Think\Image(); 
                            $image->open('./Public/Uploads/'.$info['logo']['savepath'].$info['logo']['savename']);// 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
                            //缩略图存放的路径和名字
                            $smlogo=$info['logo']['savepath'].'sm_'.$info['logo']['savename'];
                            
                            $image->thumb(150, 150)->save('./Public/Uploads/'.$smlogo);    
                            $data['logo']=$info['logo']['savepath'].$info['logo']['savename'];
                            $data['sm_logo']=$smlogo;
                    }          
                }
           }
          
    
    
    
    //修改前，要做的事情 很多。
    public function _before_update(&$data, $options) {
                                //sku   在商品修改之后 我们给其分配sku属性。让其库存生成，以及价格
              //    $type_id=I('post.type_id');
     //     $model=D('attribute');
      //    $attr_id_arr=   $model->field('id')->select();
          
          $pro_attr_arr=I('post.old_pro_attr');//获取其属性 这是生成sku的基本
          $len=  count($pro_attr_arr);//获取数组长度。
          $t_attr_pro=array();//重新定义一个数组 用来储存转化格式后的数据
          $a=0;
          foreach($pro_attr_arr as $v=>$k){
              $b=0;
              $b_arr=array();
              foreach($k as $g=>$h){
                  
                  $b_arr[$b]=$h;
                  $b++;
              } 
               $t_attr_pro[$a]=$b_arr;
             $a++;
          }
        $ret = get_all($t_attr_pro,$len);//生成笛卡尔积
          //$a_=   array_diff_assoc($ret); //去除重复***
       if (count($ret) != count(array_unique($ret))) {    
           $this->error='有重复值';return false;  
        }   
          
          // array_diff_assoc 两个数组是否有重复值
      //    var_dump($a_);exit;
      //    echo '<pre>';
    //      var_dump($ret);exit;
          //按笛卡尔积的顺序修改先
          $model=D('sku');
          $sku_id_arr=$model->field('id,spec')->where(array('pro_id'=>array('EQ',$options['where']['id'])))->order('id asc')->select();
      //    var_dump($sku_id_arr);exit;
          foreach($ret as $v=>$k){
              
              
          }
          
          
          
          //执行修改的业务逻辑  在修改的时候  SKU做修改
          foreach($sku_id_arr as $v=>$k){
              $exp=explode('$$',$ret[$v]);
              $model->where(array('id'=>array('EQ',$k['id'])))->save(array(
                  'spec'    =>$ret[$v],
                  'one'     =>$exp[0],
                  'two'     =>$exp[1],
                  'three'   =>$exp[2],   
              ));
          }
          
          
          
          
          
           
      //     var_dump($t_attr_pro);echo 't_attr_pro'.'<hr>';
   //         var_dump($pro_attr_arr);echo '<hr>'; //未修改下标
          //获取修改的时候添加的属性 我们让其生成笛卡尔积，然后与前面做对比。没有的就添加。有的就清空掉
          $x_pro_attr_arr=I('post.pro_attr');//获取点击+添加的属性 x=新  $pro_attr_arr 是旧属性
          
          
                    /****************************************************************************/
          //循环旧数组，新添加的就加入数组元素
          $new_attr_pro=$pro_attr_arr;
          foreach($pro_attr_arr as $v=>$k){
              foreach($x_pro_attr_arr as $k=>$l){
                  if($v==$k){
                  $new_attr_pro[$k]=array_merge($pro_attr_arr[$k],$x_pro_attr_arr[$v]) ;                 //合并数组
                  }
              }        
          };
          //$new_attr_pro  是全部获取的数组
                    $a=0;
          foreach($new_attr_pro as $v=>$k){
              $b=0;
              $n_arr=array();
              foreach($k as $g=>$h){
                  
                  $n_arr[$b]=$h;
                  $b++;
              } 
               $n_attr_pro[$a]=$n_arr;  //$n_attr_pro 是生成笛卡尔积的基本数据
             $a++;
          }
         
          
          //我们生成笛卡尔积的时候 多添加 了谁 就生成笛卡尔积。。最后合并
          //先获取维度  因为可能会修改多个维度。我们先
          $model=D('attribute');
           //先获取第三维度
         //旧属性和新属性合并
          
          //这是第三维度
          $three=array();
          $two=array();
          $one=array();
          foreach ($x_pro_attr_arr as $v=>$k){
              //获取维度先
              $dimension=$model->field('dimension')->where(array('id'=>array('EQ',$v)))->order('dimension asc')->find();    
              if($dimension['dimension']==3){
                $three_arr=$n_attr_pro;
                $three_arr[2]=$x_pro_attr_arr[$v];
                $three=get_all($three_arr,$len);   
                
            //    $three_one=$x_pro_attr_arr[$v];
            //    $two_arr=$t_attr_pro;
            //   $two_arr[2]=$three_one;
              }
              //第二维度
              if($dimension['dimension']==2){
                  $two_arr=$n_attr_pro;
                  $two_arr[1]=$x_pro_attr_arr[$v];
                  $two=get_all($two_arr,$len);     
              }         
              //第一维度
               if($dimension['dimension']==1){
                  $one_arr=$n_attr_pro;
                  $one_arr[0]=$x_pro_attr_arr[$v];
                  $one=get_all($one_arr,$len);    
              }              
       
          }
          
         //合并数组
          $merge_=array_unique(array_merge($three,$two,$one));
        //  var_dump($n_attr_pro);exit;
         foreach($sku_id_arr as $v=>$k){
             if(in_array($k['spec'],$merge_)){
                 $this->error='有重复数据';
                 return false ;
             }
             
         }
         

            //把生成的笛卡尔积插入sku属性表
          $model=D('sku');
          foreach($merge_ as $v=>$k){
              $exp=explode(',',$k);
              $model->add(array(
                  'pro_id'  =>$options['where']['id'],
                  'spec'    =>$k,   
                  'one'     =>$exp[0],
                  'two'     =>$exp[1],
                  'three'   =>$exp[2],
                 
              ));  
          //    $exp='';//清空数组
          }
          
   
          


        
     //这是添加属性*********************************************
       //  echo '<pre>';
      //  $pro_attr_=I('post.old_pro_attr');
      //   var_dump($pro_attr_);exit;
        
          $model=D('pro_attr');
          $pro_attr=I('post.pro_attr');
          $attr_price=I('post.attr_price');

            if($pro_attr){
            
            foreach($pro_attr as $attr_id=>$attr_value){
                foreach($attr_value as $v=>$k){
                    $model->add(array(
                        'pro_id' =>$options['where']['id'],
                        'attr_id'=>$attr_id,
                        'attr_value' =>$k,
                        'attr_price' =>  empty($attr_price[$attr_id][$v])?0.00:$attr_price[$attr_id][$v],
                        
                            ));           
                }         
            }
            
            
        }
   
        
        //如果是修改的
        
          $o_pro_attr=I('post.old_pro_attr');
          $o_attr_price=I('post.old_attr_price');
       //   var_dump($o_pro_attr); 
          
          
            if($o_pro_attr){
              // var_dump($o_pro_attr);exit;
            foreach($o_pro_attr as $attr_id=>$attr_value){
               
                foreach($attr_value as $k=>$v){
                  //  var_dump($attr_value);exit;
                    $model->where(array(
                        'id'=>array('EQ',$k)
                    ))->save(array(
                        'attr_value'    =>$v,
                        'attr_price'    =>empty($o_attr_price[$attr_id][$k]) ? 0.00 : $o_attr_price[$attr_id][$k], 
                    ));       
                }         
            }
            
            
        }
          
          
           
          //如果修改了分类   那就把当前分类的都删除了
          $type_id=$this->field('type_id')->find($options['where']['id']);
          if($type_id['type_id']!=$data['type_id'])
          {
              $model->where(array('goods_id'=>array('EQ',$options['where']['id'])))->delete();
            //  $paModel->where(array('goods_id'=>array('EQ',$options['where']['id']))->delete();
              
          }
          
          
          
          
          
          
          
          if($_FILES['logo']['error']==0)
           {        $data['update_time']=date('Y :m:d');   
                    $upload = new \Think\Upload();// 实例化上传类  
                    $upload->maxSize   =     500*1024 ;// 设置附件上传大小  
                    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型   
                    $upload->rootPath  =     './Public/Uploads/';
                    $upload->savePath  =      'Products/'; // 设置附件上传目录    // 上传文件   
                    
                    $info   =   $upload->upload();  
                    
                    if(!$info) 
                   {// 上传错误提示错误信息      
                    $this->error=$upload->getError(); 
                    return false;
                    }else{// 上传成功   
                        
                            $image = new \Think\Image(); 
                            $image->open('./Public/Uploads/'.$info['logo']['savepath'].$info['logo']['savename']);// 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
                            //缩略图存放的路径和名字
                            $smlogo=$info['logo']['savepath'].'sm_'.$info['logo']['savename'];
                            
                            $image->thumb(150, 150)->save('./Public/Uploads/'.$smlogo);   
                            $config=C('IMAGE_CONFIG');
                            $logo=  $this->field('logo,sm_logo')->where($options['id'])->find();
                            
                
                 unlink($config['rootPath'].$logo['logo']);
                 unlink($config['rootPath'].$logo['sm_logo']);
                            
                            $data['logo']=$info['logo']['savepath'].$info['logo']['savename'];
                            $data['sm_logo']=$smlogo;
                    }          
                }
    
    }
    
    //商品删除前
    public function _before_delete($options) {
        
       // 删除产品的时候 我们判断一下 是否有库存。有则不让其删除
       $model=D('sku');
      $where['pro_id']=$options['where']['id'];
        $sku_list=$model
                ->field('id')
                ->where($where)
                ->select();     //查询出SKU的id
        //库存中有skuid  我们把库存中skuid的都查询出来。查看是否有值
        $model=D('stock');
        foreach($sku_list as $v=>$k){
            $where['sku_id']=$k['id'];
            $stock=$model->field('stock_num')->where($where)->find();
            if($stock['stock_num']!=0){
                $this->error='还有库存';
                return false;
            }  
        }
        //判断完毕
        
        
        
       
       
        
        
        //删除sku
         $model=D('sku');                  
         $where['pro_id']=$options['where']['id'];
         //查出sku的id
         $sku_list=$model->field('id')->where($where)->select();
         $model->where($where)->delete();  
         $model=D('stock');
         foreach($sku_list as $v=>$k){
             $where['sku_id']=$k['id'];
             $model->where($where)->delete();//删除sku对应的库存   
         }
         
         
           
        
        
        
        $id=I('get.id');        
        $where['id']=$id;
                            $config=C('IMAGE_CONFIG');
                            $logo=  $this->field('logo,sm_logo')->where($where)->find();
                            
                
                           unlink($config['rootPath'].$logo['logo']);
                           unlink($config['rootPath'].$logo['sm_logo']);
        //删除商品删除属性
        $paModel = D('pro_attr');
        $paModel->where(array(
            'pro_id'=>array('eq',$options['where']['id'])
            ))->delete();
                    
             
                           
    }
    
    
   
    //商品添加之后*********************************************************************
    public function _after_insert($data, $options) {
         //sku   在商品添加之后 我们给其分配sku属性。让其sku生成，以及//价格
          $pro_attr_arr=I('post.pro_attr');//获取其属性 这是生成sku的基本
          $len=  count($pro_attr_arr);//获取数组长度。
          $t_attr_pro;//重新定义一个数组 用来储存转化格式后的数据
          $a=0;
          foreach($pro_attr_arr as $v=>$k){
              
             $t_attr_pro[$a]=$k;
             $a++;
          }
          $ret = get_all($t_attr_pro,$len);//生成笛卡尔积
          //把生成的笛卡尔积插入sku属性表
   //       $ret=  array_unique($ret);
          $model=D('sku');
          foreach($ret as $v=>$k){
              $exp=explode('$$',$k);
              $model->add(array(
                  'pro_id'  =>$data['id'],
                  'spec'    =>$k,   
                  'one'     =>$exp[0],
                  'two'     =>$exp[1],
                  'three'   =>$exp[2],
                 
              ));  
          //    $exp='';//清空数组
          }
         // var_dump($exp);exit;
          
          
        
         //在商品添加成功之后。我们把商品属性存进商品属性与商品的中间表
        $pro_attr=I('post.pro_attr');
        $attr_price=I('post.attr_price');
        
        if($pro_attr){
            $model=D('pro_attr');
            foreach($pro_attr as $attr_id=>$attr_value){
                foreach($attr_value as $v=>$k){
                    $model->add(array(
                        'pro_id' =>$data['id'],
                        'attr_id'=>$attr_id,
                        'attr_value' =>$k,
                        'attr_price' =>  empty($attr_price[$attr_id][$v])?0.00:$attr_price[$attr_id][$v],
                            ));  
                }        
            }      
        }
        
        //sku   在商品添加之后 我们给其分配sku属性。让其库存生成，以及价格
              //    $type_id=I('post.type_id');
     //     $model=D('attribute');
      //    $attr_id_arr=   $model->field('id')->select();
 /*         $pro_attr_arr=I('post.pro_attr');//获取其属性 这是生成sku的基本
          $len=  count($pro_attr_arr);//获取数组长度。
          $t_attr_pro;//重新定义一个数组 用来储存转化格式后的数据
          $a=0;
          foreach($pro_attr_arr as $v=>$k){
             $t_attr_pro[$a]=$k;
             $a++;
          }
          $ret = get_all($t_attr_pro,$len);//生成笛卡尔积
          
          
          */
        
        
        
        
   
        
    }
    
    
    
    //在修改之前，把商品属性的信息先修改

    
    
    
    
    
}