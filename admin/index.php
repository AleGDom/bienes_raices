<?php 
    //AUTHENTICATE
    require '../includes/funciones.php';

    $auth=isAuth();

    if(!$auth){
        header('Location: /bienes_raices/index.php');
    }
    //CONECT DATABASE
    require '../includes/config/database.php';
    $db=conectarDB();

    
    //Query de las propiedades
    $query="SELECT * FROM propiedades";

    $propiedades= mysqli_query($db,$query);

    //var_dump(mysqli_fetch_assoc($propiedades));

    $resultado = $_GET['resultado'];
    //echo $resultado;

    if($_SERVER['REQUEST_METHOD']==='POST'){
        $id=$_POST['id'];
        $id=filter_var($id,FILTER_VALIDATE_INT);

        if($id){
                $imgquery="SELECT imagen FROM propiedades WHERE id=$id";
                $resimg=mysqli_query($db,$imgquery);
                $nombreimg=mysqli_fetch_assoc($resimg);
                unlink('../imagenes/'.$nombreimg['imagen']);

            $query = "DELETE FROM propiedades WHERE id=$id";
            $resultado = mysqli_query($db,$query);

            if($resultado){
                
                header('Location:index.php');
            }
        }
    }
    
    incluirTemplate('header');

    
?>
<main class="contenedor seccion">
    <h2>Administrador de Bienes Raices</h2>
    <?php if($resultado==1): ?>
        <div class="alerta exito">La propiedad de creo correctamente</div>
    <?php elseif($resultado==2): ?>
        <div class="alerta exito">La Propiedad se Actualizo correctamente</div>
    <?php endif; ?>
    <a class="boton-verde" href="propiedades/crear.php">Nueva propiedad</a>
    <table class="propiedades">
        <thead>
            <tr>
                <th>Id</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <!-- <tr>
                <td>1</td>
                <td>Casa en la playa</td>
                <td><img src="../imagenes/8b6b28a727e36709c19d3a8ba732a167.jpg" alt=""></td>
                <td>50000</td>
                <td>
                    <a href="#" class="boton-rojo">Eliminar</a>
                    <a href="#" class="boton-amarillo">Actualizar</a>
                </td>
            </tr> -->
            <?php while($propiedad=mysqli_fetch_assoc($propiedades)): ?>
                <tr>
                <td><?php echo $propiedad['id']; ?></td>
                <td><?php echo $propiedad['titulo']; ?></td>
                <td><img src="../imagenes/<?php echo $propiedad['imagen']; ?>" alt=""></td>
                <td>$<?php echo $propiedad['precio']; ?></td>
                <td>
                    <!-- <a href="#" class="boton-rojo">Eliminar</a> -->
                    <form method="POST"  class="w-100">
                        <input type="hidden" name="id" id="id" value="<?php echo $propiedad['id']; ?>">
                        <input type="submit" value="Eliminar" class="boton-rojo">
                    </form>
                    <a href="propiedades/actualizar.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo">Actualizar</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</main>
<?php 
    mysqli_close($db);
    incluirTemplate('footer');
?>