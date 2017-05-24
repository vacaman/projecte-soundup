<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\User;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="../web/img/favicon.png"/>
    <link rel="stylesheet" href="../web/css/font-awesome/css/font-awesome.min.css">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '<img src="../web/img/logo_soundup_blanc.svg" width="70%">',
        'brandUrl' => Yii::$app->homeUrl,
        
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
            
        ],
        
    ]);
    
    $navItems=[
        ['label' => 'Inici', 'url' => ['/site/index']],
        /*['label' => 'Sobre', 'url' => ['/site/about']],*/
        ['label' => '<i class="fa fa-phone" aria-hidden="true"></i> Contacta\'ns', 'url' => ['/site/contact']],
        ['label' => '<i class="fa fa-music" aria-hidden="true"></i> Àlbum', 'url' => ['/site/album']],
      ];
      if (Yii::$app->user->isGuest) {
        array_push($navItems,['label' => '<i class="fa fa-user" aria-hidden="true"></i> Iniciar sessió', 'url' => ['/user/security/login']]/*,['label' => 'Registre', 'url' => ['/user/registration/register']]*/);
      } else {
        array_push($navItems,['label' => 'Tancar sessió (' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']],['label' => 'Perfil', 'url' => ['/user/profile/show', 'id' => Yii::$app->user->getId()]]
        );
      }
      if (Yii::$app->user->identity->isAdmin){
        array_push($navItems,['label' => 'Admin', 'url' => ['/user/admin']]);
          
      }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $navItems,
        'encodeLabels' => false,
    ]);
    
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer footer-nav">
    <div class="container">
        <ul class="footer-nav pull-left">
            <li><a href="<?= Yii::$app->homeUrl; ?>"> <img src="../web/logo_soundup.svg" width="60%"> </a></li>
            <li><a href="">Contacta'ns</a> </li>
            <li><a href="">Descarregar</a> </li>
            <li><a href="">Condicions d'ús</a> </li>
            <li><a href="">FAQ</a> </li>
            <li><a href="">Ajuda</a> </li>
            <li><a href="">Anuncia't</a> </li>
        </ul>
        <p class="pull-right">&copy; <a href="<?= Yii::$app->homeUrl; ?>">SoundUP <?= date('Y') ?></a></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
