<?php 
//  var_dump($_GET);
    require '/apache/htdocs/bienes_raices/includes/config/database.php';
    $db=conectarDB();
    $id=$_GET['id'];
    $id=filter_var($id,FILTER_VALIDATE_INT);
    if(!$id){
        header('Location: /bienes_raices/index.php');
    }
    $query="SELECT * FROM propiedades WHERE id=$id";
    $propiedad = mysqli_query($db,$query);
    if($propiedad->num_rows===0){
        header('Location: /bienes_raices/index.php');
    }
    $info=mysqli_fetch_assoc($propiedad);
    require 'includes/funciones.php';

    incluirTemplate('header');
   

?>
    <main class="contenedor seccion contenido-centrado">
        <h2><?php echo $info['titulo']; ?></h2>
        
            <img loading="lazy" src="/bienes_raices/imagenes/<?php echo $info['imagen'] ?>" alt="Anuncio">
       
        <div class="resumen-propiedad">
            <p class="precio">$<?php echo $info['precio'] ?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo $info['wc'] ?></p>
                </li>
                <li>
                    <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono auto">
                    <p><?php echo $info['estacionamiento'] ?></p>
                </li>
                <li>
                    <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                    <p><?php echo $info['habitaciones'] ?></p>
                </li>

            </ul>

            <p><?php echo $info['descripcion'] ?></p>
            
        </div>
        </div>
    </main>

    <?php 
        mysqli_close($db);
        incluirTemplate('footer'); 
    ?>
    
   
</body>
</html>