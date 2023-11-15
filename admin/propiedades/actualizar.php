<?php 
//BASE DE DATOS
    require '../../includes/config/database.php';
    $db=conectarDB();
    //var_dump($db);
    $errores=[];
    $queryVendedores="SELECT * FROM vendedores";
    $vendedores=mysqli_query($db,$queryVendedores);
    //var_dump(mysqli_fetch_assoc($vendedores));

    $idGET=$_GET['id'];
    $idGET=filter_var($idGET, FILTER_VALIDATE_INT);
    if(!$idGET){
        header('Location: ../index.php');
    }
    //var_dump($idGET);
    $query="SELECT * FROM propiedades WHERE id=$idGET";
    $resultadoPropiedad = mysqli_fetch_assoc(mysqli_query($db,$query));

    //var_dump ($resultadoPropiedad);

    $titulo= $resultadoPropiedad['titulo'];
    $precio= $resultadoPropiedad['precio'];
   
    $descripcion= $resultadoPropiedad['descripcion'];

    $habitaciones= $resultadoPropiedad['habitaciones'];
    $wc= $resultadoPropiedad['wc'];
    $estacionamiento= $resultadoPropiedad['estacionamiento'];
    $vendedoresId= $resultadoPropiedad['vendedores_id'];
    

    //Asignar files a una variable

    if($_SERVER["REQUEST_METHOD"]==="POST"){
        //  echo "<pre>";
        //  var_dump($_POST);
        //  echo "</pre>";
        //  echo "<pre>";
        //  var_dump($_FILES);
        //  echo "</pre>";
        
        $titulo= mysqli_real_escape_string($db, $_POST["titulo"]);
        $precio= mysqli_real_escape_string($db,$_POST["precio"]);
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
             $nombreImagen = $resultadoPropiedad['imagen'];
             if($imagen['name']){
                unlink($carpetaImagenes.$resultadoPropiedad['imagen']);
                $nombreImagen=md5(uniqid(rand(),true)).".jpg";
                move_uploaded_file($imagen['tmp_name'],$carpetaImagenes.$nombreImagen);
             }

            // //generar nombre unico

             
            
            $query= " UPDATE propiedades SET titulo = '$titulo', precio = $precio, imagen = '$nombreImagen', descripcion = '$descripcion', habitaciones = $habitaciones, wc = $wc, estacionamiento = $estacionamiento, vendedores_id = $vendedoresId WHERE id=$idGET";
            echo $query;
           
            
            
        $resultado = mysqli_query($db,$query);

        if($resultado){
            header('Location: /bienes_raices/admin/index.php?resultado=2');
        }

        }
        
    }
    

    require '../../includes/funciones.php';
    incluirTemplate('header');
?>
<main class="contenedor seccion">
    <h2>Actualizar</h2>
    <a class="boton-verde" href="../index.php">Volver</a>
    <?php foreach($errores as $error): ?>
        <div class="alerta error"> <?php echo $error; ?> </div>
        <?php endforeach ?>
    <form  class="formulario" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Informacion General de la propiedad</legend>

            <label for="titulo">Titulo:</label>
            <input type="text" name="titulo" id="titulo" placeholder="Titulo de la propiedad" value="<?php echo $titulo ?>">

            <label for="precio">precio:</label>
            <input type="text" name="precio" id="precio" placeholder="Precio de la propiedad" value="<?php echo $precio ?>">

            <label for="img">Imagen</label>
            <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png">
            <img class="imagen-small" src="/bienes_raices/imagenes/<?php echo $resultadoPropiedad['imagen']; ?>" alt="">

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