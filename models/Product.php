<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $product_id
 * @property integer $sku
 * @property string $price
 * @property string $goods_sn
 * @property string $attr_list
 * @property string $goods_id
 *
 * @property Goods $goods
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sku', 'goods_id'], 'required'],
            [['sku', 'goods_id'], 'integer'],
            [['price'], 'number'],
            [['goods_sn'], 'string', 'max' => 45],
            [['attr_list'], 'string', 'max' => 80],
            [['goods_id'], 'exist', 'skipOnError' => true, 'targetClass' => Goods::className(), 'targetAttribute' => ['goods_id' => 'goods_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'sku' => 'Sku',
            'price' => 'Price',
            'goods_sn' => 'Goods Sn',
            'attr_list' => 'Attr List',
            'goods_id' => 'Goods ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoods()
    {
        return $this->hasOne(Goods::className(), ['goods_id' => 'goods_id']);
    }
}
