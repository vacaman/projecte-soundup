<?php
// config de la bdd, l'active record utilitza aquest arxiu cada
// cop que necessita conultar la base de dades
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'vacaman',
    'password' => 'favestendres14',
    'charset' => 'utf8',
];
