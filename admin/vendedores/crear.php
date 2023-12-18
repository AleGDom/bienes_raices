<?php 

require '/apache/htdocs/bienes_raices/includes/app.php';
isAuth();

use App\Vendedores;

if($_SERVER["REQUEST_METHOD"]==="POST"){
    $vendedor = new Vendedores($_POST);
    $errores = $vendedor->validacion();
}

incluirTemplate('header');

?>

<main class="seccion contenedor">
    <h2>Nuevo Vendedor</h2>
    <a href="../index.php" class="boton-verde">Volver</a>
        <?php foreach($errores as $error): ?>
            <div class="alerta error"> <?php echo $error; ?> </div>
        <?php endforeach ?>
    <form method="POST" class="">
            
    </form>
</main>

<?php 
    incluirTemplate('footer');
?>