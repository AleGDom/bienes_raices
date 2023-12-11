<?php 
    require 'includes/app.php';

    incluirTemplate('header');

?>
    <main class="contenedor seccion">
        <h2>Conoce Sobre Nosotros</h2>
        <div class="contenido-nosotros">
            <div class="nosotros-imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="nosotros imagen">
                </picture>
            </div>
            <div aria-colindex="nosotros-texto">
                <p class="nosotros-titulo">25 años de experiencia</p>

                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Soluta expedita quaerat quod repellendus non ipsam in placeat, totam dolores. Minus quia quos voluptatem repellendus nisi, sequi dolorem cupiditate asperiores enim. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consectetur cupiditate et magnam voluptatibus alias aspernatur quod, temporibus commodi! Illum aliquam aliquid rerum ipsum. Culpa aliquam, deleniti pariatur laudantium quisquam nisi.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto enim sunt dolorum natus. Tempore neque nisi provident ipsum minima consectetur veniam ad aut debitis iusto? Reprehenderit exercitationem quos illo quasi. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloribus id necessitatibus dignissimos tempore ad impedit consectetur, animi est explicabo harum consequuntur adipisci quis commodi reiciendis libero eligendi! Omnis, quos quis.</p>
            </div>
        </div>
    </main>
    <section class="contenedor seccion">
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
    </section>

    <?php 
        incluirTemplate('footer'); 
    ?>
    
    
</body>
</html>