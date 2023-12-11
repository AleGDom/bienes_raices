<?php 
    require 'includes/app.php';

    incluirTemplate('header');

?>
    </header>
    <main class="contenedor seccion">
        <h2>Anuncios</h2>
        <?php 
        $limite=9;
        include 'includes/templates/anuncios.php' ?>
    </main>

    <?php 
        incluirTemplate('footer'); 
    ?>
  
</body>
</html>