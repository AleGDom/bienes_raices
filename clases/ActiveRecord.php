<?php 

namespace App;

class ActiveRecord{
    
    //Base de datos

    protected static $db;
    protected static $columnas=[];
    protected static $errores=[];
    protected static $tabla=' hola';

    

    

    //FUNCIONES DEL CRUD

    public function guardar(){
        if(!is_null( $this->id)){
            $this->actualizar();
        } else{
            $this->crear();
        }
    }

    public function crear(){
      
        $atributos=$this->sanitizar();
        //debuguear($atributos);
        $query=" INSERT INTO ". static::$tabla ." (";
        $query.=join(', ',array_keys($atributos));
        $query.=" ) VALUES (' ";
        $query.=join("', '",array_values($atributos));
        $query.=" ') ";
     
        //debuguear($query);
        $resultado=self::$db->query($query);
        if($resultado){
            header('Location: /bienes_raices/admin/index.php?resultado=1');
        }
    }
    public function mostrar(){
        debuguear(static::$columnas);
    }

    protected function actualizar(){
        $atributos=$this->sanitizar();
        $valores=[];

        foreach($atributos as $key => $value){
            $valores[]="$key = '$value'";           
        }
        $query = "UPDATE ".static::$tabla." SET ";
        $query.=join(", ",$valores);
        $query.="WHERE id = '$this->id'";

        $resultado = self::$db->query($query);
        if($resultado){
            header('Location: /bienes_raices/admin/index.php?resultado=2');
        }
    }
    public function eliminar(){
        $query = "DELETE FROM ".static::$tabla." WHERE id = ".self::$db->escape_string($this->id);
        
        $this->borrarImagen();
         $resultado =self::$db->query($query);
         if($resultado){
             header('Location: /bienes_raices/admin/index.php?resultado=2');
         }

    }
    //Buscar todos los registros
    public static function all(){
        $query = "SELECT * FROM ". static::$tabla;
        $all=self::consultarSQL($query);
        
        return $all;
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////
    /** Funciones de Utilidad */
    public function atributos(){
        $atributos=[];

        foreach(static::$columnas as $columna){
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
        
         

        return static::$errores;
    }

    public static function setDB($database){
        self::$db = $database;

    }

    public static function getErrores(){
        return self::$errores;
    }

    
    

    //Buscar el registro por id

    public static function find($id){
        $query="SELECT * FROM ".static::$tabla." WHERE id = $id";
        $resultado=self::consultarSQL($query);
       if(!$resultado){
        header('Location: /bienes_raices/admin/index.php?resultado=2');
       }
        return array_shift($resultado); 
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
        $objeto=new static($propiedad);
        
        
        return $objeto;
        //debuguear($objeto);
    }

    public function sincronizar($args=[]){
        foreach($args as $key=>$value){
            if(property_exists($this,$key) && !is_null($value)){
                $this->$key=$value;
            }
            
        }
    }

    //Funciones  para imagenes
    public function setImagen($imagen){
        if($this->imagen && file_exists(CARPETA_IMAGENES.$this->imagen)){
            unlink(CARPETA_IMAGENES.$this->imagen);
        }
        $this->imagen=$imagen;
    }
    public function borrarImagen(){
        debuguear('Eliminando imagen');
         if(file_exists(CARPETA_IMAGENES.$this->imagen) && $this->imagen){
            unlink(CARPETA_IMAGENES.$this->imagen);
         }
    }
}



?>