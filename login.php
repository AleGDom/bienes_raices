<?php 
    require 'includes/config/database.php';
    $db=conectarDB();

    $errores=[];
    if($_SERVER['REQUEST_METHOD']==="POST"){
        //var_dump($_POST);
        $email=mysqli_escape_string($db,filter_var($_POST['email'],FILTER_VALIDATE_EMAIL));
        $password=mysqli_escape_string($db,$_POST['password']);
        //var_dump($email);

        if(!$email){
            $errores[]="El email es obligatorio o no es valido";
        }

        if(!$password){
            $errores[]="Ingresa tu contraseña";
        }

        // echo "<pre>";
        // var_dump($errores);
        // echo "</pre>";

        if(empty($errores)){
            //Revisar si el usuario existe
            $query = "SELECT * FROM usuarios WHERE email= '$email'";
            $resultado=mysqli_query($db,$query);
            //var_dump($query);
            // echo "<pre>";
            // echo $resultado;
            // echo "</pre>";

            if($resultado->num_rows){
                //Revisar el si password es correcto
                $usuario = mysqli_fetch_assoc($resultado);

                //verificar si el password es correcto
                $auth=password_verify($password,$usuario['password']);

                var_dump($auth);

                if($auth){
                    session_start();
                    $_SESSION['usuario']=$usuario['email'];
                    $_SESSION['login']=true;
                    header('Location: /bienes_raices/admin/index.php');
                } else{
                    $errores[]='El password es incorrecto';
                }
            } else{
                $errores[]='El usuario no existe';
            }
        }
    }
    require 'includes/funciones.php';

    incluirTemplate('header');

?>
<main class="contenedor seccion contenido-centrado">
    <h2>Login</h2>
    <?php foreach($errores as $error): ?>
        <div class="alerta error"> <?php echo $error; ?> </div>
        <?php endforeach ?>
    <form method="POST" class="formulario">
        <label for="email">email</label>
        <input type="email" name="email" id="email" placeholder="Tu email" >

        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Tu contraseña" >

        <input type="submit" value="Iniciar sesion" class="boton-verde">
    </form>
</main>
<?php 
        incluirTemplate('footer'); 
    ?>