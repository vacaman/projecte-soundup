<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\Carousel;
$this->title = 'SoundUP';
?>
<div class="site-index">

    <div class="jumbotron">
        <div class="row">
          <div class="col-sm-10"><img src="../web/logo_soundup.svg" width="60%"></div>
          <div class="col-sm-2">
                <a href="#">
                <div class="boto">
                    <div>
                        <img src="../web/img/windows.svg" alt="windows" style="width:20px;">
                        Descarregar
                        <br>
                        (Windows)
                    </div>
                </div>
                </a>
                <br>
                <a href="#">
                <div class="boto">
                    <div>
                        <img src="../web/img/linux.svg" alt="linux" style="width:20px;">
                        Descarregar
                        <br>
                        (Linux)
                    </div>
                </div>
                </a>
            </div>
        </div>

        <p>La forma més ràpida de compartir so online.</p>
    </div>
    
    <hr>
        
    <div class="border row text-center">
      <div class="border col-lg-6">
          <h1>Varies plataformes</h1>
          <p>Disponible per Windows / Linux</p>
      </div>
      <div class="border col-lg-6">
          <h1>Ràpida grabació</h1>
          <p>Aquesta aplicació permet grabar el so en dos clics</p>
      </div>
    </div>
        
    <div class="border row text-center">
      <div class="border col-lg-6">
          <h1>Comparteix grabacions</h1>
          <p>Graba i puja grabacions de la forma més fàcil possible</p>
      </div>
      <div class="border col-lg-6">
          <h1>Repositori d'audio</h1>
          <p>Emmagatzema els teus audios i comparteix-los amb els teus amics</p>
    </div>
    </div>
        
    
    <hr>
    
    <div class="row">
        <div class="col-sm-6">
            <h1>Captures</h1>
            <?php
            echo Carousel::widget([
                'items' => [
                    ['content'=>  Html::img('@web/img/sliders/compartir_tw.png')],
                    ['content'=>  Html::img('@web/img/sliders/compartir_face.png')],
                ]
            ]);     
            ?>
        </div>
        
        <div class="col-sm-6 contenidor"> 
        <h1>Captures</h1>
            <?php
            echo Carousel::widget([
                'items' => [
                    ['content'=>  Html::img('@web/img/sliders/Album-llista.png')],
                    ['content'=>  Html::img('@web/img/sliders/album-puja.png')],
                ]
            ]);     
            ?>
        </div>
    
    </div> 
    
  
</div>
