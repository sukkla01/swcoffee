<?php
namespace app\controllers;

use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use app\models\Contact;
use app\models\CoffeeItems;
use yii\db\Query;
use yii;

class WidgetsController extends Controller{
    
    public function actionGrid(){
        $dataProvider = new ActiveDataProvider([
            'query'=>Contact::find(),
        ]);
        return $this->render('grid',['dataProvider'=>$dataProvider]);
    }
    
    
    public function actionList(){
        $dataProvider = new ActiveDataProvider([
            'query'=>  CoffeeItems::find(),
            'pagination'=>[
                'pageSize'=>12
            ]
        ]);
       
        $dataProvider1 = new ActiveDataProvider([
            'query'=>  CoffeeItems::find()
                     ->where('order_guide<>'".Y."'"),
            'pagination'=>[
                'pageSize'=>8
            ]
        ]);
       
        return $this->render('list',['dataProvider'=>$dataProvider,
            'dataProvider1'=>$dataProvider1
            ]);
    }
    
    
    
    public function actionDetail($id){
        $model = Contact::findOne($id);
        return $this->render('detail',['model'=>$model]);
    }
}