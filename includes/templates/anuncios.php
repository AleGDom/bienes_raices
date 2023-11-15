<?php 

     require '/apache/htdocs/bienes_raices/includes/config/database.php';
     $db=conectarDB();

     echo "se conecto";

     $query="SELECT * FROM propiedades LIMIT $limite";


     $propiedades=mysqli_query($db,$query);

    

?>

<div class="contenedor-anuncios">
        <?php  while($propiedad = mysqli_fetch_assoc($propiedades)) : ?>
            <div class="anuncio">
                <img src="/bienes_raices/imagenes/<?php echo $propiedad['imagen'] ?>" alt="">
                <div class="contenido-anuncio">
                    <h3><?php echo $propiedad['titulo']; ?></h3>
                    <p>Casa en el lago con excelente vista, acabados de lujo en un excelente precio</p>
                    <p class="precio">$<?php echo $propiedad['precio'];  ?></p>
                    <ul class="iconos-caracteristicas">
                        <li>
                            <img loading="lazy" src="/bienes_raices/build/img/icono_wc.svg" alt="icono wc">
                            <p><?php echo $propiedad['wc'];  ?></p>
                        </li>
                        <li>
                            <img loading="lazy" src="/bienes_raices/build/img/icono_estacionamiento.svg" alt="icono auto">
                            <p><?php echo $propiedad['estacionamiento'];  ?></p>
                        </li>
                        <li>
                            <img loading="lazy" src="/bienes_raices/build/img/icono_dormitorio.svg" alt="icono dormitorio">
                            <p><?php echo $propiedad['habitaciones'];  ?></p>
                        </li>
    
                    </ul>
                    <a class="boton boton-amarillo" href="anuncio.php?id=<?php echo $propiedad['id'];  ?>">Ver propiedad</a>
                </div>
                
            </div> <!--FIN DE ANUNCIO-->
           <?php endwhile; ?>

            
        </div><!--FIN DEL CONTENEDOR DE ANUNCIOS-->