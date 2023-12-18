<?php

namespace App;

class Vendedores extends ActiveRecord{
    protected static $columnas = ['id','nombre','apellido','telefono'];
    protected static $tabla = 'vendedores';
    public $id;
    public $nombre;
    public $apellido;
    public $telefono;
    public function __construct($args=[])
    {
        $this->id=$args['id'] ?? null;
        $this->nombre=$args['nombre'] ?? '';
        $this->apellido=$args['apellido'] ?? '';
        $this->telefono=$args['telefono'] ?? '';
        

    }
    public function validacion(){
        if(!$this->nombre){
            self::$errores[]="Debes escribir un nombre";
        }
        if(!$this->apellido){
            self::$errores[]="Debes escribir un apellido";
        }
        if($this->telefono){
            self::$errores[]="Debes escribir un telefono";
        }
        
         

        return self::$errores;
    }
}