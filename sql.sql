Source Database       : sq_jingyi

Target Server Type    : MYSQL
Target Server Version : 50527
File Encoding         : 65001

Date: 2016-11-15 17:23:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cms_attribute
-- ----------------------------
DROP TABLE IF EXISTS `cms_attribute`;
CREATE TABLE `cms_attribute` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `attr_name` varchar(15) NOT NULL COMMENT '属性名称',
  `attr_type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '属性类型：0代表唯一，1有可选属性',
  `attr_option_values` varchar(300) NOT NULL DEFAULT '' COMMENT '属性值，多个就用，分开',
  `type_id` mediumint(8) unsigned NOT NULL COMMENT '类型id',
  PRIMARY KEY (`id`),
  KEY `type_id` (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COMMENT='属性';

-- ----------------------------
-- Records of cms_attribute
-- ----------------------------
INSERT INTO `cms_attribute` VALUES ('18', '尺寸', '1', '', '8');
INSERT INTO `cms_attribute` VALUES ('19', '颜色', '1', '', '8');

-- ----------------------------
-- Table structure for cms_cation
-- ----------------------------
DROP TABLE IF EXISTS `cms_cation`;
CREATE TABLE `cms_cation` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `cat_name` varchar(40) NOT NULL COMMENT '分类名称',
  `parent_id` int(11) NOT NULL COMMENT '父级id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='考勤表';

-- ----------------------------
-- Records of cms_cation
-- ----------------------------
INSERT INTO `cms_cation` VALUES ('1', '待分类', '0');
INSERT INTO `cms_cation` VALUES ('2', '压纹壁纸', '0');
INSERT INTO `cms_cation` VALUES ('3', '无纺壁纸', '0');
INSERT INTO `cms_cation` VALUES ('4', '无纺精压', '0');
INSERT INTO `cms_cation` VALUES ('5', '即时贴', '0');
INSERT INTO `cms_cation` VALUES ('6', '转移膜', '0');

-- ----------------------------
-- Table structure for cms_clock
-- ----------------------------
DROP TABLE IF EXISTS `cms_clock`;
CREATE TABLE `cms_clock` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `user_id` int(11) unsigned NOT NULL COMMENT '用户id',
  `year` int(11) unsigned NOT NULL COMMENT '年',
  `month` int(11) unsigned NOT NULL COMMENT '月',
  `day` int(11) unsigned NOT NULL COMMENT '日',
  `s_time` time NOT NULL COMMENT '开始登陆时间',
  `e_time` time DEFAULT NULL COMMENT '最后登陆时间',
  `ip` int(10) unsigned NOT NULL COMMENT '登陆ip',
  `s_status` tinyint(3) unsigned DEFAULT NULL COMMENT '手动更改状态',
  `status` tinyint(2) unsigned zerofill NOT NULL DEFAULT '01' COMMENT '''考勤状态''',
  `remark` varchar(255) CHARACTER SET armscii8 DEFAULT NULL COMMENT '''备注信息''',
  PRIMARY KEY (`id`),
  KEY `idx_user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='考勤表';

