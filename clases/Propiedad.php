<?php

namespace App;

class Propiedad{

    //Base de datos

    protected static $db;
    protected static $columnas=['id','titulo','precio','imagen','descripcion','habitaciones','wc','estacionamiento', 'creado', 'vendedores_id'];
    protected static $errores=[];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedores_id;

    public function __construct($args=[])
    {
        $this->id=$args['id'] ?? '';
        $this->titulo=$args['titulo'] ?? '';
        $this->precio=$args['precio'] ?? '';
        $this->imagen=$args['imagen'] ?? '';
        $this->descripcion=$args['descripcion'] ?? '';
        $this->habitaciones=$args['habitaciones'] ?? '';
        $this->wc=$args['wc'] ?? '';
        $this->estacionamiento=$args['estacionamiento'] ?? '';
        $this->creado=date('Y/m/d');
        $this->vendedores_id=$args['vendedores_id'] ?? '';

    }

    public function guardar(){
      
        $atributos=$this->sanitizar();
        debuguear($atributos);
        $query=" INSERT INTO propiedades (";
        $query.=join(', ',array_keys($atributos));
        $query.=" ) VALUES (' ";
        $query.=join("', '",array_values($atributos));
        $query.=" ') ";
     
        debuguear($query);
        $resultado=self::$db->query($query);
        debuguear($resultado);
    }
    public function atributos(){
        $atributos=[];

        foreach(self::$columnas as $columna){
            if($columna==='id') continue;
            $atributos[$columna]=$this->$columna;
        }

        return $atributos;
    }

    public function sanitizar(){
        $atributos=$this->atributos();
        $sanitizado=[];
        foreach($atributos as $key=>$value){
            $sanitizado[$key]=self::$db->escape_string($value);
        }   
        return $sanitizado;

    }

    public function validacion(){
        if(!$this->titulo){
            self::$errores[]="Debes escribir un titulo";
        }
        if(!$this->precio){
            self::$errores[]="Debes escribir el precio";
        }
        if(strlen($this->descripcion)<50){
            self::$errores[]="Debes escribir una descripcion de al menos 50 caracteres";
        }
        if(!$this->habitaciones){
            self::$errores[]="Debes escribir la cantidad de habitaciones";
        }
        if(!$this->wc){
            self::$errores[]="Debes escribir la cantidad de wc";
        }
        if(!$this->estacionamiento){
            self::$errores[]="Debes escribir la cantidad de estacionamientos";
        }
        if(!$this->vendedores_id){
            $errores[]="Debes seleccionar el vendedor";
        }

        // if(!$imagen['name'] || $imagen['error']){
        //     $errores[]='La imagen es obligatoria';
        // }

        // //Validar por tamaño (1000kb maximo)
        // $medida = 1000 * 1000;

        // if($imagen['size']>$medida){
        //     $errores[]="La imagen es demasiado pesada";
        // }

        return self::$errores;
    }

    public static function setDB($database){
        self::$db = $database;

    }

    public static function getErrores(){
        return self::$errores;
    }

    public function setImagen($imagen){
        $this->imagen=$imagen;
    }
}