<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ArxiussoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="arxiusso-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'arxiu_id') ?>

    <?= $form->field($model, 'arxiu_nom') ?>

    <?= $form->field($model, 'arxiu_path') ?>

    <?= $form->field($model, 'arxiu_tags') ?>

    <?= $form->field($model, 'user_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
