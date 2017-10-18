<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "type_attr".
 *
 * @property integer $goods_attr_id
 * @property string $attr_name
 * @property string $attr_may_value
 * @property integer $attr_type
 * @property integer $sort
 * @property integer $goods_type_id
 *
 * @property GoodsAttrList[] $goodsAttrLists
 * @property GoodsType $goodsType
 */
class TypeAttr extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'type_attr';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['attr_name', 'attr_may_value', 'attr_type', 'goods_type_id'], 'required'],
            [['attr_type', 'sort', 'goods_type_id'], 'integer'],
            [['attr_name'], 'string', 'max' => 45],
            [['attr_may_value'], 'string', 'max' => 300],
            [['goods_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => GoodsType::className(), 'targetAttribute' => ['goods_type_id' => 'goods_type_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'goods_attr_id' => 'Goods Attr ID',
            'attr_name' => '参数名称',
            'attr_may_value' => '可选值',
            'attr_type' => '参数类型',
            'sort' => '排序',
            'goods_type_id' => 'Goods Type ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoodsAttrLists()
    {
        return $this->hasMany(GoodsAttrList::className(), ['goods_attr_id' => 'goods_attr_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoodsType()
    {
        return $this->hasOne(GoodsType::className(), ['goods_type_id' => 'goods_type_id']);
    }

    public function  baocun($data){
        if ($this->load($data)&&$this->validate()){
            return($this->save(false));
        }
    }
}
