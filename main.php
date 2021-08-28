<?php

require __DIR__ . '/autoload.php';

use models\Barn;

$barn = new Barn(7,15);
$barn->getProduction();

var_dump($barn->countProduction());