<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CoffeeItemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Coffee Items';
$this->params['breadcrumbs'][] = 'รายการสินค้า';
?>
<div class="coffee-items-index">

    <h1><?= Html::encode('รายการสินค้า') ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Coffee Items', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'code',
            'name',
            'price',
            'detail',
            // 'image',
             'order_guide',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
