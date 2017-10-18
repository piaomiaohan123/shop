<?php

namespace app\Module\admin\controllers;

use app\models\Admin;
use yii\web\Controller;
use Yii;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->renderPartial('index');
    }
    public function  actionLogin()
    {
         $request=Yii::$app->request;
        $model=new Admin();
         if($request->isPost)
         {
             $post=$request->post();
             if($model->login($post)){
                 $session=Yii::$app->session;
                 $this->redirect(['default/index']);
                 Yii::$app->end();
             }else{
                 return $this->renderPartial('login',['model'=>$model]);
             }
           //  $username=$_POST['Admin']['username'];
           //  $password=$_POST['Admin']['password'];
            //echo $_POST['Admin']['username'];
         }

        return $this->renderPartial('login',['model'=>$model]);
    }

    public function  actionLogout()
    {
        Yii::$app->session->destroy();
        $this->redirect(['default/login']);
    }
}
