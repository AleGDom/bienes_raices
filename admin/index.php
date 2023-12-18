<?php 
    //AUTHENTICATE
    require '../includes/app.php';

    use App\Propiedad;
    use App\Vendedores;

    $propiedades=Propiedad::all();
    $vendedores=Vendedores::all();
   
   
    isAuth();

    $resultado = $_GET['resultado'];
    

    if($_SERVER['REQUEST_METHOD']==='POST'){
        $id=$_POST['id'];
        debuguear($_POST);
        if($id){
            debuguear($id);
            $tipo=$_POST['tipo'];
            if(ValidarTipo($tipo)){
                debuguear('Es valido');
                if($tipo=="propiedad"){
                    $propiedad=Propiedad::find($id);
                    $propiedad->eliminar();
                } else{
                    
                    $vendedor=Vendedores::find($id);
                    $vendedor->eliminar();
                }
            }
            else{
                debuguear('No es valido');
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
    <a class="boton-amarillo-inline" href="vendedores/crear.php">Nuevo Vendedor</a>
    <h2>Propiedades</h2>
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
            
            <?php foreach($propiedades as $propiedad ): ?>
                <tr>
                <td><?php echo $propiedad->id; ?></td>
                <td><?php echo $propiedad->titulo; ?></td>
                <td><img src="../imagenes/<?php echo $propiedad->imagen; ?>" alt=""></td>
                <td>$<?php echo $propiedad->precio; ?></td>
                <td>
                    
                    <form method="POST"  class="w-100">
                        <input type="hidden" name="id" id="id" value="<?php echo $propiedad->id; ?>">
                        <input type="hidden" name="tipo" id="tipo" value="propiedad">
                        <input type="submit" value="Eliminar" class="boton-rojo">
                    </form>
                    <a href="propiedades/actualizar.php?id=<?php echo $propiedad->id; ?>" class="boton-amarillo">Actualizar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h2>Vendedores</h2>

    <table class="propiedades">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombres</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            
            <?php foreach($vendedores as $vendedor ): ?>
                <tr>
                <td><?php echo $vendedor->id; ?></td>
                <td><?php echo $vendedor->nombre." ".$vendedor->apellido; ?></td>
                <td><?php echo $vendedor->telefono; ?></td>
                <td>
                    
                    <form method="POST"  class="w-100">
                        <input type="hidden" name="id" id="id" value="<?php echo $vendedor->id; ?>">
                        <input type="hidden" name="tipo" id="tipo" value="vendedor">
                        <input type="submit" value="Eliminar" class="boton-rojo">
                    </form>
                    <a href="vendedores/actualizar.php?id=<?php echo $vendedor->id; ?>" class="boton-amarillo">Actualizar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</main>
<?php 
    mysqli_close($db);
    incluirTemplate('footer');
?>