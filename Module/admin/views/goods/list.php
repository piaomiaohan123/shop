<?php  use yii\helpers\Url;
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



</body></html>