-- ----------------------------
-- Records of cms_clock
-- ----------------------------
INSERT INTO `cms_clock` VALUES ('1', '1', '2016', '11', '2', '11:04:35', '14:53:30', '2130706433', null, '01', null);
INSERT INTO `cms_clock` VALUES ('2', '1', '2016', '11', '3', '14:46:05', '14:46:07', '2130706433', null, '01', null);
INSERT INTO `cms_clock` VALUES ('3', '6', '2016', '11', '1', '14:53:38', '17:07:07', '2130706433', null, '01', null);
INSERT INTO `cms_clock` VALUES ('4', '1', '2016', '11', '4', '08:12:42', '22:58:43', '2130706433', null, '01', null);
INSERT INTO `cms_clock` VALUES ('5', '6', '2016', '11', '5', '08:26:55', '08:26:58', '2130706433', null, '01', null);
INSERT INTO `cms_clock` VALUES ('6', '7', '2016', '11', '5', '08:27:24', '14:34:16', '2130706433', null, '01', null);
INSERT INTO `cms_clock` VALUES ('7', '1', '2016', '11', '5', '08:38:21', '16:44:34', '2130706433', null, '01', null);
INSERT INTO `cms_clock` VALUES ('8', '1', '2016', '11', '7', '08:29:23', '21:50:47', '2130706433', null, '01', null);
INSERT INTO `cms_clock` VALUES ('9', '1', '2016', '11', '8', '08:27:47', '14:37:40', '2130706433', null, '01', null);
INSERT INTO `cms_clock` VALUES ('10', '1', '2016', '11', '9', '08:38:18', '18:00:11', '2130706433', null, '01', null);
INSERT INTO `cms_clock` VALUES ('11', '1', '2016', '11', '10', '08:44:40', '12:16:54', '2130706433', null, '01', null);
INSERT INTO `cms_clock` VALUES ('12', '1', '2016', '11', '11', '08:12:17', '20:23:34', '2130706433', null, '01', null);
INSERT INTO `cms_clock` VALUES ('13', '1', '2016', '11', '12', '08:33:15', '15:39:30', '2130706433', null, '01', null);
INSERT INTO `cms_clock` VALUES ('14', '1', '2016', '11', '14', '08:34:45', '18:04:18', '2130706433', null, '01', null);
INSERT INTO `cms_clock` VALUES ('15', '1', '2016', '11', '15', '08:32:40', '17:16:00', '2130706433', null, '01', null);

-- ----------------------------
-- Table structure for cms_dept
-- ----------------------------
DROP TABLE IF EXISTS `cms_dept`;
CREATE TABLE `cms_dept` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `dept_name` varchar(20) NOT NULL COMMENT '部门名字',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='工作部门';

-- ----------------------------
-- Records of cms_dept
-- ----------------------------
INSERT INTO `cms_dept` VALUES ('1', '其他部门');
INSERT INTO `cms_dept` VALUES ('2', '电子商务');
INSERT INTO `cms_dept` VALUES ('3', '行政部');
INSERT INTO `cms_dept` VALUES ('4', '仓库车间');
INSERT INTO `cms_dept` VALUES ('5', '财务部');

-- ----------------------------
-- Table structure for cms_privilege
-- ----------------------------
DROP TABLE IF EXISTS `cms_privilege`;
CREATE TABLE `cms_privilege` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `pri_name` varchar(20) NOT NULL COMMENT '权限名称',
  `module_name` varchar(60) NOT NULL COMMENT '对应模块名称',
  `controller_name` varchar(60) NOT NULL COMMENT '对应控制器名称',
  `action_name` varchar(60) NOT NULL COMMENT '对应方法名称',
  `parent_id` mediumint(9) NOT NULL COMMENT '父级id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='权限表';

-- ----------------------------
-- Records of cms_privilege
-- ----------------------------
INSERT INTO `cms_privilege` VALUES ('1', '用户管理', 'Admin', 'Admin', 'AdminList', '0');
INSERT INTO `cms_privilege` VALUES ('2', '添加用户', 'Admin', 'Admin', 'AdminAdd', '1');
INSERT INTO `cms_privilege` VALUES ('3', '修改用户', 'Admin', 'Admin', 'AdminEdit', '1');
INSERT INTO `cms_privilege` VALUES ('4', '删除用户', 'Admin', 'Admin', 'Admindel', '1');
INSERT INTO `cms_privilege` VALUES ('5', '宝贝管理', 'Admin', 'Products', 'ProductsList', '0');
INSERT INTO `cms_privilege` VALUES ('6', '添加宝贝', 'Admin', 'Products', 'ProductsAdd', '5');
INSERT INTO `cms_privilege` VALUES ('7', '宝贝修改', 'Admin', 'Products', 'productsEdit', '5');
INSERT INTO `cms_privilege` VALUES ('8', '宝贝删除', 'Admin', 'Products', 'productsDel', '5');

