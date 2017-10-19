<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "goods".
 *
 * @property string $goods_id
 * @property integer $admin_user_id
 * @property integer $goods_type_id
 * @property integer $brand_id
 * @property integer $category_id
 * @property string $goods_name
 * @property string $goods_style_name
 * @property string $promote_word
 * @property string $goods_sn
 * @property string $goods_price
 * @property integer $is_promote
 * @property integer $promote_stime
 * @property integer $promote_etime
 * @property string $promote_price
 * @property integer $is_hot
 * @property integer $is_first
 * @property integer $is_well
 * @property integer $is_on_sale
 * @property integer $created
 * @property integer $updated
 * @property integer $view
 * @property string $small_pic
 * @property string $medium_pic
 * @property string $source_pic
 * @property integer $sku
 *
 * @property Gallery[] $galleries
 * @property Admin $adminUser
 * @property Brand $brand
 * @property Category $category
 * @property GoodsType $goodsType
 * @property GoodsAttrList[] $goodsAttrLists
 * @property GoodsContent[] $goodsContents
 * @property Product[] $products
 */
class Goods extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'brand_id', 'category_id'], 'required'],
            [['admin_user_id', 'goods_type_id', 'brand_id', 'category_id', 'is_promote', 'promote_stime', 'promote_etime', 'is_hot', 'is_first', 'is_well', 'is_on_sale', 'created', 'updated', 'view', 'sku'], 'integer'],
            [['goods_price', 'promote_price'], 'number'],
            [['goods_name', 'promote_word', 'goods_sn', 'small_pic', 'medium_pic', 'source_pic'], 'string', 'max' => 45],
            [['admin_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Admin::className(), 'targetAttribute' => ['admin_user_id' => 'user_id']],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brand::className(), 'targetAttribute' => ['brand_id' => 'brand_id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'category_id']],
            [['goods_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => GoodsType::className(), 'targetAttribute' => ['goods_type_id' => 'goods_type_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'goods_id' => 'Goods ID',
            'admin_user_id' => 'Admin User ID',
            'goods_type_id' => 'Goods Type ID',
            'brand_id' => '品牌',
            'category_id' => '分类',
            'goods_name' => '商品名称',
            'goods_style_name' => 'Goods Style Name',
            'promote_word' => '推广词',
            'goods_sn' => '货号',
            'goods_price' => '商店价',
            'is_promote' => 'Is Promote',
            'promote_stime' => 'Promote Stime',
            'promote_etime' => 'Promote Etime',
            'promote_price' => 'Promote Price',
            'is_hot' => 'Is Hot',
            'is_first' => 'Is First',
            'is_well' => 'Is Well',
            'is_on_sale' => 'Is On Sale',
            'created' => 'Created',
            'updated' => 'Updated',
            'view' => 'View',
            'small_pic' => 'Small Pic',
            'medium_pic' => 'Medium Pic',
            'source_pic' => 'Source Pic',
            'sku' => '库存',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGalleries()
    {
        return $this->hasMany(Gallery::className(), ['goods_id' => 'goods_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdminUser()
    {
        return $this->hasOne(Admin::className(), ['user_id' => 'admin_user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(Brand::className(), ['brand_id' => 'brand_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['category_id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoodsType()
    {
        return $this->hasOne(GoodsType::className(), ['goods_type_id' => 'goods_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoodsAttrLists()
    {
        return $this->hasMany(GoodsAttrList::className(), ['goods_id' => 'goods_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoodsContents()
    {
        return $this->hasMany(GoodsContent::className(), ['goods_id' => 'goods_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['goods_id' => 'goods_id']);
    }
}
