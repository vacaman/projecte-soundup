<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ArxiusSo */

$this->title = $model->arxiu_id;
$this->params['breadcrumbs'][] = ['label' => 'Arxius Sos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="arxius-so-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->arxiu_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->arxiu_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'arxiu_id',
            'arxiu_nom',
            'arxiu_path',
            'arxiu_tags',
            'user_id',
        ],
    ]) ?>

</div>
