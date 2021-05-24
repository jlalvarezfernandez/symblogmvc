<?php
require_once('../app/config/parameters.php');
require_once('../app/models/Users.php');

$objectUser = Users::getInstancia();


// CREAR UN USUARIO

/*
echo "Crear Usuario"; 
$objectUser->setEmail('joseluis@hotmail.com');
$objectUser->setPassword('1234');
$objectUser->set();
echo "Usuario creado"; */

/* echo "Crear Usuario"; 
echo "<br>";
$objectUser->setEmail("fulanitodecopas@hotmail.com");
$objectUser->setPassword('1234');
$objectUser->set();
echo "Usuario creado"; */

// MOSTRAR UN USUARIO

$objectUser->get(2);
echo "Mostrar Usuario";
echo "<br>";
echo "Usuario: ";
echo $objectUser->getEmail(2);
echo "<br>";
echo "Contraseña: ";
echo $objectUser->getPassword(2);
echo "<br>";
$objectUser->get(3);
echo "Mostrar Usuario: ";
echo "<br>";
echo "Usuario: ";
echo $objectUser->getEmail(3);
echo "<br>";
echo "ontraseña: ";
echo $objectUser->getPassword(3);


// EDITAR USUARIO

$objectUser->setPassword('4321');
$objectUser->setEmail("nicanor@hotmail.com");
$objectUser->edit(2);

$objectUser->setPassword('0000');
$objectUser->setEmail("leandroGao@hotmail.com");
$objectUser->edit(3);

// mostramos los nuevos datos del usuario modificado

$objectUser->get(2);
echo "<br>";
echo "Usuario modificado";
echo "<br>";
echo $objectUser->getPassword();
echo "<br>";
echo $objectUser->getEmail();
echo "<br>";  







