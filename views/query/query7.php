<?php


use miloschuman\highcharts\Highcharts;
use yii\helpers\Html;
use kartik\grid\GridView;

$this->title = 'รายงาน 10 อันดับขายดีประจำเดือน';
$this->params['breadcrumbs'][] = $this->title;
?>




<div class="col-md-12">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">แสดงข้อมูลประจำเดือน</h3>
        </div>
        <div class="panel-body">
            <?php
            echo Highcharts::widget([
                'options' => [
                    'title' => ['text' => '10 อันดับขายดีประจำเดือน'],
                    'xAxis' => [
                        'categories' => $name
                    ],
                    'yAxis' => [
                        'title' => ['text' => 'จำนวน/แก้ว']
                    ],
                    'series' => [
                        ['type' => 'column',
                            'name' => 'แก้ว',
                            'data' => $tcount,
                        ],
                    ]
                ]
            ]);
            ?>
        </div>
    </div>
</div>


<div class="col-md-12">
        <?php
     
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
                    'attribute' => 'tcount'
                ],
                [
                    'label' => 'รวมราคา',
                    'attribute' => 'tsum'
                ],
               
                
                
            ]
        ]);
        ?>
    </div>

<?php
?>