<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/19
 * Time: 14:19
 */

namespace app\controllers;
use app\models\Goods;
use app\models\GoodsAttrList;
use Yii;
use yii\web\Controller;

class GoodsController extends  Controller
{

    public $enableCsrfValidation = false;

    public function  actionIndex()
    {
        $goods_id=!empty(intval($_GET['goods_id']))?intval($_GET['goods_id']):1;
        $data=Goods::find()->where('goods_id=:id',[':id'=>$goods_id])->one();
       return  $this->renderPartial('index',['data'=>$data]);
    }
    public function  actionAddcart()
    {
        $this->enableCsrfValidation=false;
        if (!empty($_POST)){
          //加入购物车
            //从数据库把商品信息查询出来
            //保存到session

            $session=Yii::$app->session;
            $session['cart']=[
                'goods_id'=>$_POST['goods_id'],
                'num'=>$_POST['number']
            ];
        }

    }
}