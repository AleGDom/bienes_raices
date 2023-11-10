<?php 
    require 'includes/funciones.php';

    incluirTemplate('header');

?>
    <main class="contenedor seccion contenido-centrado">
        <h2>Casa en venta frente al bosque</h2>
        <picture>
            <source srcset="build/img/anuncio5.webp">
            <img loading="lazy" src="build/img/anuncio5.jpg" alt="Anuncio">
        </picture>
        <div class="resumen-propiedad">
            <p class="precio">$3,000,000</p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p>3</p>
                </li>
                <li>
                    <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono auto">
                    <p>3</p>
                </li>
                <li>
                    <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                    <p>4</p>
                </li>

            </ul>

            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Soluta expedita quaerat quod repellendus non ipsam in placeat, totam dolores. Minus quia quos voluptatem repellendus nisi, sequi dolorem cupiditate asperiores enim. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consectetur cupiditate et magnam voluptatibus alias aspernatur quod, temporibus commodi! Illum aliquam aliquid rerum ipsum. Culpa aliquam, deleniti pariatur laudantium quisquam nisi.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto enim sunt dolorum natus. Tempore neque nisi provident ipsum minima consectetur veniam ad aut debitis iusto? Reprehenderit exercitationem quos illo quasi. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloribus id necessitatibus dignissimos tempore ad impedit consectetur, animi est explicabo harum consequuntur adipisci quis commodi reiciendis libero eligendi! Omnis, quos quis.</p>
            
        </div>
        </div>
    </main>

    <?php 
        incluirTemplate('footer'); 
    ?>
    
   
</body>
</html>