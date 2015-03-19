<?php
/* @var $this yii\web\View */
$this->title = 'MOPH Report';

Yii::$app->db->open();
use yii\helpers\Html;
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>SW COFFEE</h1>

        <p class="lead">ระบบจัดการร้านกาแฟของโรงพยาบาลศรีสังวรสุโขทัย</p>

        <p>
        <?= Html::a('หน้าหลัก', ['/widgets/list'], ['class'=>'btn btn-lg btn-success']);?>
        </p>
    </div>

    
</div>
<?php
//echo Yii::$app->security->generatePasswordHash('manop');