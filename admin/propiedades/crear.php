<?php 
require '../../includes/app.php';

use App\Propiedad;
use Intervention\Image\ImageManagerStatic as Image;

isAuth();

//BASE DE DATOS
    $errores=Propiedad::getErrores();

    if($_SERVER["REQUEST_METHOD"]==="POST"){
        $propiedad =  new Propiedad($_POST);
        
        //generar nombre unico
        $nombreImagen=md5(uniqid(rand(),true)).".jpg";
        //crear carpeta   
        $carpetaImagenes= CARPETA_IMAGENES;

        if($_FILES['imagen']['tmp_name']){
            $propiedad->setImagen($nombreImagen);
            $image=Image::make($_FILES['imagen']['tmp_name'])->fit(800,600);
        }
        
        
             
        

        $errores=$propiedad->validacion();
        
            
        
        if(empty($errores)){


            if(!is_dir($carpetaImagenes)){
                mkdir($carpetaImagenes);
            }
        
            //Realiza un resize a la imagen
            
            //Subir la imagen al servidor
            $image->save($carpetaImagenes.$nombreImagen);
            $propiedad->guardar();
        }
        
    }
    

    
    incluirTemplate('header');
?>
<main class="contenedor seccion">
    <h2>Crear</h2>
    <a class="boton-verde" href="../index.php">Volver</a>
    <?php foreach($errores as $error): ?>
        <div class="alerta error"> <?php echo $error; ?> </div>
        <?php endforeach ?>
    <form action="/bienes_raices/admin/propiedades/crear.php" class="formulario" method="POST" enctype="multipart/form-data">
        <?php include '/apache/htdocs/bienes_raices/includes/templates/formulario.php' ?>
    
        <input type="submit" value="Crear Propiedad" class="boton-verde">
    </form>

   

</main>
<?php 
    incluirTemplate('footer');
?>
