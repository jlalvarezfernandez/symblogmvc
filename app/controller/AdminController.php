<?php
require_once('../app/controller/BaseController.php');
require_once('../app/models/Users.php');



class AdminController extends BaseController
{

    //Mostrar menu administrador de opciones

    public function actionAdmin()
    {
        $datos = array('Titulo' => 'opciones administrador');
        $this->renderHtml('../views/adminOpciones_view.php', $datos);
    }

    public function actionShowAllUsers()
    {
        $datos = [];
        $objectUser = Users::getInstancia();
        $datos = $objectUser->getAllUsers();
        $this->renderHtml('../views/adminOpciones_view.php', $datos);
    }


}