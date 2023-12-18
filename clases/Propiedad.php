<?php

namespace App;

class Propiedad extends ActiveRecord{
    protected static $columnas = ['id','titulo','precio','imagen','descripcion','habitaciones','wc','estacionamiento', 'creado', 'vendedores_id'];
    protected static $tabla='propiedades'; 

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
        $this->id=$args['id'] ?? null;
        $this->titulo=$args['titulo'] ?? '';
        $this->precio=$args['precio'] ?? '';
        $this->imagen=$args['imagen'] ?? '';
        $this->descripcion=$args['descripcion'] ?? '';
        $this->habitaciones=$args['habitaciones'] ?? '';
        $this->wc=$args['wc'] ?? '';
        $this->estacionamiento=$args['estacionamiento'] ?? '';
        $this->creado=$args['creado'] ?? date('Y/m/d');
        $this->vendedores_id=$args['vendedores_id'] ?? '';

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
}