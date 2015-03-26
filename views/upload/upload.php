<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\grid\GridView;
//echo $date1;
?>


<div class="row">
    <div class="col-md-12">

        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">จัดเก็บข้อมูล</h3>
            </div>
            <div class="panel-body">
                <div class="col-md-6">
                    <?php
                    $form = ActiveForm::begin([
                                'options' => [
                                    'enctype' => 'multipart/form-data'
                                ]
                            ])
                    ?>
                    <?= $form->field($model, 'file')->fileInput(); ?>
                </div> 
                <div class="col-md-6">
                    เลือกวันที่ :
                    <?php
                    
                    echo yii\jui\DatePicker::widget([
                        'name' => 'date1',
                        'value' => $date1,
                        'language' => 'th',
                        'dateFormat' => 'yyyy-MM-dd',
                        'clientOptions' => [
                            'changeMonth' => true,
                            'changeYear' => true,
                        ],
                    ]);
                    ?>
                </div>
                
            </div>

            &nbsp;&nbsp;&nbsp;<?= Html::submitButton('ส่งข้อมูล', ['class' => 'btn btn-success']); ?>
            
            <a class="btn btn-warning btn-xlarge" id="btn_1" href="http://203.157.82.68:8080/stimulja/?report=swcoffee_totalday.mrt&start=<?=$date1;?>" target="_blank"> 
                        <i class="glyphicon glyphicon-print"></i> พิมพ์  
            </a>
            <?php ActiveForm::end(); ?>
            
        </div>
        
    </div>



    <div class="col-md-12">
        <?php
        $this->title = 'อัพโหลดไฟล์';
        $this->params['breadcrumbs'][] = $this->title;
        $cdate = date("Y-m-d");
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
