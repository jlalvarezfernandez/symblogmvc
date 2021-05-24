<?php
require_once('../app/controller/BaseController.php');
require_once('../app/models/Auth.php');

class AuthController extends BaseController
{

    //login

    public function actionLogin()
    {
        $procesaFormulario = false;
        $email = "";
        $password = "";
        $msnErrorEmail = "";
        $msnErrorPassword = "";


        if (!empty($_POST)) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $procesaFormulario = true;
        }
        if ($procesaFormulario) {
            $objectAuth = Auth::getInstancia();
            $datosLogin = $objectAuth->login($email, $password);
            
            
            if (count($datosLogin) == 1) {
                $_SESSION['perfil'] = 'usuario';
                $_SESSION["email"] = $datosLogin[0]['email'];
               
               
            } else {
    
                $_SESSION["perfil"] = "invitado";
            }
        }
        header('location: http://localhost/symblog/public/index.php/blog/list');
    }

    public function actionLogout()
    {
        unset($_SESSION['perfil']);
        session_destroy();
        header('location: http://localhost/symblog/public/index.php/blog/list');

    }
}
