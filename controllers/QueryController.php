<?php
//ดูเพิ่มเติมได้ที่
//http://www.bsourcecode.com/yiiframework2/select-query-sql-queries/
//http://www.yiiframework.com/doc-2.0/guide-db-query-builder.html
//http://stuff.cebe.cc/yii2docs/yii-db-query.html
namespace app\controllers;
use yii\web\Controller;
use app\models\Contact;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use Yii;
use yii\data\ArrayDataProvider;

class QueryController extends Controller{
    public function actionQuery1(){
        $data = Contact::find()
                ->where('id>2')
                ->orderBy('firstname','lastname');
        $dataProvider = new ActiveDataProvider([
            'query'=>$data,
        ]);
        
        return $this->render('query1',
                ['dataProvider'=>$dataProvider]);
    }
    public function actionQuery2(){
        $query = new Query;
        $query->select('*')
                ->from('contact')
                ->all();
        $dataProvider = new ActiveDataProvider([
            'query'=>$query,
            'pagination'=>[
                'pageSize'=>2
            ]
        ]);
        
        $query1 = new Query;
        $query1->select('firstname,lastname')
                ->from('contact')
                ->all();
        $dataProvider1 = new ActiveDataProvider([
            'query'=>$query1,
            'pagination'=>[
                'pageSize'=>3
            ]
        ]);
        return $this->render('query2',
                ['dataProvider'=>$dataProvider,
                 'contact'=>$dataProvider1
                    ]);
    }
    public function actionQuery3(){
        $connection = Yii::$app->db;
        $contact = $connection->createCommand('SELECT * FROM contact')
                ->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$contact,
            'pagination'=>[
                'pageSize'=>2
            ]
        ]);
        return $this->render('query3',['contact'=>$dataProvider]);
    }
    public function actionQuery4(){
        $connection = Yii::$app->db;
        $sql="SELECT YEAR(d_update) AS tyear,MONTH(d_update) AS tmonth,DAY(d_update) AS tday,SUM(qty) AS tsum
            FROM coffee_head 
            WHERE YEAR(d_update)='2015' AND MONTH(d_update)='3'
            GROUP BY d_update
            ORDER BY tday";
        $data = $connection->createCommand($sql)
                ->queryAll();
        
        for($i=0;$i<sizeof($data);$i++){
            $tyear[] = $data[$i]['tyear']+543;
            $tmonth[] = $data[$i]['tmonth'];
            $tday[] = $data[$i]['tday'];
            $tsum[] = $data[$i]['tsum'];
        }
        
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
            'pagination'=>[
                'pageSize'=>10
            ]
        ]);
        return $this->render('query4',['dataProvider'=>$dataProvider,
            'tyear'=>$tyear,'tmonth'=>$tmonth,'tday'=>$tday,'tsum'=>$tsum]);
    }
}