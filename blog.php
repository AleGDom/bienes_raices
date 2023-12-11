<?php 
    require 'includes/app.php';

    incluirTemplate('header');

?>
    <main class="contenedor seccion contenido-centrado">
        <h2>Nuestro Blog</h2>
        <section class="blog">
        
            <article class="entrada-blog">
                <div class="imagen-entrada">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="imagen blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el : <span>11/03/2023</span> por:  <span>Admin</span></p>
                        <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero</p>
                    </a>
                </div>
            </article>
            <article class="entrada-blog">
                <div class="imagen-entrada">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <img loading="lazy" src="build/img/blog2.jpg" alt="imagen blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Guia para la decoracion de tu hogar</h4>
                        <p class="informacion-meta">Escrito el : <span>11/03/2023</span> por:  <span>Admin</span></p>
                        <p>Maximiza el espacio de tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio</p>
                    </a>
                </div>
            </article>
            <article class="entrada-blog">
                <div class="imagen-entrada">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <img loading="lazy" src="build/img/blog2.jpg" alt="imagen blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Guia para la decoracion de tu hogar</h4>
                        <p class="informacion-meta">Escrito el : <span>11/03/2023</span> por:  <span>Admin</span></p>
                        <p>Maximiza el espacio de tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio</p>
                    </a>
                </div>
            </article>
            <article class="entrada-blog">
                <div class="imagen-entrada">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <img loading="lazy" src="build/img/blog2.jpg" alt="imagen blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Guia para la decoracion de tu hogar</h4>
                        <p class="informacion-meta">Escrito el : <span>11/03/2023</span> por:  <span>Admin</span></p>
                        <p>Maximiza el espacio de tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio</p>
                    </a>
                </div>
            </article>
        </section>
    </main>

    <?php 
        incluirTemplate('footer'); 
    ?>
    
   
</body>
</html>