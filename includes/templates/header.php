<?php 


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preload" href="build/css/app.css" as="style">
    <link rel="stylesheet" href="/bienes_raices/build/css/app.css">
    <title>Bienes Raices</title>
</head>
<body>

    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/bienes_raices/index.php">
                    <img src="/bienes_raices/build/img/logo.svg" alt="logo del sitio">
                </a>
                <div class="mobile-menu">
                    <img src="/bienes_raices/build/img/barras.svg" alt="">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="/bienes_raices/build/img/dark-mode.svg" alt="">
                    <nav class="navegacion">
                        <a href="/bienes_raices/nosotros.php">Nosotros</a>
                        <a href="/bienes_raices/anuncios.php">Anuncios</a>
                        <a href="/bienes_raices/blog.php">Blog</a>
                        <a href="/bienes_raices/contacto.php">Contacto</a>
                    </nav>
                </div>
                
            </div> <!--CIERRE DE BARRA-->
            <?php if($inicio){ ?>
            <h1>Venta de Casas y Departamentos Exclusivos De Lujo</h1>
            <?php }?>
        </div>
    </header>