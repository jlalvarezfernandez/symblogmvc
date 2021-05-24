<?php
require_once('../app/controller/BaseController.php');


class AdminController extends BaseController
{

    //Mostrar menu administrador de opciones

    public function actionAdmin()
    {
        $datos = array('Titulo' => 'opciones administrador');
        $this->renderHtml('../views/adminOpciones_view.php', $datos);
    }
}