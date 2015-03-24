<?php

use yii\grid\GridView;
use miloschuman\highcharts\Highcharts;
use yii\helpers\Html;

$this->title = 'รายงานประจำเดือน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-12">
    <div class="panel panel-danger">
        <div class="panel-heading">
            <h3 class="panel-title">ค้นหาข้อมูล</h3>
        </div>
        <div class="panel-body">
            <div class="col-md-12">
                <?php
                if (isset($_POST['year'])) {
                    $y = $_POST['year'];
                } else {
                    $y = date('Y');
                }
                ?>
                <?php
                $cyear = date('Y');
                ?>
                <?= Html::beginForm(); ?>
                <?=
                Html::dropDownList('year', $y, [$cyear - 3 => ($cyear - 3) + 543,
                    $cyear - 2 => ($cyear - 2) + 543,
                    $cyear - 1 => ($cyear - 1) + 543,
                    $cyear => ($cyear) + 543], ['class' => 'form-control', 'prompt' => 'โปรดเลือกปี', 'required' => true]);
                ?>

                <?= Html::submitButton('ค้นหา', ['class' => 'btn btn-success']); ?>
                <?= Html::endForm(); ?>
            </div>
            

        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">ค้นหาข้อมูล</h3>
        </div>
        <div class="panel-body">
            <?php
            echo Highcharts::widget([
                'options' => [
                    'title' => ['text' => 'จำนวนการขายกาแฟต่อเดือน'],
                    'xAxis' => [
                        'categories' => $tmonth
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

<?php ?>