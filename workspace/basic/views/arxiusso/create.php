<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Arxiusso */

$this->title = 'Create Arxiusso';
$this->params['breadcrumbs'][] = ['label' => 'Arxiussos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="arxiusso-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
