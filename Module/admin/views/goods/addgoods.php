<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;

?>

<!DOCTYPE html>
<html><head>
    <meta charset="utf-8">
    <title>童老师ThinkPHP交流群：484519446</title>

    <meta name="description" content="Dashboard">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--Basic Styles-->
    <link href="assets/admin/style/bootstrap.css" rel="stylesheet">
    <link href="assets/admin/style/font-awesome.css" rel="stylesheet">
    <link href="assets/admin/style/weather-icons.css" rel="stylesheet">

    <!--Beyond styles-->
    <link id="beyond-link" href="assets/admin/style/beyond.css" rel="stylesheet" type="text/css">
    <link href="assets/admin/style/demo.css" rel="stylesheet">
    <link href="assets/admin/style/typicons.css" rel="stylesheet">
    <link href="assets/admin/style/animate.css" rel="stylesheet">

</head>
<body>

<div class="main-container container-fluid">
    <div class="page-container">
        <!-- Page Sidebar -->
        <div class="page-sidebar" id="sidebar">
            <!-- Page Sidebar Header-->
            <div class="sidebar-header-wrapper">
                <input class="searchinput" type="text">
                <i class="searchicon fa fa-search"></i>
                <div class="searchhelper">Search Reports, Charts, Emails or Notifications</div>
            </div>
            <!-- /Page Sidebar Header -->
            <!-- Sidebar Menu -->
            <ul class="nav sidebar-menu">
                <!--Dashboard-->
                <li>
                    <a href="/admin/main/index.html">
                        <i class="menu-icon fa fa-gear"></i>

                        <span class="menu-text">
                                控制面板                            </span>

                        <i class="menu-expand"></i>
                    </a>
                </li>
                <li>
                    <a href="#" class="menu-dropdown">
                        <i class="menu-icon fa fa-gear"></i>

                        <span class="menu-text">
                                商品管理                          </span>

                        <i class="menu-expand"></i>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="<?php echo Url::to(['goods/list']) ?>">
                                    <span class="menu-text">
                                        商品列表                                    </span>
                                <i class="menu-expand"></i>
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo Url::to(['goods/addgoods']) ?>">
                                    <span class="menu-text">
                                        添加商品                                    </span>
                                <i class="menu-expand"></i>
                            </a>
                        </li>


                        <li>
                            <a href="<?php echo Url::to(['category/index']) ?>">
                                    <span class="menu-text">
                                        商品分类                                    </span>
                                <i class="menu-expand"></i>
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo Url::to(['type/index'])  ?>">
                                    <span class="menu-text">
                                        商品类型                                   </span>
                                <i class="menu-expand"></i>
                            </a>
                        </li>

                        <li>
                            <a href="/admin/document/index.html">
                                    <span class="menu-text">
                                        品牌管理                                  </span>
                                <i class="menu-expand"></i>
                            </a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="#" class="menu-dropdown">
                        <i class="menu-icon fa fa-gear"></i>

                        <span class="menu-text">
                                用户管理                            </span>

                        <i class="menu-expand"></i>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="/admin/user/index.html">
                                    <span class="menu-text">
                                        管理员                                   </span>
                                <i class="menu-expand"></i>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/auth_group/index.html">
                                    <span class="menu-text">
                                        客户管理                                    </span>
                                <i class="menu-expand"></i>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/auth_rule/index.html">
                                    <span class="menu-text">
                                        等级管理                                    </span>
                                <i class="menu-expand"></i>
                            </a>
                        </li>

                    </ul>
                </li>

            </ul>
            <!-- /Sidebar Menu -->
        </div>
        <!-- /Sidebar Menu -->
    </div>
    <!-- /Page Sidebar -->
    <!-- Page Content -->
    <div class="page-content">
        <!-- Page Breadcrumb -->
        <div class="page-breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <a href="#">系统</a>
                </li>
                <li>
                    <a href="#">用户管理</a>
                </li>
                <li class="active">添加用户</li>
            </ul>
        </div>
        <!-- /Page Breadcrumb -->




        <ul id="myTab" class="nav nav-tabs">
            <li class="active">
                <a href="#home" data-toggle="tab">
                   基本信息
                </a>
            </li>
            <li><a href="#ios" data-toggle="tab">商品描述</a></li>
            <li><a href="#xiangce" data-toggle="tab">商品相册</a></li>
            <li><a href="#ejb" data-toggle="tab">参数</a></li>
            <li><a href="#huopin" data-toggle="tab">货品</a></li>
            <li><a href="#meta" data-toggle="tab">META设置</a></li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade in active" id="home">
              <?php $form=ActiveForm::begin(['method'=>'post']) ?>
                 <?=$form->field($model,'goods_name');?>
              <?=$form->field($model,'promote_word');?>
               <?=$form->field($model,'category_id')->dropDownList(\yii\helpers\ArrayHelper::map($category,'category_id','category_name'));?>
              <?=$form->field($model,'brand_id')->dropDownList(\yii\helpers\ArrayHelper::map($brand,'brand_id','brand_name'));?>
              <?=$form->field($model,'goods_sn');?>
              <?=$form->field($model,'sku');?>
              <?=$form->field($model,'goods_price');?>




            </div>
            <div class="tab-pane fade" id="ios">

                <?=$form->field($model,'goods_style_name')->widget('kucha\ueditor\UEditor',[]);?>


            </div>
            <div class="tab-pane fade" id="xiangce">
              多图上传
            </div>
            <div class="tab-pane fade" id="ejb">



                <select class="form-control" id="category_id" onchange="gaibian();">
                    <?php foreach ($goods_type as $v):?>
                        <option  value="<?php echo $v->goods_type_id ?>"><?php echo $v->type_name ?></option>
                    <?php endforeach;?>
                </select>


            </div>

            <div class="tab-pane fade" id="huopin">

            类型




            </div>

            <div class="tab-pane fade" id="meta">
                <p>以后补充
                </p>
            </div>
        </div>
        <?= Html::submitButton('添加商品', ['class' => 'btn btn-default']) ?>
        <?php  ActiveForm::end();?>


        <div id="attrs"></div>
        <!-- /Page Body -->
    </div>




    <!-- /Page Content -->
