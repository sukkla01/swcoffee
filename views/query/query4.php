<?php
use yii\grid\GridView;
use miloschuman\highcharts\Highcharts;
use yii\helpers\Html;

?>

<div class="col-md-12">
    <div class="panel panel-info">
       <div class="panel-heading">
                <h3 class="panel-title">ค้นหาข้อมูล</h3>
            </div>
        <div class="panel-body">
            <?php
                echo Highcharts::widget([
                    'options' => [
                        'title' => ['text' => 'จำนวนการขายกาแฟต่อวัน'],
                        'xAxis' => [
                            'categories' => $tday
                        ],
                        'yAxis' => [
                            'title' => ['text' => 'จำนวน/แก้ว']
                        ],
                        'series' => [
                            ['type' => 'column',
                                'name' => 'แก้ว',
                                'data' => $tsum,
                            ],
                        ]
                    ]
                ]);
                ?>
        </div>
    </div>
</div>

<?php




?>