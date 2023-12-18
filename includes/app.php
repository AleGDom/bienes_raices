<?php 

    require 'funciones.php';
    require '/apache/htdocs/bienes_raices/includes/config/database.php';
    require '/apache/htdocs/bienes_raices/vendor/autoload.php';

use App\ActiveRecord;
use App\Propiedad;
use App\Vendedores;

    $propiedad = new Propiedad;
    //var_dump($propiedad);

    $db=conectarDB();

    ActiveRecord::setDB($db);
?>