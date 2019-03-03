<?php
/**
 * Created by PhpStorm.
 * User: 吕博文
 * Date: 2019/3/3
 * Time: 13:46
 */
namespace backend\test;
use yii\base\model;

class Test extends model{
    public $id;
    public function rules()
    {
       return[['id'], 'integer'];
    }
}