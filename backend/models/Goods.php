<?php
/**
 * Created by PhpStorm.
 * User: 吕博文
 * Date: 2019/3/1
 * Time: 18:25
 */
namespace backend\models;
use yii\db\ActiveRecord;
use yii\data\Pagination;

class Goods extends ActiveRecord{

    public static function select_all()
    {
        $goods = Goods::find();
        $paginate = new Pagination([
            'defaultPageSize'=>5,
            'totalCount'=>$goods->count(),
        ]);

        $data = $goods->offset($paginate->offset)
                ->limit($paginate->limit)
                ->all();
        $goods = [];
        $goods['data'] = $data;
        $goods['paginate'] = $paginate;
        return $goods;


    }
}