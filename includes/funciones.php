<?php 
    define('TEMPLATES_URL', __DIR__.'\templates');
    define('FUNCIONES','funciones.php');
    define('CARPETA_IMAGENES','/apache/htdocs/bienes_raices/imagenes/');
    
function incluirTemplate( string $nombre, bool $inicio=false){
    //echo TEMPLATES_URL."/$nombre.php";
    include '/apache/htdocs/bienes_raices/includes/templates'."/$nombre.php";
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

function s($html): string{
    $s=htmlspecialchars($html);
    return $s;
}

function ValidarTipo($tipo){
    $tipos=['propiedad','vendedor'];
    
    return in_array($tipo,$tipos);
}