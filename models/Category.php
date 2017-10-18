<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $category_id
 * @property string $category_name
 * @property integer $category_pid
 * @property string $keywords
 * @property string $desc
 * @property integer $is_nav
 * @property integer $sort
 * @property string $filter_attr
 *
 * @property Goods[] $goods
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_name','filter_attr'], 'required'],
            [['category_pid', 'is_nav', 'sort'], 'integer'],
            [['category_name', 'keywords', 'desc'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'Category ID',
            'category_name' => 'Category Name',
            'category_pid' => 'Category Pid',
            'keywords' => 'Keywords',
            'desc' => 'Desc',
            'is_nav' => 'Is Nav',
            'sort' => 'Sort',
            'filter_attr' => 'Filter Attr',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoods()
    {
        return $this->hasMany(Goods::className(), ['category_id' => 'category_id']);
    }
    public function  wuxian()
    {
        $data=self::find()->asArray()->all();
        $tree=$this->_wuxian($data);
        return $tree;
    }

    private  function  _wuxian($data,$pid=0,$level=0)
    {
        static $result=array();
        foreach ($data as $v) {
            if ($v['category_pid']==$pid){
                $v['level']=$level;
                $result[]=$v;

                $this->_wuxian($data,$v['category_id'],$level+1);
            }
        }
        return $result;
    }
    public function  baocun($data)
    {
        if ($this->load($data)&&$this->validate()){
            $category_id=$data['Category']['category_id'];
            $model = self::findOne($category_id);
            $model->filter_attr=implode(',',$data['Category']['filter_attr']);
            $model->update();
            return (bool)Yii::$app->db->getLastInsertID();

        }

    }
}
