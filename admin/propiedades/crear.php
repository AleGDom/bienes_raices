<?php 

require '../../includes/funciones.php';

$auth=isAuth();

if(!$auth){
    header('Location: /bienes_raices/index.php');
 }
//BASE DE DATOS
    require '../../includes/config/database.php';
    $db=conectarDB();
    //var_dump($db);
    $errores=[];
    $queryVendedores="SELECT * FROM vendedores";
    $vendedores=mysqli_query($db,$queryVendedores);
    //var_dump(mysqli_fetch_assoc($vendedores));
   

    if($_SERVER["REQUEST_METHOD"]==="POST"){
        //  echo "<pre>";
        //  var_dump($_POST);
        //  echo "</pre>";
        //  echo "<pre>";
        //  var_dump($_FILES);
        //  echo "</pre>";
        
        $titulo= mysqli_real_escape_string($db, $_POST["titulo"]);
        $precio= mysqli_real_escape_string($db,$_POST["precio"]);
        $imagen;
        $descripcion= mysqli_real_escape_string($db,$_POST["descripcion"]);

        $habitaciones= mysqli_real_escape_string($db,$_POST["habitaciones"]);
        $wc= mysqli_real_escape_string($db, $_POST["wc"]);
        $estacionamiento= mysqli_real_escape_string($db,$_POST["estacionamiento"]);
        $vendedoresId= mysqli_real_escape_string($db,$_POST["vendedor"]);
        $creado = date('Y/m/d');

        //Asignar files a una variable
        $imagen=$_FILES["imagen"];
       
        // echo "<pre>";
        //  var_dump($imagen['name']);
        //  echo "</pre>";
        //Validar campos vacios
        if(!$titulo){
            $errores[]="Debes escribir un titulo";
        }
        if(!$precio){
            $errores[]="Debes escribir el precio";
        }
        if(strlen($descripcion)<50){
            $errores[]="Debes escribir una descripcion de al menos 50 caracteres";
        }
        if(!$habitaciones){
            $errores[]="Debes escribir la cantidad de habitaciones";
        }
        if(!$wc){
            $errores[]="Debes escribir la cantidad de wc";
        }
        if(!$estacionamiento){
            $errores[]="Debes escribir la cantidad de estacionamientos";
        }
        if(!$vendedoresId){
            $errores[]="Debes seleccionar el vendedor";
        }

        if(!$imagen['name'] || $imagen['error']){
            $errores[]='La imagen es obligatoria';
        }

        //Validar por tamaño (1000kb maximo)
        $medida = 1000 * 1000;

        if($imagen['size']>$medida){
            $errores[]="La imagen es demasiado pesada";
        }
        
        // echo "<pre>";
        // var_dump($errores);
        // echo "</pre>";

        

        if(empty($errores)){
            //SUBIDA DE ARCHIVOS
                //crear carpeta
            $carpetaImagenes= '../../imagenes/';
            if(!is_dir($carpetaImagenes)){
                mkdir($carpetaImagenes);
            }

            //generar nombre unico

            $nombreImagen=md5(uniqid(rand(),true)).".jpg";

            
            //Subir la imagen
            move_uploaded_file($imagen['tmp_name'],$carpetaImagenes.$nombreImagen);
            
            $query= " INSERT INTO propiedades (titulo, precio, imagen, descripcion,habitaciones,wc,estacionamiento, creado, vendedores_id) VALUES ('$titulo','$precio', '$nombreImagen','$descripcion','$habitaciones','$wc', '$estacionamiento','$creado', '$vendedoresId') ";
            
            
        $resultado = mysqli_query($db,$query);

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
            <select name="vendedor" id="vendedor">
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