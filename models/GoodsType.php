<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "goods_type".
 *
 * @property integer $goods_type_id
 * @property string $type_name
 *
 * @property Goods[] $goods
 * @property TypeAttr[] $typeAttrs
 */
class GoodsType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_name'], 'required'],
            [['type_name'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'goods_type_id' => 'Goods Type ID',
            'type_name' => '类型名称',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoods()
    {
        return $this->hasMany(Goods::className(), ['goods_type_id' => 'goods_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTypeAttrs()
    {
        return $this->hasMany(TypeAttr::className(), ['goods_type_id' => 'goods_type_id']);
    }
    public function  baocun($data)
    {
        if ($this->load($data)&&$this->validate()){
            return ($this->save(false));
        }

    }
}
