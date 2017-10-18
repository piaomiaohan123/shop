<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"><!--Head--><head>
    <meta charset="utf-8">
    <title>星空商城管理系统--登录界面</title>
    <meta name="description" content="login page">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--Basic Styles-->
    <link href="assets/admin/style/bootstrap.css" rel="stylesheet">
    <link href="assets/admin/style/font-awesome.css" rel="stylesheet">
    <!--Beyond styles-->
    <link id="beyond-link" href="assets/admin/style/beyond.css" rel="stylesheet">
    <link href="assets/admin/style/demo.css" rel="stylesheet">
    <link href="assets/admin/style/animate.css" rel="stylesheet">
</head>
<!--Head Ends-->
<!--Body-->

<body>
<div class="login-container animated fadeInDown">
   <?php  $form=ActiveForm::begin(['method'=>'post']) ?>
        <div class="loginbox bg-white">
            <div class="loginbox-title">登录</div>
            <div class="loginbox-textbox">
                <h6 style="color: red">  <?php  echo  Yii::$app->session->getFlash('userpass'); ?></h6>
                <?=$form->field($model,'username'); ?>
<!--                <input  class="form-control" placeholder="username" name="username" type="text">-->
            </div>
            <div class="loginbox-textbox">
                <?=$form->field($model,'password')->passwordInput()?>
<!--                <input class="form-control" placeholder="password" name="password" type="password">-->
            </div>
            <div class="loginbox-submit">
                <?= Html::submitButton('登录', ['class' => 'btn btn-primary btn-block']) ?>
<!--                <input class="btn btn-primary btn-block" value="Login" type="submit">-->
            </div>
        </div>
        <div class="logobox">
            <p class="text-center">piaomiaohan12@163.com</p>
        </div>
    <?php ActiveForm::end();  ?>
</div>
<!--<!--Basic Scripts-->-->
<!--<script src="assets/admin/style/jquery.js"></script>-->
<!--<script src="assets/admin/style/bootstrap.js"></script>-->
<!--<script src="assets/admin/style/jquery_002.js"></script>-->
<!--<!--Beyond Scripts-->-->
<!--<script src="assets/admin/style/beyond.js"></script>-->




</body><!--Body Ends--></html>