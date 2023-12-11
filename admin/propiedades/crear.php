<?php 
require '../../includes/app.php';

use App\Propiedad;
use Intervention\Image\ImageManagerStatic as Image;



//

isAuth();


//BASE DE DATOS
    $errores=Propiedad::getErrores();
    $db=conectarDB();
   
 
    $queryVendedores="SELECT * FROM vendedores";
    $vendedores=mysqli_query($db,$queryVendedores);
    debuguear(count($errores));
    
   

    if($_SERVER["REQUEST_METHOD"]==="POST"){
       
        $propiedad =  new Propiedad($_POST);
        $errores=$propiedad->validacion();
        
            //generar nombre unico
        $nombreImagen=md5(uniqid(rand(),true)).".jpg";
        
        
    
        
        if(empty($errores)){
            $propiedad->guardar();
            //SUBIDA DE ARCHIVOS
                //crear carpeta
            $carpetaImagenes= CARPETA_IMAGENES;
            if(!is_dir($carpetaImagenes)){
                mkdir($carpetaImagenes);
            }


            

            //Realiza una intervention  a la imagen
            $image=Image::make($_FILES['imagen']['tmp_name'])->fit(800,800);
            //Subir la imagen al servidor

            $image->save();


            $propiedad->setImagen($nombreImagen);
            
            
            

        if($resultado){
            header('Location: /bienes_raices/admin/index.php?resultado=1');
        }

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
        <fieldset>
            <legend>Informacion General de la propiedad</legend>

            <label for="titulo">Titulo:</label>
            <input type="text" name="titulo" id="titulo" placeholder="Titulo de la propiedad" value="<?php echo $titulo ?>">

            <label for="precio">precio:</label>
            <input type="text" name="precio" id="precio" placeholder="Precio de la propiedad" value="<?php echo $precio ?>">

            <label for="img">Imagen</label>
            <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png">

            <label for="desc">Descripcion</label>
            <textarea name="descripcion" id="descripcion" cols="30" rows="10"><?php echo $descripcion ?></textarea>
        </fieldset>
        <fieldset>
            <legend>Informacion de la propiedad</legend>
            <label for="habitaciones">Habitaciones</label>
            <input type="number" name="habitaciones" id="rooms" max="9" min="1" value="<?php echo $habitaciones ?>">
            <label for="wc">WC</label>
            <input type="wc" name="wc" id="rooms" max="9" min="1" value="<?php echo $wc ?>">
            <label for="estacionamiento">Estacionamiento</label>
            <input type="estacionamiento" name="estacionamiento" id="rooms" max="9" min="1" value="<?php echo $estacionamiento ?>">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>
            <select name="vendedores_id" id="vendedor">
                <option value="" selected disabled>-- Selecciona --</option>
                <?php while($row = mysqli_fetch_assoc($vendedores)) { ?>
                    <option value=" <?php echo $row['id'] ?>"  <?php echo $vendedoresId==$row['id'] ? "selected" : ''?> > <?php echo $row['nombre'].' '.$row['apellido']; ?> </option>
                <?php }?>
            </select>
            
        </fieldset>
        <input type="submit" value="Crear Propiedad" class="boton-verde">
    </form>

   

</main>
<?php 
    incluirTemplate('footer');
?>