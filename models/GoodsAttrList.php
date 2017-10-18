<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "goods_attr_list".
 *
 * @property integer $attr_list_id
 * @property string $attr_value
 * @property string $goods_id
 * @property integer $goods_attr_id
 *
 * @property Goods $goods
 * @property TypeAttr $goodsAttr
 */
class GoodsAttrList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods_attr_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['goods_id', 'goods_attr_id'], 'required'],
            [['goods_id', 'goods_attr_id'], 'integer'],
            [['attr_value'], 'string', 'max' => 45],
            [['goods_id'], 'exist', 'skipOnError' => true, 'targetClass' => Goods::className(), 'targetAttribute' => ['goods_id' => 'goods_id']],
            [['goods_attr_id'], 'exist', 'skipOnError' => true, 'targetClass' => TypeAttr::className(), 'targetAttribute' => ['goods_attr_id' => 'goods_attr_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'attr_list_id' => 'Attr List ID',
            'attr_value' => 'Attr Value',
            'goods_id' => 'Goods ID',
            'goods_attr_id' => 'Goods Attr ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoods()
    {
        return $this->hasOne(Goods::className(), ['goods_id' => 'goods_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoodsAttr()
    {
        return $this->hasOne(TypeAttr::className(), ['goods_attr_id' => 'goods_attr_id']);
    }
}
