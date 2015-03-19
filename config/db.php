<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=192.168.1.13;dbname=swcoffee',
    'username' => 'admin',
    'password' => 'ictsrisangworn',
    'charset' => 'utf8',
     'attributes'=>array(
    PDO::MYSQL_ATTR_LOCAL_INFILE=>TRUE
  ),
];
