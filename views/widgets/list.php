
<?php
use yii\widgets\ListView;
?>


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title">สินค้าแนะนำ</h3>
            </div>
            <div class="panel-body">
                <?php

                

echo ListView::widget([
                    'dataProvider' => $dataProvider1,
                    'itemView' => '_contact',
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
                ]);
                ?>
            </div>
        </div>
    </div>
</div>
