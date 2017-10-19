<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/19
 * Time: 15:48
 */

namespace  app\controllers;

use Yii;
use yii\web\Controller;

class CartController extends  Controller
{
    public function  actionList()
    {
        //购物车
        //如果登录了,提交到数据库
        var_dump(Yii::$app->session['cart']);
    }
}