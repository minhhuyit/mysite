<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_info".
 *
 * @property integer $id
 * @property integer $username
 * @property integer $fullname
 * @property integer $password
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['username', 'fullname', 'password'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'User Name',
            'fullname' => 'Full Name',
            'password' => 'Password',
        ];
    }

    public function checkExistUser($username, $password){
        $model = User::findAll(['username'=>$username, 'password'=>$password]);
        if($model){
            return true;
        } else {
            return false;
        }
    }
}
