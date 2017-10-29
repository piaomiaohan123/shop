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
use app\models\GoodsAttr;
use app\models\GoodsAttrList;
use app\models\GoodsType;
use app\models\Product;
use app\models\TypeAttr;
use Yii;
use yii\web\Controller;


class GoodsController  extends  Controller
{
    public $enableCsrfValidation=false;

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
        $data=Goods::find()->all();
        return $this->render('list',['data'=>$data]);
    }

    public function  actionAddgoods()
    {
        $this->enableCsrfValidation=false;
        $this->layout='main1';
        $model=new Goods();
        $product=new Product();
        $category=Category::find()->all();
        $brand=Brand::find()->all();
        //只查询手机的参数   category中手机的id是7
        $goods_type_id=Category::find()->select('goods_type_id')->where('category_id=:id',[':id'=>7])->one();
        $goods_type=GoodsType::find()->all();
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
            return $this->render('addgoods',['model'=>$model,'category'=>$category,'brand'=>$brand,'canshu'=>$canshu,'goods_attr_list'=>$goods_attr_list,'guige'=>$guige,'product'=>$product,'goods_type'=>$goods_type]);
        }

    }

    public function   actionCategoryattr($goods_type_id)
    {
         $data=TypeAttr::find()->where("goods_type_id=:id",[":id"=>$goods_type_id])->asArray()->all();
         return json_encode($data);
    }

    public function  actionGoo()
    {
        $this->enableCsrfValidation=false;

        foreach ($_POST as $k=>$v){
           foreach ($v as $key=>$value){
               foreach ($value as $b=>$a)
               {


                   $goodattr=new GoodsAttrList();
                   $goodattr->goods_id=7;
                   $goodattr->goods_attr_id=$key;
                   $goodattr->attr_value=$a;
                   $goodattr->save(false);

               }
           }
        }

          return $this->redirect(['default/index']);
       // var_dump($_POST);
    }

    public function  actionHuopin($goods_id)
    {
         // echo $goods_id;
        if (Yii::$app->request->isPost){
          $sql="SELECT a.*,b.attr_name from goods_attr_list a  LEFT  JOIN type_attr b  on a.goods_attr_id=b.goods_attr_id  WHERE a.goods_id=7 and  b.attr_type=1";
          $data=Yii::$app->db->createCommand($sql)->queryAll();

          //此处是把二维数组转换成三维数组
          $_data=[];

          foreach ($data   as $k=>$v){
              $_data[$v['attr_name']][]=$v;
          }
          return $this->render('huopin',['data'=>$_data]);
        }

        else{
                $data=Product::find()->all();
                return $this->render('productlist',['data'=>$data]);
            }
    }

    public function  actionGoodsnumber()
    {


       $goods_attr_id=$_POST['goods_attr_id'];
        $goods_number=$_POST['goods_number'];
        $rate=count($goods_attr_id)/count($goods_number);
        $_i=0;
        foreach ($goods_number as $k=>$v) {
            $attr_list=[];
            for ($i=0;$i<$rate;$i++){
                $attr_list[]=$goods_attr_id[$_i];
                $_i++;
            }
            sort($attr_list,SORT_NUMERIC);
            $attr_list=(string)implode(',',$attr_list);
            $model=new Product();

            $model->goods_id=7;
            $model->attr_list=$attr_list;
            $model->price=$goods_number;
            $model->save(false);
        }


    }



}