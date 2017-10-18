<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "brand".
 *
 * @property integer $brand_id
 * @property string $brand_name
 * @property string $brand_name_en
 * @property string $desc
 * @property integer $status
 * @property string $website
 *
 * @property Goods[] $goods
 */
class Brand extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'brand';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['brand_name'], 'required'],
            [['status'], 'integer'],
            [['brand_name', 'brand_name_en'], 'string', 'max' => 45],
            [['desc'], 'string', 'max' => 200],
            [['website'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'brand_id' => 'Brand ID',
            'brand_name' => 'Brand Name',
            'brand_name_en' => 'Brand Name En',
            'desc' => 'Desc',
            'status' => 'Status',
            'website' => 'Website',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoods()
    {
        return $this->hasMany(Goods::className(), ['brand_id' => 'brand_id']);
    }
}