</div>


</div>

<!--Basic Scripts-->
<script src="assets/admin/style/jquery_002.js"></script>
<script src="assets/admin/style/bootstrap.js"></script>
<script src="assets/admin/style/jquery.js"></script>
<!--Beyond Scripts-->
<script src="assets/admin/style/beyond.js"></script>

<script type="text/javascript">
    function  gaibian() {
        var goods_type_id='';
        goods_type_id= $("#category_id option:selected").val();
        $.ajax({
            type:"GET",
            url:"<?php echo  Url::to(['goods/categoryattr','goods_type_id'=>'']) ?>"+goods_type_id,
            dataType:"json",

            success:function (data) {
               var html='';
               $(data).each(function(k,v){
                   html+='<form action="<?php echo Url::to(['goods/goo']) ?> " method="post"> <li>';
                   if(v.attr_type=='1')
                       html+='<a href="#" onclick="addnewattr(this)">[+]</a>';
                   html+=v.attr_name+":";
                   if(v.attr_type=='0'){
                       html+='<input type="text" name="attr_may_value['+v.goods_attr_id+'][]"/>';
                   }else{
                       html+='<select name="attr_may_value['+v.goods_attr_id+'][]"><option  value="">请选择</option>';
                       var _attr=v.attr_may_value.split("\r\n");
                       //循环每个值制作option
                       for( var i=0;i<_attr.length;i++){
                           html+='<option value="'+_attr[i]+'">';
                           html+=_attr[i];
                           html+='</option>';


                       }
                       html+='</select>';

                   }
                   html+='</li> ';
                });
               html+="<input type=\"submit\" value=\"Submit\" /></form>";
                $("#attrs").html(html);
            }
        });

    }
    
    function  addnewattr(a) {
        var li=$(a).parent();
        if ($(a).text()=='[+]'){

            var newli=li.clone();
            newli.find("a").text('[-]');
            li.after(newli);
        }else{

            li.remove();
        }
    }


</script>


</body></html>