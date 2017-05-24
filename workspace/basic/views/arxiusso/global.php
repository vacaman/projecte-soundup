<?php

use yii\helpers\Html;
use yii\grid\GridView;

/** @var $this yii\web\View $this
/* @var $searchModel app\models\ArxiussoSearch 
/* @var $dataProvider yii\data\ActiveDataProvider 
/* @var $model app\models\Arxiusso */

$this->title = 'Arxiusso';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="arxiusso-index">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Arxiusso', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php if (!empty($profile->arxiu_id)): ?>
            <li>
               <i class="glyphicon glyphicon-envelope text-muted"></i> <?= Html::a(Html::encode($profile->arxiu_id)) ?>
            </li>
    <?php endif; ?>
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
