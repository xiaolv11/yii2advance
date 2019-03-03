<?php
/**
 * Created by PhpStorm.
 * User: 吕博文
 * Date: 2019/3/1
 * Time: 16:47
 */
namespace backend\models;
//yii\base\Model代表是个模型但与数据表无关
//yii\db\ActiveRecord 是与数据库有关
use yii\base\Model;

class EntryForm extends Model{


    public $name;
    public $email;

    public function rules()
    {
        return [
            [['name','email'],'required'],
            ['email','email']
        ];
    }
}