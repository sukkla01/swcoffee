
<?php
use yii\widgets\ListView;

$this->title = 'รายการสินค้า';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="row">
    <div class="col-md-12 centered">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title">สินค้าแนะนำ</h3>
            </div>
            <div class="panel-body">
                <?php

                

echo ListView::widget([
                    'dataProvider' => $dataProvider1,
                    'itemView' => '_coffee',
                ]);
                ?>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">สินค้าทั้งหมด</h3>
            </div>
            <div class="panel-body">
                <?php

               

echo ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => '_contact',
                    //'Options'=>['class'=>'text-right']
                ]);
                ?>
            </div>
        </div>
    </div>
</div>
