<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Arxiusso;

/* @var $this yii\web\View */
/* @var $model app\models\Arxiusso */

$this->title = $model->arxiu_nom;
$this->params['breadcrumbs'][] = ['label' => 'Arxius de so', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="arxiusso-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        
        <?php 
        // Si l'usuari és propietari o és admin
        if(Yii::$app->user->getId() == $model->user_id || Yii::$app->user->identity->isAdmin): ?>
        <?= Html::a('Esborra', ['delete', 'id' => $model->arxiu_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Estas segur que vols esborrar aquest arxiu?',
                'method' => 'post',
            ],
        ]) ?>
        <?php endif; ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'arxiu_nom',
            'arxiu_tags',
        ],
    ]) 
    
    ?>
    
    <audio controls>
        <?= "<source src='../web/".$model["arxiu_path"]."' type='audio/mpeg'>"; ?>
    </audio>
    
</div>

<!-- Botons per compartir enllaç per les xarxes socials -->
<div>
    <?= \imanilchaudhari\socialshare\ShareButton::widget([
        'style'=>'horizontal',
        'networks' => ['facebook','googleplus','linkedin','twitter'],
        'data_via'=>'imanilchaudhari', //twitter username (for twitter only, if exists else leave empty)
]); ?>
    
</div>

<!-- Espai per posar comentaris sobre l'arxiu -->
<?php
    $model = Arxiusso::find()->where(['arxiu_id' => $model->arxiu_id])->one();
     // and just put your model to the widget.
        echo \yii2mod\comments\widgets\Comment::widget([
            'model' => $model,
            'entityIdAttribute'=> 'arxiu_id',
            
     ]);
 ?>