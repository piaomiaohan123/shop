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
use app\models\Product;
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
        $this->layout='main1';
        return $this->render('list');
    }

    public function  actionAddgoods()
    {
        $this->layout='main1';
        $model=new Goods();
        $product=new Product();
        $category=Category::find()->all();
        $brand=Brand::find()->all();
        //只查询手机的参数   category中手机的id是7
        $goods_type_id=Category::find()->select('goods_type_id')->where('category_id=:id',[':id'=>7])->one();
        $goods_attr_list=new GoodsAttrList();
        //只取出type=0的，，就是参数
        $canshu=TypeAttr::find()->select(['goods_attr_id','attr_name','attr_may_value'])->where('goods_type_id=:id and attr_type=:type',[':id'=>$goods_type_id['goods_type_id'],':type'=>0])->all();
        $guige=TypeAttr::find()->select(['goods_attr_id','attr_name','attr_may_value'])->where('goods_type_id=:id and attr_type=:type',[':id'=>$goods_type_id['goods_type_id'],':type'=>1])->all();

        $request=Yii::$app->request;
        if ($request->isPost){

                $model=new Goods();
                $product=new Product();
                $goods_attr_list=new GoodsAttrList();
            $model->goods_name=$_POST['Goods']['goods_name'];
            $model->admin_user_id=1;
            $model->goods_type_id=1;

            $model->promote_word=$_POST['Goods']['promote_word'];
            $model->category_id=$_POST['Goods']['category_id'];
            $model->brand_id=$_POST['Goods']['brand_id'];
            $model->goods_sn=$_POST['Goods']['goods_sn'];
            $model->sku=$_POST['Goods']['sku'];
            $model->goods_price=$_POST['Goods']['goods_price'];
           $model->save(false);
           $goods_id=Yii::$app->db->getLastInsertID();
           foreach ($_POST['GoodsAttrList']['attr_value'] as $v){
               //此处可能有bug
               $goods_attr_list->attr_value=$v;
               $goods_attr_list->goods_id=$goods_id;
               $goods_attr_list->goods_attr_id=1;
               $goods_attr_list->save(false);
           }

            $product->attr_list=implode(',',$_POST['Product']['attr_list']);
            $product->sku=$_POST['Product']['sku'];
            $product->price=$_POST['Product']['price'];
            $product->goods_sn=$_POST['Product']['goods_sn'];
            $product->goods_id=$goods_id;
           $product->save(false);
           $this->redirect(['goods/list']);

        }else{
            return $this->render('addgoods',['model'=>$model,'category'=>$category,'brand'=>$brand,'canshu'=>$canshu,'goods_attr_list'=>$goods_attr_list,'guige'=>$guige,'product'=>$product]);
        }

    }
}