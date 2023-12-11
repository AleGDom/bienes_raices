<?php 

    require 'funciones.php';
    require '/apache/htdocs/bienes_raices/includes/config/database.php';
    require '/apache/htdocs/bienes_raices/vendor/autoload.php';

    use App\Propiedad;

    $propiedad = new Propiedad;
    //var_dump($propiedad);

    $db=conectarDB();

    Propiedad::setDB($db);
?>