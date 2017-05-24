<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ArxiusSo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="arxius-so-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'arxiu_nom')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'arxiu_path')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'arxiu_tags')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
