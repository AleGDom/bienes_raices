<?php

function conectarDB() : mysqli{
    try {
        $db= new mysqli("localhost","root","root","bienesraices_crud");
        //echo "se conecto \t";
        return $db;
    } catch (\Throwable $th) {
        echo "Error, no se pudo conectar a ba base de datos";
        
        exit;

    }
}