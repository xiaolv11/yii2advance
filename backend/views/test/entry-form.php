<?php
/**
 * Created by PhpStorm.
 * User: 吕博文
 * Date: 2019/3/1
 * Time: 17:16
 */
use yii\helpers\Html;
;?>
<p>You You have entered the following information:</p>
<ul>
    <li><label>Name</label>: <?=Html::encode($model->name);?></li>
    <li><label>Email</label>:<?=Html::encode($model->email);?></li>
</ul>
