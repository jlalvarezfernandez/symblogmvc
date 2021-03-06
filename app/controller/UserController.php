<?php
require_once('../app/controller/BaseController.php');
require_once('../app/models/Users.php');
require_once("../views/include/funciones.php");


class UserController extends BaseController
{

    //Mostrar todos los usuarios

    public function actionListUser()
    {
        $users = [];
        $objectUser = Users::getInstancia();
        $users = $objectUser->getAllUsers();

        $this->renderHtml('../views/listUsers_view.php', $users);
    }

    // Mostar solo un usuario
    public function showUser($id)
    {
       
        $objectUser = Users::getInstancia();
        $users = $objectUser->get($id);

        $this->renderHtml('../views/userOnly_view.php', $users);
    }

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
                $user = Users::getInstancia();
                $user->setEmail($email);
                $user->setPassword($pass1);
                $user->setPerfil('usuario');
                $user->set();
                header('location: '.DIRURL.'/blog/list');

                
            }
        }
    }


}
