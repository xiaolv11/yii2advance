<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tpshop_auth".
 *
 * @property int $id
 * @property string $auth_name 权限名称
 * @property int $pid 父id
 * @property string $auth_c 控制器
 * @property string $auth_a 操作方法
 * @property int $is_nav 是否作为菜单显示 1是 0否
 * @property string $create_time
 * @property string $update_time
 * @property string $delete_time
 */
class Auth extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tpshop_auth';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['auth_name', 'pid'], 'required'],
            [['pid', 'is_nav', 'create_time', 'update_time', 'delete_time'], 'integer'],
            [['auth_name'], 'string', 'max' => 20],
            [['auth_c', 'auth_a'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'auth_name' => 'Auth Name',
            'pid' => 'Pid',
            'auth_c' => 'Auth C',
            'auth_a' => 'Auth A',
            'is_nav' => 'Is Nav',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'delete_time' => 'Delete Time',
        ];
    }
}
