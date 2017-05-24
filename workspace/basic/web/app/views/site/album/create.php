<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ArxiusSo */

$this->title = 'Create Arxius So';
$this->params['breadcrumbs'][] = ['label' => 'Arxius Sos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="arxius-so-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
