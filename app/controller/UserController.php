<?php
require_once('../app/controller/BaseController.php');
require_once('../app/models/Users.php');

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

    //login

  /*   public function actionLogin($id)
    {
       
        echo 'login'; 
    } */


}
