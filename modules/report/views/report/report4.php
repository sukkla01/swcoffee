<?php
$this->title = 'จำนวนผู้ป่วยในแยกรายเดือน';
$this->params['breadcrumbs'][] = $this->title;

use kartik\grid\GridView;
use miloschuman\highcharts\Highcharts;
use yii\helpers\Html;
?>
<div class="row">
    
    <div class="col-md-6">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="glyphicon glyphicon-signal"></i> ค่าเฉลี่ย CMI แยกรายเดือน</h3>
            </div>
            <div class="panel-body">
                <?php
                echo Highcharts::widget([
                    'options' => [
                        'title' => ['text' => '10 อันดับโรคผู้ป่วยใน'],
                        'xAxis' => [
                            'categories' => $DIAGCODE
                        ],
                        'yAxis' => [
                            'title' => ['text' => 'เฉลี่ย(คน)']
                        ],
                        'series' => [
                            ['type' => 'column',
                                'name' => 'cnt',
                                'data' => $cnt,
                            ],
                        ]
                    ]
                ]);
                ?>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="glyphicon glyphicon-signal"></i> นอนเฉลี่ยต่อราย</h3>
            </div>
            <div class="panel-body">
                <?php
                echo Highcharts::widget([
                    'options' => [
                        'title' => ['text' => 'นอนเฉลี่ยต่อราย'],
                        'xAxis' => [
                            'categories' => $DIAGCODE
                        ],
                        'yAxis' => [
                            'title' => ['text' => 'เฉลี่ย(คน)']
                        ],
                        'series' => [
                            ['type' => 'column',
                                'name' => 'sumadj',
                                'data' => $sumadj,
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
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'panel' => [
                'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> สรุปข้อมูลผู้ป่วยใน</h3>',
                'type' => 'success',
                //'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Create Country', ['create'], ['class' => 'btn btn-success']),
                'after' => Html::a('<i class="glyphicon glyphicon-repeat"></i> โหลดข้อมูลใหม่', ['/report/report/report4'], ['class' => 'btn btn-info']),
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
                    'label' => 'icd10',
                    'attribute' => 'DIAGCODE'
                ],
                [
                    'label' => 'ชื่อโรค',
                    'attribute' => 'diagename'
                ],
                [
                    'label' => 'จำนวนผู้ป่วยใน',
                    'attribute' => 'cnt'
                ],
                [
                    'label' => 'เฉลี่ยวันนอน',
                    'attribute' => 'sumadj',
                    'format' => ['decimal', 4]
                ],
                [
                    'label' => 'CMI',
                    'attribute' => 'cmi',
                    'format'=>['decimal',4]
                ],
            ]
        ]);
        ?>
    </div>
</div>