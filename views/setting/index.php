<?php
/* @var $this yii\web\View */
$this->title = 'ตั่งค่า';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1>ตั่งค่า</h1>
<div class="row">
    <div class="col-md-12 centered">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title">แสดงข้อมูลประจำเดือน</h3>
            </div>
            <div class="panel-body">
                <div class="col-sm-4">
                    <?php
                    $route = \Yii::$app->urlManager->createUrl('user/register');
                    ?>
                    <a class="btn btn-success btn-xlarge" id="btn_1" href="<?= $route ?>"> 
                        <i class="glyphicon glyphicon-cog"></i>  เพิ่ม user  
                    </a>

                </div>
                <div class="col-sm-4">
                    <?php
                    $route = \Yii::$app->urlManager->createUrl('user/admin');
                    ?>
                    <a class="btn btn-warning btn-xlarge" id="btn_1" href="<?= $route ?>"> 
                        <i class="glyphicon glyphicon-cog"></i>  กำหนดรายละเอียด user   
                    </a>

                </div>
                <div class="col-sm-4">
                    <?php
                    $route = \Yii::$app->urlManager->createUrl('coffeeitems/');
                    ?>
                    <a class="btn btn-info btn-xlarge" id="btn_1" href="<?= $route ?>"> 
                        <i class="glyphicon glyphicon-cog"></i>  กำหนดรายละเอียดกาแฟ   
                    </a>

                </div>
            </div>

        </div>
    </div>
</div>

