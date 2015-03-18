<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CoffeeItems */

$this->title = 'Update Coffee Items: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Coffee Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="coffee-items-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
