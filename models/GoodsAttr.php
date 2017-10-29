<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "goods_attr".
 *
 * @property string $id
 * @property integer $goods_id
 * @property integer $attr_id
 * @property string $attr_value
 */
class GoodsAttr extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods_attr';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['goods_id', 'attr_id'], 'required'],
            [['goods_id', 'attr_id'], 'integer'],
            [['attr_value'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'goods_id' => 'Goods ID',
            'attr_id' => 'Attr ID',
            'attr_value' => 'Attr Value',
        ];
    }
}
