<?php 

//consultar la base de datos
require 'includes/config/database.php';
$db=conectarDB();


//Crear un email y passwords
$email="correo@correo.com";
$password="123456";
$passwordHash=password_hash($password, PASSWORD_BCRYPT);
var_dump($passwordHash);
//Query para crear el usuario 
$query="INSERT INTO usuarios (email,password) VALUES ('$email','$passwordHash')";
echo $query;
//Agregarlo a la base de datos
mysqli_query($db,$query);
?>