<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CoffeeItems */

$this->title = 'Create Coffee Items';
$this->params['breadcrumbs'][] = ['label' => 'Coffee Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coffee-items-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
