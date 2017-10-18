<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/18
 * Time: 21:02
 */

namespace  app\Module\admin\controllers;

use app\models\Category;
use app\models\TypeAttr;
use Yii;
use yii\web\Controller;

class CategoryController extends  Controller
{
    public function  actionIndex()
    {
        $model=new Category();
        $data=$model->wuxian();
        return $this->renderPartial('index',['data'=>$data]);
    }
    public function  actionShuaixuan()
    {
        $model=new Category();

        $category_id=$_GET['category_id']?$_GET['category_id']:null;
        $goods_type_id=Category::find()->select('goods_type_id')->where('category_id=:categoryid',[':categoryid'=>$category_id])->asArray()->one();
        $data=TypeAttr::find()->select(['goods_attr_id','attr_name'])->where('goods_type_id=:id',[':id'=>$goods_type_id['goods_type_id']])->asArray()->all();
        $filter_attr=Category::find()->select('filter_attr')->where('goods_type_id=:id',[':id'=>$goods_type_id['goods_type_id']])->asArray()->one();
        $filterattr=explode(",",$filter_attr['filter_attr']);


        /**
         * 下边两句是从数据库把帅选条件的id,name取出来
         */
       // $xuanzhonglist=TypeAttr::find()->select(['attr_name','goods_attr_id'])->where(['in','goods_attr_id',$filterattr])->asArray()->all();
       // $xuanzhong=array_column($xuanzhonglist,'attr_name','goods_attr_id');


        //array_column  将二维数组转换成一维数组
        $list=array_column($data,'attr_name','goods_attr_id');
        $request=Yii::$app->request;
        $data=$request->post();
        if ($request->isPost&&$model->load($data)){
            $category_id=$data['Category']['category_id'];
            $category = Category::findOne($category_id);
            $category->filter_attr=implode(',',$data['Category']['filter_attr']);
            $category->update();
            Yii::$app->session->setFlash('shuaixuanok','筛选条件更新成功');
          $this->redirect(['category/index']);
        }else{

        return $this->renderPartial('shuaixuan',['model'=>$model,'data'=>$list,'xuanzhong'=>$filterattr]);

        }
    }
}