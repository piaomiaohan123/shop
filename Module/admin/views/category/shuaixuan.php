<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/18
 * Time: 21:57
 */
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>


<?php  $form=ActiveForm::begin(['method'=>'post'])?>
<?=$form->field($model,'filter_attr')->checkboxList($data,['value'=>$xuanzhong]);?>
<?=$form->field($model,'category_id')->hiddenInput(['value'=>$_GET['category_id']])?>
<?= Html::submitButton('新增筛选条件', ['class' => 'btn btn-default']) ?>
<?php  ActiveForm::end();?>
