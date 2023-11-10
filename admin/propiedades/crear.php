<?php 
//BASE DE DATOS
    require '../../includes/config/database.php';
    $db=conectarDB();
    //var_dump($db);
    $errores=[];

    if($_SERVER["REQUEST_METHOD"]==="POST"){
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";

        $titulo=$_POST["titulo"];
        $precio=$_POST["precio"];
        $imagen;
        $descripcion=$_POST["descripcion"];

        $habitaciones=$_POST["habitaciones"];
        $wc=$_POST["wc"];
        $estacionamiento=$_POST["estacionamiento"];
        $vendedoresId=$_POST["vendedor"];
        $query= " INSERT INTO propiedades (titulo,precio,descripcion,habitaciones,wc,estacionamiento, vendedores_id) VALUES ('$titulo','$precio','$descripcion','$habitaciones','$wc', '$estacionamiento', '$vendedoresId') ";
        echo $query;
        
        //Validar campos vacios
        if(!$titulo){
            $errores[]="Debes escribir un titulo";
        }
        if(!$precio){
            $errores[]="Debes escribir el precio";
        }
        if(!$descripcion){
            $errores[]="Debes escribir la descripcion";
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

        var_dump($errores);
        exit;

        $resultado = mysqli_query($db,$query);

        if($resultado){
            echo 'Insertado correctamente';
        }

    }
    

    require '../../includes/funciones.php';
    incluirTemplate('header');
?>
<main class="contenedor seccion">
    <h2>Crear</h2>
    <a class="boton-verde" href="../index.php">Volver</a>

    <form action="/bienes_raices/admin/propiedades/crear.php" class="formulario" method="POST">
        <fieldset>
            <legend>Informacion General de la propiedad</legend>

            <label for="titulo">Titulo:</label>
            <input type="text" name="titulo" id="titulo" placeholder="Titulo de la propiedad">

            <label for="precio">precio:</label>
            <input type="text" name="precio" id="precio" placeholder="Precio de la propiedad">

            <label for="img">Imagen</label>
            <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png">

            <label for="desc">Descripcion</label>
            <textarea name="descripcion" id="descripcion" cols="30" rows="10"></textarea>
        </fieldset>
        <fieldset>
            <legend>Informacion de la propiedad</legend>
            <label for="habitaciones">Habitaciones</label>
            <input type="number" name="habitaciones" id="rooms" max="9" min="1">
            <label for="wc">WC</label>
            <input type="wc" name="wc" id="rooms" max="9" min="1">
            <label for="estacionamiento">Estacionamiento</label>
            <input type="estacionamiento" name="estacionamiento" id="rooms" max="9" min="1">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>
            <select name="vendedor" id="vendedor">
                <option value="" selected disabled>-- Selecciona --</option>
                <option value="1">Alexis</option>
                <option value="2">Karen</option>
            </select>
        </fieldset>
        <input type="submit" value="Crear Propiedad" class="boton-verde">
    </form>

</main>
<?php 
    incluirTemplate('footer');
?>