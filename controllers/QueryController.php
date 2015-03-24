<?php



namespace app\controllers;

use yii\web\Controller;
use app\models\Contact;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use Yii;
use yii\data\ArrayDataProvider;

class QueryController extends Controller {

    public function actionQuery1() {
        $data = Contact::find()
                ->where('id>2')
                ->orderBy('firstname', 'lastname');
        $dataProvider = new ActiveDataProvider([
            'query' => $data,
        ]);

        return $this->render('query1', ['dataProvider' => $dataProvider]);
    }

    public function actionQuery2() {
        $query = new Query;
        $query->select('*')
                ->from('contact')
                ->all();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 2
            ]
        ]);

        $query1 = new Query;
        $query1->select('firstname,lastname')
                ->from('contact')
                ->all();
        $dataProvider1 = new ActiveDataProvider([
            'query' => $query1,
            'pagination' => [
                'pageSize' => 3
            ]
        ]);
        return $this->render('query2', ['dataProvider' => $dataProvider,
                    'contact' => $dataProvider1
        ]);
    }

    public function actionQuery3() {
        $connection = Yii::$app->db;
        $contact = $connection->createCommand('SELECT * FROM contact')
                ->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels' => $contact,
            'pagination' => [
                'pageSize' => 2
            ]
        ]);
        return $this->render('query3', ['contact' => $dataProvider]);
    }

    public function actionQuery4() {
        $tyear[] = '';
        $tmonth[] = '';
        $tday[] = '';
        $tsum[] = '';
        if (isset($_POST['year'])) {
            $twhere = "  AND YEAR(d_update)='" . $_POST['year'] . "' AND MONTH(d_update)='" . $_POST['month'] . "' ";
        } else {
            $twhere = "  AND YEAR(d_update)=YEAR(curdate()) AND MONTH(d_update)=MONTH(curdate()) ";
        }
        $connection = Yii::$app->db;
        $sql = "SELECT YEAR(d_update) AS tyear,MONTH(d_update) AS tmonth,DAY(d_update) AS tday,SUM(qty) AS tsum
            FROM coffee_head 
            WHERE 1=1 $twhere
            GROUP BY d_update
            ORDER BY tday";
        $data = $connection->createCommand($sql)
                ->queryAll();

        for ($i = 0; $i < sizeof($data); $i++) {
            $tyear[] = $data[$i]['tyear'] + 543;
            $tmonth[] = $data[$i]['tmonth'];
            $tday[] = $data[$i]['tday'];
            $tsum[] = $data[$i]['tsum'];
        }



        $dataProvider = new ArrayDataProvider([
            'allModels' => $data,
            'pagination' => [
                'pageSize' => 10
            ]
        ]);

        return $this->render('query4', ['dataProvider' => $dataProvider,
                    'tyear' => $tyear, 'tmonth' => $tmonth, 'tday' => $tday, 'tsum' => $tsum]);
    }

    public function actionQuery5() {
        $tyear[] = '';
        $tmonth[] = '';
        $tday[] = '';
        $tsum[] = '';
        if (isset($_POST['year'])) {
            $twhere = "   YEAR(d_update)='" . $_POST['year'] . "'  ";
        } else {
            $twhere = "   YEAR(d_update)=YEAR(curdate())  ";
        }

        $connection = Yii::$app->db;
        $sql = "SELECT YEAR(d_update) AS tyear,MONTH(d_update) AS tmonth,DAY(d_update) AS tday,SUM(qty) AS tsum,
                CONCAT(YEAR(d_update),MONTH(d_update)) AS  groupmonth
                FROM coffee_head 
                WHERE $twhere 
                GROUP BY groupmonth
                ORDER BY tmonth";
        $data = $connection->createCommand($sql)
                ->queryAll();

        for ($i = 0; $i < sizeof($data); $i++) {
            $tyear[] = $data[$i]['tyear'] + 543;
            $tmonth[] = $data[$i]['tmonth'];
            $tday[] = $data[$i]['tday'];
            $tsum[] = $data[$i]['tsum'];
        }

        $dataProvider = new ArrayDataProvider([
            'allModels' => $data,
            'pagination' => [
                'pageSize' => 10
            ]
        ]);
        return $this->render('query5', ['dataProvider' => $dataProvider,
                    'tyear' => $tyear, 'tmonth' => $tmonth, 'tday' => $tday, 'tsum' => $tsum]);
    }

    public function actionQuery6() {
        $connection = Yii::$app->db;
        $sql = "SELECT YEAR(d_update) AS tyear,MONTH(d_update) AS tmonth,DAY(d_update) AS tday,SUM(qty) AS tsum,
YEAR(d_update)  groupyear
FROM coffee_head 
#WHERE YEAR(d_update)='2015' AND MONTH(d_update)='3'
GROUP BY groupyear
ORDER BY groupyear
LIMIT 5";
        $data = $connection->createCommand($sql)
                ->queryAll();

        for ($i = 0; $i < sizeof($data); $i++) {
            $tyear[] = $data[$i]['tyear'] + 543;
            $tmonth[] = $data[$i]['tmonth'];
            $tday[] = $data[$i]['tday'];
            $tsum[] = $data[$i]['tsum'];
        }

        $dataProvider = new ArrayDataProvider([
            'allModels' => $data,
            'pagination' => [
                'pageSize' => 10
            ]
        ]);
        return $this->render('query6', ['dataProvider' => $dataProvider,
                    'tyear' => $tyear, 'tmonth' => $tmonth, 'tday' => $tday, 'tsum' => $tsum]);
    }
    
     public function actionQuery7() {
        $connection = Yii::$app->db;
        $sql = "SELECT ch.code,ci.name,sum(ch.qty) AS tcount,SUM(ch.amount) AS tsum
FROM coffee_head ch 
LEFT JOIN coffee_items ci ON ci.code=ch.code
WHERE MONTH(d_update)='3'
GROUP BY code
ORDER BY tcount DESC
LIMIT 10 ";
        $data = $connection->createCommand($sql)
                ->queryAll();

        for ($i = 0; $i < sizeof($data); $i++) {
            $code[] = $data[$i]['code'] + 543;
            $name[] = $data[$i]['name'];
            $tcount[] = $data[$i]['tcount'];
            $tsum[] = $data[$i]['tsum'];
        }

        $dataProvider = new ArrayDataProvider([
            'allModels' => $data,
            'pagination' => [
                'pageSize' => 10
            ]
        ]);
        return $this->render('query7', ['dataProvider' => $dataProvider,
                    'code' => $code, 'name' => $name, 'tcount' => $tcount, 'tsum' => $tsum]);
    }

}
