<?php
require_once('../app/controller/BaseController.php');
require_once('../app/models/Registro.php');
include_once("../views/include/funciones.php");

class RegistroController extends BaseController
{

    //Mostrar todos los mensajes

    public function actionRegistro()
    {
        $datos = array('Mensaje' => 'Registro');
        $this->renderHtml('../views/registro_view.php', $datos);

        $procesaFormulario = false;
      
        $email = "";
        $pass1 = "";
        $pass2 = "";
        $msgError = "";

        if (isset($_POST['enviar'])) {
            $procesaFormulario = true;
            $email = limpiarDatos(($_POST['email']));
            $pass1 = limpiarDatos(($_POST['pass1']));
            $pass2 = limpiarDatos(($_POST['pass2']));
            if (empty($email)) {
                $msgError = "el campo no puede estar vacio";
                $procesaFormulario = false;
            }
            if (empty($pass1)) {
                $msgError = "el campo no puede estar vacio";
                $procesaFormulario = false;
            }
            if (empty($pass2)) {
                $msgError = "el campo no puede estar vacio";
                $procesaFormulario = false;
            }
            if ($pass1 != $pass2) {
                $msgError = "las contraseñas no coinciden";
                $procesaFormulario = false;
            }
            if ($procesaFormulario) {
                $user = Registro::getInstancia();
                $user->setEmail($email);
                $user->setPassword($pass1);
                $user->setPerfil('usuario');
                $user->set();
                header('location: '.DIRURL.'/blog/list');

                
            }
        }
    }
}
