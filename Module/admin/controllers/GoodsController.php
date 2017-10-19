<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/19
 * Time: 8:10
 */

namespace  app\Module\admin\controllers;

use app\models\Brand;
use app\models\Category;
use app\models\Goods;
use app\models\GoodsAttrList;
use app\models\TypeAttr;
use Yii;
use yii\web\Controller;


class GoodsController  extends  Controller
{

    public  function  actions()
    {
        return [
            'upload'=>[
                'class'=>'kucha\ueditor\UEditorAction',
                'config' => [
                    "imageUrlPrefix"  => "http://www.baidu.com",//图片访问路径前缀
                    "imagePathFormat" => "/upload/image/{yyyy}{mm}{dd}/{time}{rand:6}" //上传保存路径
                ],
            ]
        ];
    }

    public function  actionIndex()
    {
        return $this->renderPartial('index');
    }

    public function  actionList()
    {
        return $this->renderPartial('list');
    }

    public function  actionAddgoods()
    {
        $this->layout='main1';
        $model=new Goods();
        $category=Category::find()->all();
        $brand=Brand::find()->all();
        //只查询手机的参数   category中手机的id是7
        $goods_type_id=Category::find()->select('goods_type_id')->where('category_id=:id',[':id'=>7])->one();
        $goods_attr_list=new GoodsAttrList();
        //只取出type=0的，，就是参数
        $canshu=TypeAttr::find()->select(['goods_attr_id','attr_name','attr_may_value'])->where('goods_type_id=:id and attr_type=:type',[':id'=>$goods_type_id['goods_type_id'],':type'=>0])->all();
        return $this->render('addgoods',['model'=>$model,'category'=>$category,'brand'=>$brand,'canshu'=>$canshu,'goods_attr_list'=>$goods_attr_list]);
    }
}