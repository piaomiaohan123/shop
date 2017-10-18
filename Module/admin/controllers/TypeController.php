<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/18
 * Time: 17:37
 */

namespace  app\Module\admin\controllers;

use app\models\GoodsType;
use app\models\TypeAttr;
use Yii;
use yii\web\Controller;


class TypeController extends  Controller
{
    public function   actionIndex()
    {
        $data=GoodsType::find()->all();
        return $this->renderPartial('index',['data'=>$data]);
    }
    public function  actionAdd()
    {
        $model=new GoodsType();
        $request=Yii::$app->request;
        if ($request->isPost){
            $data=$request->post();
            if ($model->baocun($data))
            {
                $this->redirect(['type/index']);
            }else{
                return $this->renderPartial('add',['model'=>$model]);
            }
        }

        return $this->renderPartial('add',['model'=>$model]);
    }
    public function  actionAttrlist()
    {
        $goods_type_id=$_GET['goods_type_id']?htmlentities($_GET['goods_type_id']):0;
        $data=TypeAttr::find()->where('goods_type_id=:goodstypeid',['goodstypeid'=>$goods_type_id])->all();
        return $this->renderPartial('attrlist',['data'=>$data]);
    }

    public function  actionAddattr()
    {
        $model=new TypeAttr();
        $request=Yii::$app->request;
        if ($request->isPost) {
             $data=$request->post();
             if ($model->baocun($data)){
                 $this->redirect(['type/attrlist','goods_type_id'=>$data['TypeAttr']['goods_type_id']]);
             }else{
                 return $this->renderPartial('addattr',['model'=>$model]);
             }
        }
        //$goods_type_id=$_GET['goods_type_id']?htmlentities($_GET['goods_type_id']):0;
        return $this->renderPartial('addattr',['model'=>$model]);
    }
}