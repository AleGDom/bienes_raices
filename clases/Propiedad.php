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
        //debuguear($atributos);
        $query=" INSERT INTO propiedades (";
        $query.=join(', ',array_keys($atributos));
        $query.=" ) VALUES (' ";
        $query.=join("', '",array_values($atributos));
        $query.=" ') ";
     
        //debuguear($query);
        $resultado=self::$db->query($query);
        return $resultado;
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
            self::$errores[]="Debes seleccionar el vendedor";
        }

         if(!$this->imagen){
            self::$errores[]='La imagen es obligatoria';
         }
         

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
    public static function all(){
        $query = "SELECT * FROM propiedades";
        $all=self::consultarSQL($query);
        return $all;
    }

    public static function consultarSQL($query){
        //Consultar la base de datos
        $resultado=self::$db->query($query);
        //Iterar los resultados
        $array=[];
        while($propiedad = $resultado->fetch_assoc()){
            
            $array[]=self::crearObjeto($propiedad);
        }

        //debuguear($array);
        
        //Liberar la memoria
        $resultado->free();

        //retornar los resultados
        return $array;
    }
    protected static function crearObjeto($propiedad){
        $objeto=new self($propiedad);
        return $objeto;
        //debuguear($objeto);
    }
}