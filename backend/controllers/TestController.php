<?php
/**
 * Created by PhpStorm.
 * User: 吕博文
 * Date: 2019/3/1
 * Time: 15:32
 */
namespace backend\controllers;


use app\models\LoginForm;
use backend\test\Test;
use yii\web\Controller;
use backend\models\EntryForm;
use Yii;
use backend\models\Goods;
use yii\filters\VerbFilter;
use yii\web\IdentityInterface;

class TestController extends Controller{

    public function behaviors()
    {
        return [
            'verbs'=>[
                'class' => VerbFilter::className(), //类名
                'actions'=>[ //方法
                    //'index' => ['get'], //index方法只能用get请求，如果用post等就会报405
                    'ajaxreturn'=>['get','post'],
                ],
            ],
        ];
    }

    public function init(){
        $this->enableCsrfValidation = false;
    }

    public function actionTest($message = "hello")
    {
        return $this->render('test',['message'=>$message]);
    }

    public function actionEntryfrom()
    {
        $model =new EntryForm();
        //接收数据  并且调用验证
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            //print_r($model);
            return $this->render('entry-form',['model'=>$model]);
        }else{
            return $this->render('entry-fail',['model'=>$model]);
        }
    }

    /*
     *
     * 链接数据库进行处理查询
     */
    public function actionGoodslist()
    {
        $data = Goods::select_all();
        return $this->render('goods-list',['data'=>$data['data'],'pagination'=>$data['paginate']]);
    }

    /*
     *
     * 数据库修改
     */
    public function actionUpdate()
    {

      $number = ['goods_name'=>'haha1'];
      $data = Goods::updateAll($number,['id'=>32]);
      if($data){
          print_r($data);
      }else{
         print_r("修改失败");
      }
    }

    /*
     *
     * 数据库增加
     */
    public function actionInsert()
    {
        $goods = new Goods();
        $goods->goods_name = "哇哈哈";
        $goods->goods_price = 4554;
        $result = $goods->save();
        if($result){
            print_r($result);
        }else{
            print_r("添加失败");
        }
    }

    /*
     *
     * 数据库删除
     */
    public function actionDelete()
    {
        $result = Goods::findOne(['id'=>50])->delete();
        if($result){
            print_r($result);
        }else{
            print_r("删除失败");
        }
    }

    /*
     * 测试get方式路由参数
     */
    public function actionMember($number)
    {
        //$number = Yii::$app->get('number');
        print $number;
    }

    //前台页面a标签跳转路由测试
    public function actionAhref()
    {
        return $this->render('ahref');
    }

    public function actionPhref($id)
    {
        print_r($id);

    }


    /*
     * 表单post提交
     */
    public function actionForm()
    {
        $data = Yii::$app->request->post();
        print_r($data);
    }

    /*
     * session测试
     */
    public function actionSession()
    {
       $session = Yii::$app->session;
       $session['test'] = ['name'=>'hh','age'=>89];
       $session['test']=[
          'name'=>"jaa",
           'age'=>18
       ];
       print_r($session['test']);
       $session->remove('test');
       if($session->has('test')){
           print_r("存在");
       }else{
           print_r("不存在");
       }
    }

    public function actionCookie()
    {
        $cookies = Yii::$app->response->cookies;
        $cookie = Yii::$app->request->cookies;
        $cookies->add(new \yii\web\cookie([
            'name'=>'test',
            'value'=>"18",
            'expire'=>time()+3600*24
        ]));
        print_r($cookie->getValue("test"));
    }

    public function actionRedis()
    {
       $redis = Yii::$app->redis;
       $data = $redis->get('names');
       print_r($data);
    }

    public function actionAjaxreturn()
    {
      $arr = ['name'=>'张三','age'=>18];
      return json_encode($arr);
    }


    
}