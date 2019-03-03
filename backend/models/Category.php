<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tpshop_category".
 *
 * @property string $id
 * @property string $cate_name 分类名称
 * @property int $pid 父级分类
 * @property int $is_show 是否显示 0不显示 1显示
 * @property string $create_time
 * @property string $update_time
 * @property string $delete_time
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tpshop_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pid', 'is_show', 'create_time', 'update_time', 'delete_time'], 'integer'],
            [['cate_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cate_name' => 'Cate Name',
            'pid' => 'Pid',
            'is_show' => 'Is Show',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'delete_time' => 'Delete Time',
        ];
    }
}
