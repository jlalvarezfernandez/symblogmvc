<?php
require_once('../app/controller/BaseController.php');


class AboutController extends BaseController
{

    //Mostrar about 

    public function actionAbout()
    {
        $datos = array('nombre' => 'Jose Luis', 'correoElectronico' => 'ajfru@hotmail.com');
        $this->renderHtml('../views/about_view.php', $datos);
    }
}
