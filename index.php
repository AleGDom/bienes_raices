<?php 
    require 'includes/funciones.php';

    incluirTemplate('header',true);

?>
    <main class="contenedor seccion">
        <h2>Más Sobre Nosotros</h2>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="icono seguridad">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit doloribus corporis nihil! Reprehenderit, rem expedita cumque cum deleniti quod nisi, earum eveniet itaque aliquid excepturi, ut perspiciatis necessitatibus quisquam odit!</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="icono precio">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae animi deserunt, inventore culpa sit, pariatur laboriosam error quas doloribus enim asperiores non est nobis ipsa cumque exercitationem nisi voluptates nulla.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="icono tiempo">
                <h3>Tiempo</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Veniam eum error magni animi consequatur fugit, maxime a ipsam, iure temporibus sit? Accusamus assumenda quia, fugiat obcaecati repudiandae fuga numquam quo.</p>
            </div>
        </div>
    </main>
    <section class="seccion contenedor">
        <h2>Casas y Depas en Venta</h2>
        <?php  
        $limite=3;
        include "/apache/htdocs/bienes_raices/includes/templates/anuncios.php";
        
        ?>
        <div class="ver-todas">
            <a class="boton-verde" href="anuncios.html">Ver Todos</a>
        </div>
    </section>
    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondra en contacto contigo a la brevedad</p>
       
         <a class="boton-amarillo-inline" href="contacto.html">Contactáme</a>
    </section>
    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">
                <div class="imagen-entrada">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="imagen blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="#">
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
                    <a href="#">
                        <h4>Guia para la decoracion de tu hogar</h4>
                        <p class="informacion-meta">Escrito el : <span>11/03/2023</span> por:  <span>Admin</span></p>
                        <p>Maximiza el espacio de tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio</p>
                    </a>
                </div>
            </article>
        </section>
        <section class="testimoniales">
            <h3>testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    El personal se comporto de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.
                    
                </blockquote>
                <p>-Alexis Dominguez</p>
            </div>
        </section>
        
    </div>

    <?php 
        incluirTemplate('footer'); 
    ?>
    
    
</body>
</html>