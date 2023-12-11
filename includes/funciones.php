<?php 
    define('TEMPLATES_URL', __DIR__.'\templates');
    define('FUNCIONES','funciones.php');
    define('CARPETA_IMAGENES','');
    
function incluirTemplate( string $nombre, bool $inicio=false){
    //echo TEMPLATES_URL."/$nombre.php";
    include TEMPLATES_URL."/$nombre.php";
}

function isAuth(){

    session_start();

    if(!$_SESSION['login']){
        header('Location: /bienes_raices/index.php');
    }

   
}

function debuguear($var){
    echo '<pre>';
        var_dump($var);
    echo '</pre>';
}