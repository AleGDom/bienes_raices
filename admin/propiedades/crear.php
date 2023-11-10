<?php 
//BASE DE DATOS
    require '../../includes/config/database.php';
    $db=conectarDB();
    //var_dump($db);
    $errores=[];
    $queryVendedores="SELECT * FROM vendedores";
    $vendedores=mysqli_query($db,$queryVendedores);
    //var_dump(mysqli_fetch_assoc($vendedores));
   

    if($_SERVER["REQUEST_METHOD"]==="POST"){
        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";

        $titulo=$_POST["titulo"];
        $precio=$_POST["precio"];
        $imagen;
        $descripcion=$_POST["descripcion"];

        $habitaciones=$_POST["habitaciones"];
        $wc=$_POST["wc"];
        $estacionamiento=$_POST["estacionamiento"];
        $vendedoresId=$_POST["vendedor"];
        $creado = date('Y/m/d');
       
        
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

        
        // echo "<pre>";
        // var_dump($errores);
        // echo "</pre>";

        if(empty($errores)){
            $query= " INSERT INTO propiedades (titulo,precio,descripcion,habitaciones,wc,estacionamiento, creado, vendedores_id) VALUES ('$titulo','$precio','$descripcion','$habitaciones','$wc', '$estacionamiento','$creado', '$vendedoresId') ";
            
       
        $resultado = mysqli_query($db,$query);

        if($resultado){
            header('Location: /bienes_raices/admin/index.php');
        }

        }
        
    }
    

    require '../../includes/funciones.php';
    incluirTemplate('header');
?>
<main class="contenedor seccion">
    <h2>Crear</h2>
    <a class="boton-verde" href="../index.php">Volver</a>
    <?php foreach($errores as $error): ?>
        <div class="alerta error"> <?php echo $error; ?> </div>
        <?php endforeach ?>
    <form action="/bienes_raices/admin/propiedades/crear.php" class="formulario" method="POST">
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
            <?php echo 'Hola' ?>
        </fieldset>
        <input type="submit" value="Crear Propiedad" class="boton-verde">
    </form>

   

</main>
<?php 
    incluirTemplate('footer');
?>