<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Album';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="site-about">
    <h1 class="text-center"><?= Html::encode($this->title) ?> de so</h1>
    
    <div class="puja-so-gran">
    <?php
        
        // Un area per arrossegar arxius de so i pujar-los al servidor
        
        echo kato\DropZone::widget([
               'options' => [
                   'url'=> 'index.php?r=site%2Falbum',
                   'maxFilesize' => '2',
                   'acceptedFiles' => 'audio/*',
                   
               ],
               'clientEvents' => [
                   'complete' => "function(file){console.log(file)}",
                   'removedfile' => "function(file){alert(file.name + ' is removed')}"
               ],
               
           ]);
    
      
      ?>
      </div>
    
    <h1>Grava des del navegador</h1>

    <div style="text-align:center">
  <button onclick="startRecording(this);"><i class="fa fa-play" aria-hidden="true"></i></button>
  <button onclick="stopRecording(this);" disabled><i class="fa fa-stop" aria-hidden="true"></i></button>
  </div>
  
  <ul id="recordingslist"></ul>
  
  <h2>Log</h2>
  <pre id="log"></pre>

  <script src="../web/js/grabaso.js"></script>
  
    
  <?php if(!(Yii::$app->user->getIsGuest())){
    
      echo '
      <table class="table">
  <thead>
      <tr>
        <th>Enllaç per compartir</th>
        <th>Reproductor</th>
        <th>Descarregar arxiu</th>
      </tr>
    </thead>
    <tbody>
      ';
      
      foreach($provider as $val1){
        echo "<tr>";
        echo "<td><a href='https://projecte-vacaman.c9users.io/basic/web/index.php?r=arxiusso%2Fview&id=".$val1["arxiu_id"]."'>https://projecte-vacaman.c9users.io/basic/web/index.php?r=arxiusso%2Fview&id=".$val1["arxiu_id"]."</a></td>";
        echo "<td>";
        echo "<audio controls>";
        echo "<source src='../web/".$val1["arxiu_path"]."' type='audio/mpeg'>";
        echo "</audio>";
        echo "</td>";
        echo "<td> <a href='../web/".$val1["arxiu_path"]."' download>".$val1["arxiu_nom"]."</a></td>";
        echo "</tr>";
    }
    
    echo '</tbody>
          </table>
        </body>';
    
  }
  
  ?>
    


</div>