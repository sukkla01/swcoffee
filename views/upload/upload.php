<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\grid\GridView;
?>


<div class="row">
    <div class="col-md-12">

        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">จัดเก็บข้อมูล</h3>
            </div>
            <div class="panel-body">
                <?php
                $form = ActiveForm::begin([
                            'options' => [
                                'enctype' => 'multipart/form-data'
                            ]
                        ])
                ?>
                <?= $form->field($model, 'file')->fileInput(); ?>
<?= Html::submitButton('ส่งข้อมูล', ['class' => 'btn btn-success']);
?>
<?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
    
    <div class="col-md-12">
        <?php
        $this->title = 'อัพโหลดไฟล์';
        $this->params['breadcrumbs'][] = $this->title;
        $cdate=date("Y-m-d");
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'panel' => [
                'heading' => "<h3 class='panel-title'><i class='glyphicon glyphicon-globe'></i>สรุปข้อมูลนำเข้า วันที่  $cdate </h3>",
                'type' => 'danger',
                //'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Create Country', ['create'], ['class' => 'btn btn-success']),
                'after' => Html::a('<i class="glyphicon glyphicon-repeat"></i> โหลดข้อมูลใหม่', ['/upload/upload'], ['class' => 'btn btn-info']),
                'footer' => false
            ],
            'responsive' => true,
            'hover' => true,
            'pjax' => true,
            'pjaxSettings' => [
                'neverTimeout' => true,
                'beforeGrid' => '',
                'afterGrid' => '',
            ],
            'showPageSummary' => true,
            'columns' => [
                //['class'=>'yii\grid\SerialColumn'],
               
                [
                    'label' => 'รหัส',
                    'attribute' => 'code'
                ],
                [
                    'label' => 'รายการ',
                    'attribute' => 'name'
                ],
                [
                    'label' => 'จำนวน/แก้ว',
                    'attribute' => 'qty'
                ],
                [
                    'label' => 'รวมราคา',
                    'attribute' => 'amount'
                ],
                [
                    'label' => 'แผนก',
                    'attribute' => 'dept'
                ],
                [
                    'label' => 'วันที่',
                    'attribute' => 'd_update'
                ],
                
                
            ]
        ]);
        ?>
    </div>
</div>