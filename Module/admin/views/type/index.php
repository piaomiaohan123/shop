<?php use yii\helpers\Url; ?>
<!DOCTYPE html>
<html><head>
    <meta charset="utf-8">
    <title>星空商城</title>

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
<!-- 头部 -->
<div class="navbar">
    <div class="navbar-inner">
        <div class="navbar-container">
            <!-- Navbar Barnd -->
            <div class="navbar-header pull-left">
                <a href="#" class="navbar-brand">
                    <small>
                        <img src="assets/admin/images/logo.png" alt="">
                    </small>
                </a>
            </div>
            <!-- /Navbar Barnd -->
            <!-- Sidebar Collapse -->
            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="collapse-icon fa fa-bars"></i>
            </div>
            <!-- /Sidebar Collapse -->
            <!-- Account Area and Settings -->
            <div class="navbar-header pull-right">
                <div class="navbar-account">
                    <ul class="account-area">
                        <li>
                            <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                <div class="avatar" title="View your public profile">
                                    <img src="assets/admin/images/logo.png">
                                </div>
                                <section>
                                    <h2><span class="profile"><span><?php echo Yii::$app->session['admin']['username']?></span></span></h2>
                                </section>
                            </a>
                            <!--Login Area Dropdown-->
                            <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                <li class="username"><a>David Stevenson</a></li>
                                <li class="dropdown-footer">
                                    <a href="<?php echo Url::to(['default/logout']) ?>">
                                        退出登录
                                    </a>
                                </li>
                                <li class="dropdown-footer">
                                    <a href="/admin/user/changePwd.html">
                                        修改密码
                                    </a>
                                </li>
                            </ul>
                            <!--/Login Area Dropdown-->
                        </li>
                        <!-- /Account Area -->
                        <!--Note: notice that setting div must start right after account area list.
                            no space must be between these elements-->
                        <!-- Settings -->
                    </ul>
                </div>
            </div>
            <!-- /Account Area and Settings -->
        </div>
    </div>
</div>

<!-- /头部 -->

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
                            <a href="/admin/document/index.html">
                                    <span class="menu-text">
                                        商品列表                                    </span>
                                <i class="menu-expand"></i>
                            </a>
                        </li>

                        <li>
                            <a href="/admin/document/index.html">
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
        <!-- /Page Sidebar -->
        <!-- Page Content -->
        <div class="page-content">
            <!-- Page Breadcrumb -->
            <div class="page-breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <a href="#">系统</a>
                    </li>
                    <li class="active">用户管理</li>
                </ul>
            </div>
            <!-- /Page Breadcrumb -->

            <!-- Page Body -->
            <div class="page-body">

                <button type="button" tooltip="新增类型" class="btn btn-sm btn-azure btn-addon">
                         <i class="fa fa-plus"><a href="<?php echo Url::to(['type/add']) ?>"> 新增类型</a></i>
                </button>
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <div class="widget-body">
                                <div class="flip-scroll">
                                    <table class="table table-bordered table-hover">
                                        <thead class="">
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th class="text-center">类型名称</th>
                                            <th class="text-center">操作</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($data as $v):?>
                                        <tr>
                                            <td align="center"><?php echo $v->goods_type_id ?></td>
                                            <td align="center"><?php echo $v->type_name ?></td>
                                            <td align="center">
                                                <a href="<?php echo Url::to(['type/attrlist','goods_type_id'=>$v->goods_type_id]) ?>" class="btn btn-primary btn-sm shiny">
                                                    <i class="fa fa-edit"></i> 参数
                                                </a>
                                                <a href="<?php echo Url::to(['type/add','goods_type_id'=>$v->goods_type_id]) ?>" class="btn btn-primary btn-sm shiny">
                                                    <i class="fa fa-edit"></i> 编辑
                                                </a>
                                                <a href="#" onClick="warning('确实要删除吗', <?php echo Url::to(['type/add','goods_type_id'=>$v->goods_type_id]) ?>)" class="btn btn-danger btn-sm shiny">
                                                    <i class="fa fa-trash-o"></i> 删除
                                                </a>
                                            </td>
                                        </tr>
                                       <?php  endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                                <div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
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