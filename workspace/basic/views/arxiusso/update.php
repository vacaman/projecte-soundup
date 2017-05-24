<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Arxiusso */

$this->title = 'Update Arxiusso: ' . $model->arxiu_id;
$this->params['breadcrumbs'][] = ['label' => 'Arxiussos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->arxiu_id, 'url' => ['view', 'id' => $model->arxiu_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="arxiusso-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
