<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArxiusSoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Arxius Sos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="arxius-so-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Arxius So', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'arxiu_id',
            'arxiu_nom',
            'arxiu_path',
            'arxiu_tags',
            'user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
