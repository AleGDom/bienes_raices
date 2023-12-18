<?php
    require '../../includes/app.php';
    use App\Propiedad;
    use Intervention\Image\ImageManagerStatic as Image;

//Funcion para autenticar
    isAuth();

   $errores=[];
    $queryVendedores="SELECT * FROM vendedores";
    $vendedores=mysqli_query($db,$queryVendedores);
 

    $idGET=$_GET['id'];
    $idGET=filter_var($idGET, FILTER_VALIDATE_INT);
    if(!$idGET){
        header('Location: ../index.php');
    }
  
    $propiedad=Propiedad::find($idGET);
    
  
    //Asignar files a una variable
    if($_SERVER["REQUEST_METHOD"]==="POST"){
        $propiedad->sincronizar($_POST);
        $nombreImagen=md5(uniqid(rand(),true)).".jpg";

        if($_FILES['imagen']['tmp_name']){   
            $imagen=Image::make($_FILES['imagen']['tmp_name'])->fit(800,600); 
            $propiedad->setImagen($nombreImagen); 
        }
        $errores=$propiedad->validacion();

        if(empty($errores)){
            //SUBIDA DE ARCHIVOS
                //crear carpeta
                $carpetaImagenes=CARPETA_IMAGENES;
                if(!is_dir($carpetaImagenes)){
                    mkdir($carpetaImagenes);
                }
                if($_FILES['imagen']['tmp_name'])
                $imagen->save($carpetaImagenes.$nombreImagen);
                
                $resultado=$propiedad->guardar();
                
        }
        
    }
    

    
    incluirTemplate('header');
?>
<main class="contenedor seccion">
    <h2>Actualizar</h2>
    <a class="boton-verde" href="../index.php">Volver</a>
    <?php foreach($errores as $error): ?>
        <div class="alerta error"> <?php echo $error; ?> </div>
        <?php endforeach ?>
    <form  class="formulario" method="POST" enctype="multipart/form-data">
        <?php include '../../includes/templates/formulario.php' ?>
        <input type="submit" value="Crear Propiedad" class="boton-verde">
    </form>

   

</main>
<?php 
    incluirTemplate('footer');
?>