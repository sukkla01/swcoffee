<?php

use yii\grid\GridView;
use miloschuman\highcharts\Highcharts;
use yii\helpers\Html;


$this->title = 'รายงานประจำวัน';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="col-md-12">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h3 class="panel-title">ค้นหาข้อมูล</h3>
            </div>
            <div class="panel-body">
                <div class="col-md-6">
                <?php
                if(isset($_POST['year'])){
                    $y=$_POST['year'];
                }else{
                    $y=date('Y');
                }
                ?>
                 <?php  
                 $cyear=date('Y');
                 ?>
                <?= Html::beginForm();?>
                <?= Html::dropDownList('year',$y,
                        [$cyear-3=>($cyear-3)+543,
                        $cyear-2=>($cyear-2)+543,
                        $cyear-1=>($cyear-1)+543,
                        $cyear=>($cyear)+543],['class'=>'form-control','prompt'=>'โปรดเลือกปี','required'=>true]);?>
               
               
                </div>
                <div class="col-md-6">
                <?php
                if(isset($_POST['month'])){
                    $m=$_POST['month'];
                }else{
                    $m=date('m');
                }
                ?>
               
              
                <?= Html::dropDownList('month',$m,[
                        '1'=>'มกราคม',
                        '2'=>'กุมภาพันธ์',
                        '3'=>'มีนาคม',
                        '4'=>'เมษายน',
                        '5'=>'พฤษภาคม',
                        '6'=>'มิถุนายน',
                        '7'=>'กรกฏาคม',
                        '8'=>'สิงหาคม',
                        '9'=>'กันยายน',
                        '10'=>'ตุลาคม',
                        '11'=>'พฤษศจิกายน',
                        '12'=>'ธันวาคม'],['class'=>'form-control','prompt'=>'โปรดเลือกเดือน','required'=>true]);?>
                
                
                </div>
                 <?= Html::submitButton('ค้นหา',['class'=>'btn btn-success']);?>
                <?= Html::endForm();?>
            </div>
        </div>
    </div>

<div class="col-md-12">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">แสดงข้อมูล ปี <?=$y;?> เดือน <?=$m;?></h3>
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