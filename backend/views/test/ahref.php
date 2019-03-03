<?php
/**
 * Created by PhpStorm.
 * User: 吕博文
 * Date: 2019/3/2
 * Time: 17:56
 */
use yii\helpers\Url;
use yii\helpers\Html;

;?>

<?=Html::a("测试",['/phref/56']);?>
<a href="<?=Url::to(['/test/phref/']);?>">测试</a>

<form action="<?=Url::to(['test/form']);?>" enctype="multipart/form-data" method="post">
    <input type="hidden" name="_csrf-backend" value="<?=Yii::$app->request->csrfToken;?>">
    "姓名:"<input type="text" name="name" value=""></br>
    <br>
    "年龄:"<input type="text" name="age" value=""><br><br>
    "提交:"<button type="submit" value="" class="btn btn-primary radius">提交</button>
</form>
