<?php
/**
 * Created by PhpStorm.
 * User: 吕博文
 * Date: 2019/3/1
 * Time: 18:37
 */
use yii\helpers\Html;
use yii\widgets\LinkPager;
;?>
<ul>
    <?php foreach ($data as $v):?>
        <li>
            <?=Html::encode("{$v->goods_name}{$v->goods_price}");?>
        </li>
    <?php endforeach;?>
</ul>
<?=LinkPager::widget(['pagination'=>$pagination]);?>
