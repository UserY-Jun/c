<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>工作日志 </title>
	<link rel="stylesheet" type="text/css" href="/Public/css/bootstrap-grid.min.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

        <link rel="stylesheet" type="text/css" href="/Public/css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="/Public/css/set2.css" />
        
	<style type="text/css">
	.pricingTable{
	    text-align: center;
	}
	.pricingTable .pricingTable-header{
	    padding: 30px 0;
	    background: #4d4d4d;
	    position: relative;
	    transition: all 0.3s ease 0s;
	}
	.pricingTable:hover .pricingTable-header{
	    background: #09b2c6;
	}
	.pricingTable .pricingTable-header:before,
	.pricingTable .pricingTable-header:after{
	    content: "";
	    width: 16px;
	    height: 16px;
	    border-radius: 50%;
	    border: 1px solid #d9d9d8;
	    position: absolute;
	    bottom: 12px;
	}
	.pricingTable .pricingTable-header:before{
	    left: 40px;
	}
	.pricingTable .pricingTable-header:after{
	    right: 40px;
	}
	.pricingTable .heading{
	    font-size: 20px;
	    color: #fff;
	    text-transform: uppercase;
	    letter-spacing: 2px;
	    margin-top: 0;
	}
	.pricingTable .price-value{
	    display: inline-block;
	    position: relative;
	    font-size: 55px;
	    font-weight: bold;
	    color: #09b1c5;
	    transition: all 0.3s ease 0s;
	}
	.pricingTable:hover .price-value{
	    color: #fff;
	}
	.pricingTable .currency{
	    font-size: 30px;
	    font-weight: bold;
	    position: absolute;
	    top: 6px;
	    left: -19px;
	}
	.pricingTable .month{
	    font-size: 16px;
	    color: #fff;
	    position: absolute;
	    bottom: 15px;
	    right: -30px;
	    text-transform: uppercase;
	}
	.pricingTable .pricing-content{
	    padding-top: 50px;
	    background: #fff;
	    position: relative;
	}
	.pricingTable .pricing-content:before,
	.pricingTable .pricing-content:after{
	    content: "";
	    width: 16px;
	    height: 16px;
	    border-radius: 50%;
	    border: 1px solid #7c7c7c;
	    position: absolute;
	    top: 12px;
	}
	.pricingTable .pricing-content:before{
	    left: 40px;
	}
	.pricingTable .pricing-content:after{
	    right: 40px;
	}
	.pricingTable .pricing-content ul{
	    padding: 0 20px;
	    margin: 0;
	    list-style: none;
	}
	.pricingTable .pricing-content ul:before,
	.pricingTable .pricing-content ul:after{
	    content: "";
	    width: 8px;
	    height: 46px;
	    border-radius: 3px;
	    background: linear-gradient(to bottom,#818282 50%,#727373 50%);
	    position: absolute;
	    top: -22px;
	    z-index: 1;
	    box-shadow: 0 0 5px #707070;
	    transition: all 0.3s ease 0s;
	}
	.pricingTable:hover .pricing-content ul:before,
	.pricingTable:hover .pricing-content ul:after{
	    background: linear-gradient(to bottom, #40c4db 50%, #34bacc 50%);
	}
	.pricingTable .pricing-content ul:before{
	    left: 44px;
	}
	.pricingTable .pricing-content ul:after{
	    right: 44px;
	}
	.pricingTable .pricing-content ul li{
	    font-size: 15px;
	    font-weight: bold;
	    color: #777473;
	    padding: 10px 0;
	    border-bottom: 1px solid #d9d9d8;
	}
	.pricingTable .pricing-content ul li:last-child{
	    border-bottom: none;
	}
	.pricingTable .read{
	    display: inline-block;
	    font-size: 16px;
	    color: #fff;
	    text-transform: uppercase;
	    background: #d9d9d8;
	    padding: 8px 25px;
	    margin: 30px 0;
	    transition: all 0.3s ease 0s;
	}
	.pricingTable .read:hover{
	    text-decoration: none;
	}
	.pricingTable:hover .read{
	    background: #09b1c5;
	}
	@media screen and (max-width: 990px){
	    .pricingTable{ margin-bottom: 25px; }
	}
        
        
        .textareaOne{
            resize:none; max-width: 350px; height: 93px;
        }
        .textareaTwo{
            resize:none; max-width: 390px; height: 93px;
        }
     .textareaSpan{
            padding-left: 100px;
        }
        
        
	</style>
	<!--[if IE]>
		<script src="http://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<![endif]-->
</head>
<body style="background:#c0bfbf;">
		<div class="demo" style="padding: 10em 0;">
		        <div class="container">
		            <div class="row">
		                <div class="col-md-31 col-sm-61">
		                    <div class="pricingTable">
		                        <div class="pricingTable-header" >
		                            <h3 class="heading">今日任务</h3>
		                            <span class="price-value">
		                                <span class="currency">D</span> <?php echo date('d'); ?>
		                                <span class="month">/<?php echo date('m'); ?></span>
		                            </span>
		                        </div>
                                   
			
		                        <div class="pricing-content">
                             
                                   
                                            
		                            <ul>
                                                <li><input type="text"></li>
                                                <li style=" text-align:  left;">
                                                    <span style=" padding-left: 10px;">主要事项:</span>
                                                    <span style=" padding-left: 400px;">情况描述:</span>
                                                </li>
                                                <li style=" text-align:  left;">
                                                    常规工作:<TEXTAREA  class="textareaOne"  NAME=""   ROWS="2"   COLS="50" style=""></TEXTAREA> 
                                                    <span style=" padding-left: 100px;"></span>
                                                        <TEXTAREA class="textareaTwo"   NAME=""   ROWS="2"   COLS="50" style=""></TEXTAREA> 
                                                </li>
                                                <li style=" text-align:  left;">
                                                    其他事物:<TEXTAREA class="textareaOne"  NAME=""   ROWS="2"   COLS="50" ></TEXTAREA> 
                                                    <span class="textareaSpan" style=""> </span>
                                                    <TEXTAREA class="textareaTwo"   NAME=""   ROWS="2"   COLS="50" ></TEXTAREA> 
                                                </li>

		                                <li>50GB Monthly Bandwidth</li>
		                                <li>10 Subdomains</li>
		                                <li>15 Domains</li>
		                            </ul>
		                            <a href="#" class="read">sign up</a>
		                        </div>
		                    </div>
		                </div>

		                <div class="col-md-3 col-sm-6">
		                    <div class="pricingTable">
		                        <div class="pricingTable-header">
		                            <h3 class="heading">Business</h3>
		                            <span class="price-value">
		                                <span class="currency">$</span> 20
		                                <span class="month">/mo</span>
		                            </span>
		                        </div>
		                        <div class="pricing-content">
		                            <ul>
		                                <li>60GB Disk Space</li>
		                                <li>60 Email Accounts</li>
		                                <li>60GB Monthly Bandwidth</li>
		                                <li>15 Subdomains</li>
		                                <li>20 Domains</li>
		                            </ul>
		                            <a href="#" class="read">sign up</a>
		                        </div>
		                    </div>
		                </div>

		                <div class="col-md-3 col-sm-6">
		                    <div class="pricingTable">
		                        <div class="pricingTable-header">
		                            <h3 class="heading">Premium</h3>
		                            <span class="price-value">
		                                <span class="currency">$</span> 30
		                                <span class="month">/mo</span>
		                            </span>
		                        </div>
		                        <div class="pricing-content">
		                            <ul>
		                                <li>70GB Disk Space</li>
		                                <li>70 Email Accounts</li>
		                                <li>70GB Monthly Bandwidth</li>
		                                <li>20 Subdomains</li>
		                                <li>25 Domains</li>
		                            </ul>
		                            <a href="#" class="read">sign up</a>
		                        </div>
		                    </div>
		                </div>

		                <div class="col-md-3 col-sm-6">
		                    <div class="pricingTable">
		                        <div class="pricingTable-header">
		                            <h3 class="heading">Extra</h3>
		                            <span class="price-value">
		                                <span class="currency">$</span> 40
		                                <span class="month">/mo</span>
		                            </span>
		                        </div>
		                        <div class="pricing-content">
		                            <ul>
		                                <li>80GB Disk Space</li>
		                                <li>80 Email Accounts</li>
		                                <li>80GB Monthly Bandwidth</li>
		                                <li>25 Subdomains</li>
		                                <li>30 Domains</li>
		                            </ul>
		                            <a href="#" class="read">sign up</a>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>

	
</body>
</html>