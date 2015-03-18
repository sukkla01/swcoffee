<?php
namespace app\controllers;
use yii\web\Controller;
use app\models\UploadForm;
use yii\web\UploadedFile;
use yii\data\ArrayDataProvider;
use Yii;

class UploadController extends Controller{
    public function actionUpload(){
        $model = new UploadForm;
        $connection = Yii::$app->db;
        if(Yii::$app->request->isPost){
            $model->file = UploadedFile::getInstance($model, 'file');
            if($model->file && $model->validate()){
                $model->file->saveAs(
                'uploads/coffee/'.$model->file->baseName.'_'.date("Ymd").'.'.$model->file->extension);
              
               $data = $connection->createCommand("DELETE FROM coffee_head WHERE concat(YEAR(d_update),MONTH(d_update),DAY(d_update))=concat(YEAR(CURDATE()),MONTH(CURDATE()),DAY(CURDATE())) ")->execute();
              $path= $model->file->baseName.'_'.date("Ymd").'.'.$model->file->extension;
              
              $sql="LOAD DATA LOCAL INFILE 'uploads/coffee/$path' REPLACE INTO TABLE coffee_head
                    FIELDS TERMINATED BY ',' 
                    ENCLOSED BY '\"' 
                    LINES TERMINATED BY '\r\n'
                    IGNORE 1 LINES  ";
              
              $data = $connection->createCommand($sql)->execute();
              $data = $connection->createCommand("DELETE FROM coffee_head WHERE name LIKE 'PLU%' ")->execute();
              $data = $connection->createCommand("UPDATE coffee_head SET d_update=NOW() WHERE d_update='' ")->execute();
                
                Yii::$app->session->setFlash('success', '!! อัพโหลดไฟล์เรียบร้อยแล้ว');
            }else{
                Yii::$app->session->setFlash('danger', 'ไม่สามารถอัพโหลดไฟล์ได้ หรือยังไม่ได้เลือกไฟล์ กรุณาติดต่อเจ้าหน้าที่ไอที');
            }
        }
        /*Yii::$app->session->setFlash('success', 'สำเร็จ');
        Yii::$app->session->setFlash('info', 'ข้อมูลเพิ่มเติม');
        Yii::$app->session->setFlash('warning', 'เตือน');
        Yii::$app->session->setFlash('danger', 'อันตราย');
        Yii::$app->session->setFlash('default', 'ปกติ');*/
    
        $data = $connection->createCommand('SELECT ch.code ,ci.name,ch.qty,ch.amount,ch.dept,ch.d_update
                        FROM coffee_head ch
                        INNER JOIN coffee_items ci ON ci.code=ch.code
                        WHERE concat(YEAR(d_update),MONTH(d_update),DAY(d_update))=concat(YEAR(CURDATE()),MONTH(CURDATE()),DAY(CURDATE())) ')
                ->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
            /*'pagination'=>[
                'pageSize'=>10
            ]*/
        ]);
       
        return $this->render('upload',
                ['dataProvider'=>$dataProvider,'model'=>$model]);
    }
}
