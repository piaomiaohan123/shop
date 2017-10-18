<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property integer $user_id
 * @property string $username
 * @property string $password
 * @property string $last_ip
 * @property integer $last_login
 * @property string $note
 * @property integer $created
 * @property integer $ban
 *
 * @property Goods[] $goods
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['last_login', 'created', 'ban'], 'integer'],
            ['password','validatePass']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'username' => '用户名',
            'password' => '密码',
            'last_ip' => 'Last Ip',
            'last_login' => 'Last Login',
            'note' => 'Note',
            'created' => 'Created',
            'ban' => 'Ban',
        ];
    }



    public function  validatePass()
    {
        if (!$this->hasErrors())
        {
            $data=self::find()->where('username=:user and password=:pass',[":user"=>$this->username,":pass"=>md5($this->password)])->one();
            if (is_null($data)){
                $this->addError("userpass", "用户名或者密码错误");
                 Yii::$app->session->setFlash('userpass','用户名或者密码错误');
            }
        }
    }

    public  function  login($data)
    {
       if($this->load($data)&&$this->validate()){
                $lifetime=24*3600;
                $session=Yii::$app->session;
                session_set_cookie_params($lifetime);
                $session['admin']=[
                    'username'=>$this->username,
                    'isLogin'=>1,

                ];

                return  (bool)$session['admin']['isLogin'];
          }
          return false;


    }
}
