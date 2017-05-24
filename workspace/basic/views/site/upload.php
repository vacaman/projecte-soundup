<?php

echo kato\DropZone::widget([
       'options' => [
           'url'=> 'index.php?r=site%2Fupload',
           'maxFilesize' => '3',
           'acceptedFiles' => 'audio/*',
       ],
       'clientEvents' => [
           'complete' => "function(file){console.log(file)}",
           'removedfile' => "function(file){alert(file.name + ' is removed')}"
       ],
       
   ]);
   
  ?>