-- ----------------------------
-- Table structure for cms_products
-- ----------------------------
DROP TABLE IF EXISTS `cms_products`;
CREATE TABLE `cms_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '产品id',
  `title` varchar(60) NOT NULL COMMENT '产品名称--短标题',
  `logo` varchar(60) DEFAULT NULL COMMENT 'logo地址',
  `outer_id` varchar(40) DEFAULT NULL COMMENT '产品编号',
  `sub_title` varchar(500) DEFAULT NULL COMMENT '推广标题',
  `his_pro_tit` varchar(500) DEFAULT NULL COMMENT '历史推广标题',
  `summ` varchar(100) DEFAULT NULL COMMENT '产品简介',
  `selling_point` varchar(100) DEFAULT NULL COMMENT '宝贝卖点',
  `cat_id` int(10) unsigned NOT NULL COMMENT '产品分类id',
  `stock` int(10) unsigned DEFAULT NULL COMMENT '总库存',
  `list_time` varchar(20) DEFAULT NULL COMMENT '添加时间',
  `clubs_id` int(10) unsigned DEFAULT NULL COMMENT '仓储编号',
  `style_id` int(10) unsigned DEFAULT NULL COMMENT '图案风格',
  `sm_logo` varchar(255) DEFAULT NULL COMMENT '''缩略图''',
  `update_time` varchar(15) DEFAULT NULL COMMENT '''最后更新时间''',
  `type_id` mediumint(8) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COMMENT='产品表';

-- ----------------------------
-- Records of cms_products
-- ----------------------------
INSERT INTO `cms_products` VALUES ('7', '腰线贴', 'Products/2016-11-09/58228fe1564eb.jpg', '4222', '1', null, '1', '1', '2', null, '2016:11:09', null, '6', 'Products/2016-11-09/sm_58228fe1564eb.jpg', '2016:11:09', '8');
INSERT INTO `cms_products` VALUES ('8', '印花贴', 'Products/2016-11-09/58228ffc0b34a.jpg', '4297', '2', null, '2', '2', '2', null, '2016:11:09', null, '6', 'Products/2016-11-09/sm_58228ffc0b34a.jpg', '2016:11:09', '8');
INSERT INTO `cms_products` VALUES ('9', '静电膜', 'Products/2016-11-09/5822901659a53.jpg', '4299', '3', null, '3', '3', '3', null, '2016:11:09', null, '6', 'Products/2016-11-09/sm_5822901659a53.jpg', '2016:11:09', '8');
INSERT INTO `cms_products` VALUES ('26', '5', 'Products/2016-11-14/58295677514cf.jpg', '0005', '1', null, '1', '1', '2', null, '2016:11:14', null, '7', 'Products/2016-11-14/sm_58295677514cf.jpg', null, '8');

-- ----------------------------
-- Table structure for cms_pro_attr
-- ----------------------------
DROP TABLE IF EXISTS `cms_pro_attr`;
CREATE TABLE `cms_pro_attr` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `pro_id` mediumint(8) unsigned NOT NULL COMMENT '商品id',
  `attr_id` mediumint(8) unsigned NOT NULL COMMENT '属性id',
  `attr_value` varchar(150) NOT NULL DEFAULT '' COMMENT '属性值',
  `attr_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '属性的价格',
  PRIMARY KEY (`id`),
  KEY `goods_id` (`pro_id`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COMMENT='商品属性';

-- ----------------------------
-- Records of cms_pro_attr
-- ----------------------------
INSERT INTO `cms_pro_attr` VALUES ('58', '26', '18', '10*15', '4.00');
INSERT INTO `cms_pro_attr` VALUES ('60', '26', '19', '绿色', '3.00');
INSERT INTO `cms_pro_attr` VALUES ('59', '26', '19', '红色', '2.00');
INSERT INTO `cms_pro_attr` VALUES ('57', '26', '18', '10*10', '2.00');

-- ----------------------------
-- Table structure for cms_role
-- ----------------------------
DROP TABLE IF EXISTS `cms_role`;
CREATE TABLE `cms_role` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `role_name` varchar(60) NOT NULL COMMENT '角色名称',
  `sort` tinyint(4) DEFAULT '50' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='权限表';

-- ----------------------------
-- Records of cms_role
-- ----------------------------
INSERT INTO `cms_role` VALUES ('1', '网店店长', '50');
INSERT INTO `cms_role` VALUES ('2', '网店美工', '50');

-- ----------------------------
-- Table structure for cms_role_pri
-- ----------------------------
DROP TABLE IF EXISTS `cms_role_pri`;
CREATE TABLE `cms_role_pri` (
  `role_id` mediumint(8) unsigned NOT NULL COMMENT '角色id',
  `pri_id` mediumint(8) unsigned NOT NULL COMMENT '权限id',
  KEY `role_id` (`role_id`),
  KEY `pri_id` (`pri_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='角色权限';

-- ----------------------------
-- Records of cms_role_pri
-- ----------------------------
INSERT INTO `cms_role_pri` VALUES ('1', '7');
INSERT INTO `cms_role_pri` VALUES ('2', '2');
INSERT INTO `cms_role_pri` VALUES ('2', '1');
INSERT INTO `cms_role_pri` VALUES ('1', '5');
INSERT INTO `cms_role_pri` VALUES ('1', '4');
INSERT INTO `cms_role_pri` VALUES ('1', '3');
INSERT INTO `cms_role_pri` VALUES ('1', '2');
INSERT INTO `cms_role_pri` VALUES ('2', '5');
INSERT INTO `cms_role_pri` VALUES ('2', '6');
INSERT INTO `cms_role_pri` VALUES ('2', '7');
INSERT INTO `cms_role_pri` VALUES ('1', '1');

-- ----------------------------
-- Table structure for cms_role_user
-- ----------------------------
DROP TABLE IF EXISTS `cms_role_user`;
CREATE TABLE `cms_role_user` (
  `role_id` mediumint(8) unsigned NOT NULL COMMENT '角色id',
  `user_id` mediumint(8) unsigned NOT NULL COMMENT '管理员id',
  KEY `role_id` (`role_id`),
  KEY `pri_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='角色权限';

-- ----------------------------
-- Records of cms_role_user
-- ----------------------------
INSERT INTO `cms_role_user` VALUES ('2', '7');
INSERT INTO `cms_role_user` VALUES ('2', '6');
INSERT INTO `cms_role_user` VALUES ('2', '5');
INSERT INTO `cms_role_user` VALUES ('1', '2');
INSERT INTO `cms_role_user` VALUES ('1', '1');
INSERT INTO `cms_role_user` VALUES ('2', '8');

-- ----------------------------
-- Table structure for cms_shop_group
-- ----------------------------
DROP TABLE IF EXISTS `cms_shop_group`;
CREATE TABLE `cms_shop_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `shop_name` varchar(60) NOT NULL COMMENT '网店名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='网店分组';

-- ----------------------------
-- Records of cms_shop_group
-- ----------------------------
INSERT INTO `cms_shop_group` VALUES ('1', '晶宜');
INSERT INTO `cms_shop_group` VALUES ('2', '测试');

-- ----------------------------
-- Table structure for cms_style
-- ----------------------------
DROP TABLE IF EXISTS `cms_style`;
CREATE TABLE `cms_style` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `style_name` varchar(40) NOT NULL COMMENT '风格名字',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='风格表';

-- ----------------------------
-- Records of cms_style
-- ----------------------------
INSERT INTO `cms_style` VALUES ('5', '人物');
INSERT INTO `cms_style` VALUES ('6', '动画');
INSERT INTO `cms_style` VALUES ('7', '风景');

-- ----------------------------
-- Table structure for cms_type
-- ----------------------------
DROP TABLE IF EXISTS `cms_type`;
CREATE TABLE `cms_type` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `type_name` varchar(30) NOT NULL COMMENT '类型名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='类型名称';

-- ----------------------------
-- Records of cms_type
-- ----------------------------
INSERT INTO `cms_type` VALUES ('8', '贴纸');

-- ----------------------------
-- Table structure for cms_user
-- ----------------------------
DROP TABLE IF EXISTS `cms_user`;
CREATE TABLE `cms_user` (
  `accounts` varchar(30) NOT NULL DEFAULT '' COMMENT '用于登录的账户',
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `username` varchar(20) NOT NULL COMMENT '用户名',
  `password` varchar(32) NOT NULL COMMENT '密码',
  `job_numbers` int(6) unsigned zerofill NOT NULL COMMENT '工号',
  `mobile` varchar(11) NOT NULL COMMENT '手机号',
  `email` varchar(50) NOT NULL DEFAULT '' COMMENT '电子邮件',
  `shop_group` tinyint(2) unsigned NOT NULL COMMENT '分组授权',
  `is_active` tinyint(2) NOT NULL COMMENT '用户状态',
  `is_iuqn` tinyint(2) DEFAULT NULL COMMENT '是否考勤',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注信息',
  `departid` mediumint(9) NOT NULL COMMENT '部门id',
  `employee_color` varchar(8) DEFAULT NULL COMMENT '颜色标识',
  `ip` int(10) unsigned DEFAULT NULL,
  `rec` tinyint(2) NOT NULL DEFAULT '0' COMMENT '是否被回收',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='用户信息表';

-- ----------------------------
-- Records of cms_user
-- ----------------------------
INSERT INTO `cms_user` VALUES ('root', '1', '陈亚军1', '630afbe195d397d659f544a5ab87ecaa', '222254', '15569551234', '155@163.com', '2', '1', '0', '', '4', '', '2130706433', '0');
INSERT INTO `cms_user` VALUES ('', '2', '张三', '1', '556462', '15645645646', '1', '1', '0', null, '1', '2', '', null, '1');
INSERT INTO `cms_user` VALUES ('', '5', '李四', '1', '415641', '13551564564', '1', '2', '1', '0', '1ww', '4', '', null, '0');
INSERT INTO `cms_user` VALUES ('test', '6', '陈亚军2', '630afbe195d397d659f544a5ab87ecaa', '123555', '13955555558', '61@163.com', '2', '0', '0', '2www', '3', '', '2130706433', '0');
INSERT INTO `cms_user` VALUES ('test2', '7', '小陈test', '630afbe195d397d659f544a5ab87ecaa', '711100', '15674444444', '61@163.com', '1', '1', '1', 'YYY', '5', '#44444', '2130706433', '0');
INSERT INTO `cms_user` VALUES ('jtjtj', '8', '尔东', '630afbe195d397d659f544a5ab87ecaa', '000002', '15236548953', '263@163.com', '2', '0', '1', 'test3', '1', '', null, '0');











































create database `sq_jingyi`;

CREATE TABLE `CMS_Check` (



)COMMENT '考勤信息表';


CREATE TABLE `CMS_Check` (
id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL COMMENT 'id',
name varchar(20) NOT NULL COMMENT '姓名',
sex int(1) NOT NULL COMMENT '性别'


)COMMENT '考勤信息表';


DROP TABLE IF EXISTS cms_privilege;
CREATE TABLE cms_privilege(
id MEDIUMINT UNSIGNED NOT NULL auto_increment COMMENT 'id',
pri_name VARCHAR(20) NOT NULL COMMENT '权限名称',
module_name varchar(60) NOT NULL COMMENT '对应模块名称',
controller_name varchar(60) NOT NULL COMMENT '对应控制器名称',
action_name varchar(60) NOT NULL COMMENT '对应方法名称',
parent_id MEDIUMINT NOT NULL COMMENT '父级id',
PRIMARY KEY(id)

)ENGINE MyISAM COMMENT '权限表';


DROP TABLE IF EXSIS cms_role;
CREATE TABLE cms_role(
id MEDIUMINT UNSIGNED NOT NULL auto_increment COMMENT 'id',
role_name varchar(60) not null comment '角色名称',
primar key (id)

)engine MyISAM COMMENT '权限表';

DROP TABLE IF EXISTS cms_role_pri;
create table cms_role_pri(
role_id mediumint unsigned not null comment '角色id',
pri_id mediumint unsigned not null comment '权限id',
index role_id(role_id),
key pri_id(pri_id)
)engine MyISAM comment '角色权限';


DROP TABLE IF EXISTS cms_clock;
CREATE TABLE cms_clock(
id INT NOT NULL PRIMARY KEY auto_increment COMMENT 'id',
user_id int NOT NULL  COMMENT '用户id',
`year` INTEGER NOT NULL COMMENT '年',
`month` INTEGER NOT NULL COMMENT '月',
`day` INTEGER NOT NULL COMMENT '日',
`s_time` TIME NOT NULL COMMENT '开始登陆时间',
`e_time` TIME NOT NULL COMMENT '最后登陆时间',
`ip` INT(10) NOT NULL COMMENT '登陆ip',
INDEX idx_user_id(`user_id`)
)ENGINE INNODB COMMENT '考勤表';




DROP TABLE IF EXISTS cms_cation;
CREATE TABLE cms_cation(
id int not null PRIMARY KEY auto_increment COMMENT 'id',
cat_name varchar(40) not null COMMENT '分类名称',
parent_id int nut null COMMENT '父级id'

)ENGINE MyISAM COMMENT '考勤表';

DROP TABLE IF EXISTS cms_style;
CREATE TABLE cms_cation(
id int unsigned  not null PRIMARY KEY auto_increment COMMENT 'id',
style_name varchar(40) not null COMMENT '风格名字'

)ENGINE MyISAM COMMENT '风格表';



DROP TABLE IF EXISTS cms_products;
CREATE TABLE cms_products(
id int unsigned not null PRiMARY KEY auto_increment COMMENT '产品id',
title varchar(60) not null COMMENT '产品名称--短标题',
logo  varchar(60) COMMENT 'logo地址',
outer_id varchar(40) COMMENT '产品编号',
sub_title varchar(500)   COMMENT '推广标题',
his_pro_tit VARCHAR(500) COMMENT '历史推广标题',
summ varchar(100) comment '产品简介',
selling_point   VARCHAR(100) COMMENT '宝贝卖点',
cat_id  INT unsigned not null COMMENT '产品分类id',
stock INT unsigned  COMMENT '总库存',
list_time int(10) COMMENT '添加时间',
clubs_id   int unsigned COMMENT '仓储编号',
style_id    int unsigned COMMENT '图案风格', 
sku	VARCHAR(60) COMMENT 'sku属性'
)ENGINE INNODB COMMENT '产品表';

DROP TABLE IF EXISTS cms_type;
CREATE TABLE php05_type(
ud mediumint unsigned  NOT NULL auto_increment comment 'id',
type_name varchar(30) not null comment '类型名称',
primary key (id)
)engine=MyISAM default CHARSET=UTF8 comment '类型名称';


DROP TABLE IF EXISTS cms_attribute;
CREATE TABLE cms_attribute(
id mediumint unsigned not null auto_increment comment 'id',
attr_name varchar(10) not null comment '属性名称',
attr_type tinyint unsigned not null default '0' comment '属性类型：0代表唯一，1有可选属性',
attr_option_values varchar(300) not null default '' comment '属性值，多个就用，分开',
type_id mediumint unsigned not null comment '类型id',
primary key (id),
key type_id(type_id)
)engine=MyIsam default charset=utf8 comment '属性';


商品和属性关联表

DROP TABLE IF EXISTS cms_pro_attr;
CREATE TABLE cms_pro_attr (
id mediumint unsigned not null auto_increment comment 'id',
pro_id mediumint unsigned not null comment '商品id',
attr_id mediumint unsigned not null comment '属性id',
attr_value varchar(150) not null default '' comment '属性值',
attr_price decimal(10,2) not null default '0.00' comment '属性的价格',
primary key (id),
key goods_id(pro_id)
)engine=MyISAM default charset=utf8 comment '商品属性';


DROP TABLE IF EXISTS cms_stock;
CREATE TABLE cms_stock(
id int unsigned not null auto_increment comment '库存id',
pro_id int unsigned not null comment '产品id',
spec varchar(60) not null comment '规格',
sku varchar(60) comment 'sku属性',
location varchar(60) comment '库位,产品储存位置',
stock_num int unsigned comment '库存数量',
a_sort int unsigned comment '预警库存',
batch_number varchar(60) comment '批号',
`remark` varchar comment '备注信息',
primary key (id),
key pro_id(pro_id)
)engine=MyISAM charset=utf8 comment '库存表';

DROP TABLE if EXISTS cms_stock;
CREATE TABLE cms_stock(
id int unsigned not null PRiMARY KEY auto_increment comment '库存id',
pro_id int unsigned not null comment '产品id',
spec varchar(60) not null comment '规格',
sku varchar(60) comment 'sku属性',
location varchar(60) comment '库位,产品储存位置',
stock_num int unsigned comment '库存数量',
a_sort int unsigned comment '预警库存',
batch_number varchar(60) comment '批号',
remark varchar(60) comment '备注信息',
key pro_id(pro_id)
)engine=MyISAM COMMENT '库存表';


#sku表
DROP TABLE IF EXISTS cms_sku;
CREATE TABLE cms_sku(
id int unsigned not null PRIMARY KEY auto_increment comment 'suk_id',
sku varchar(60) not null comment 'sku属性',
pro_id int unsigned not null comment '产品id',
spec varchar(60) not null comment '规格', 
key pro_id(pro_id)
)engine=MyISAM comment 'sku表';


DROP TABLE if EXISTS cms_stock;
CREATE TABLE cms_stock(
id int unsigned not null PRiMARY KEY auto_increment comment '库存id',
sku_id int unsigned comment 'sku_id',
location varchar(60) comment '库位,产品储存位置',
stock_num int unsigned comment '库存数量',
a_sort int unsigned comment '预警库存',
batch_number varchar(60) comment '批号',
remark varchar(60) comment '备注信息',
key sku_id(sku_id)
)engine=MyISAM COMMENT '库存表';


drop TABLE IF EXISTS cms_orders;
CREATE TABLE cms_orders(
id INT  UNSIGNED PRIMARY KEY auto_increment COMMENT'id',
tid VARCHAR(20) COMMENT '订单id',
tid_s VARCHAR(20) COMMENT '合并订单的订单号',
seller_nick VARCHAR(60) COMMENT '所属店铺',
buyer_nick VARCHAR(60) COMMENT '买家(旺旺)名',
buyer_alipay_no VARCHAR(60) COMMENT '旺旺号',
created TIMESTAMP COMMENT '创建订单时间',
Payment_time TIMESTAMP COMMENT '支付时间',
discount_fee DECIMAL(5,2) COMMENT'折扣',
buyer_message VARCHAR(150) COMMENT'买家留言',
seller_memo VARCHAR(150) COMMENT'买家备忘',
pay_time TIMESTAMP COMMENT '支付时间',
post_fee DECIMAL(5,2) COMMENT '邮费',
price DECIMAL(8,2) COMMENT '金额',
total_pricce DECIMAL(9,2) COMMENT'总金额',
receiver_address VARCHAR(200) COMMENT '收件地址',
receiver_zip varchar(6) COMMENT '邮编',
receiver_name varchar(30) COMMENT '买家(收件)姓名',
receiver_mobile varchar(11) COMMENT '收件手机号码',
receiver_phone varchar(20) COMMENT '收件电话',
logistics_company varchar(30) COMMENT '物流公司',
invoice varchar(30) COMMENT '发票',
invoice_number varchar(30) COMMENT '发货单号',
invoice_status MEDIUMINT COMMENT '发货单打印',
invoice_status_time TIMESTAMP COMMENT '打发货单时间',
invoice_no MEDIUMINT COMMENT '配货单',
invoice_no_time TIMESTAMP COMMENT '配货单时间',
user_id MEDIUMINT COMMENT '处理人id',
ship_time TIMESTAMP COMMENT '处理时间',
products_list VARCHAR(200) COMMENT'产品清单',
shop_group MEDIUMINT COMMENT '店铺id',
instructions MEDIUMINT COMMENT '说明书',
instructions_time TIMESTAMP COMMENT '说明书时间',
warehouse_delivery MEDIUMINT COMMENT '仓库发货',
warehouse_delivery_time TIMESTAMP COMMENT '仓库发货时间',
wrong_replacement MEDIUMINT  COMMENT '是否错漏补发',
logistics_numbers VARCHAR(20) COMMENT '物流单号',
order_status    MEDIUMINT COMMENT '订单状态'
)ENGINE INNODB;



DROP TABLE IF EXISTS cms_orderinfo;
CREATE TABLE cms_orderinfo(
id INT unsigned PRIMARY KEY auto_increment COMMENT 'id',
tid varchar(20) COMMENT '订单id',
title varchar(200) COMMENT '标题',
price DECIMAL(8,2) COMMENT '单间价格',
num int comment '购买数量',
outer_iid varchar(30) COMMENT '外部编号',
sku_pro_name varchar(150) comment 'SKU'
)engine MyISAM;

DROP TABLE IF EXISTS cms_setup;
CREATE TABLE cms_setup(
id MEDIUMINT PRIMARY KEY auto_increment COMMENT 'id',
user_id   MEDIUMINT COMMENT '用户id',
trade_waitprint	INT COMMENT '交易管理默认配置',
#收款收据
offset_left_rec INT COMMENT '收款收据左偏移',
offset_top_rec	INT COMMENT '收款收据右偏移',
str_printer_name_rec VARCHAR(255) COMMENT '收款收据打印机',
#发货单
pag_size_type_Inv TINYINT COMMENT '发货单是否自定义纸张',
int_page_width_inv	INT COMMENT '发货单自定义纸张宽度  单位CM',
int_page_height_inv INT COMMENT '发货单自定义纸张高度 单位CM',
Pagsize_type_inv VARCHAR(255) COMMENT '发货单指定纸张 lodop获取',
int_orient_inv	TINYINT COMMENT '发货单纸张方向 1为纵向 2 为横向',
int_copies_inv	INT COMMENT '发货单打印份数',
str_printer_name_inv VARCHAR(255) COMMENT '发货单打印机名称',
#说明书
pag_size_type   MEDIUMINT COMMENT '说明书是否自定义纸张',
int_page_width  INT COMMENT '说明书自定义宽度 单位CM',
int_Page_height INT COMMENT '说明书自定义高度 单位CM',
str_page_name   VARCHAR(255) COMMENT '说明书指定纸张 lodop获取',
int_orient TINYINT COMMENT '说明书纸张方向 1为纵向2 为横向',
int_copies INT COMMENT '说明书打印份数',
offset_left INT COMMENT '说明书左偏移',
offset_top INT COMMENT '说明书上偏移',
strprinter_name VARCHAR(255) COMMENT '说明书打印机设置',
#配货单
pag_size_type_ord TINYINT COMMENT '配货单是否自定义纸张',
int_page_width_ord TINYINT COMMENT '配货单自定义宽度 单位CM',
int_page_height_ord TINYINT COMMENT '配货单自定义高度  单位CM',
str_page_name_ord VARCHAR(255) COMMENT '配货单指定纸张 lodop获取',
int_orient_ord	TINYINT COMMENT '配货单纸张方向 1 为纵向 2 为横向',
int_copies_ord	INT COMMENT '配货单打印份数',
offset_left_ord INT COMMENT '配货单左偏移',
offset_top_ord	INT COMMENT '配货单上偏移',
str_printer_name_ord VARCHAR(255) COMMENT'配货单打印机'
);

DROP TABLE IF EXISTS cms_vehicle_analysis;
CREATE TABLE cms_vehicle_analysis(
id INT PRIMARY KEY AUTO_INCREMENT COMMENT 'id',
key_word VARCHAR(255) COMMENT '关键词',
display_index INT COMMENT '展现指数',
click_index INT COMMENT '点击指数',
click_rate VARCHAR(20) COMMENT '点击率',
conversion_rate VARCHAR(20) COMMENT '转化率',
straight_through_car_price DECIMAL(5,2) COMMENT '直通车价格',
degree_of_competition INT COMMENT '竞争度',
search_trends VARCHAR(20) COMMENT '搜索趋势',
recommended_category VARCHAR(200) COMMENT'推荐类目',
related_baby_number  INT COMMENT '相关宝贝数'
);

DROP TABLE IF EXISTS cms_logistics_codes;
CREATE TABLE cms_logistics_codes(
id INT PRIMARY KEY AUTO_INCREMENT COMMENT 'id',
logistics_company varchar(50)  ,
code_ahead VARCHAR(4) ,
code_length INT ,
ishide INT,
re_logistics_company VARCHAR(50)
);

