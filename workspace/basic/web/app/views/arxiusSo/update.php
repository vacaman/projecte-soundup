<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ArxiusSo */

$this->title = 'Update Arxius So: ' . $model->arxiu_id;
$this->params['breadcrumbs'][] = ['label' => 'Arxius Sos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->arxiu_id, 'url' => ['view', 'id' => $model->arxiu_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="arxius-so-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
