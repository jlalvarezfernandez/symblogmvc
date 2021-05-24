<?php
require_once('../app/controller/BaseController.php');
require_once('../app/models/Mensaje.php');

class MensajeController extends BaseController
{

    //Mostrar todos los mensajes

    public function actionMensaje()
    {
        $datos = array('Mensaje' => 'Contacto');
        $this->renderHtml('../views/listMensajes_view.php', $datos);
    }

   
}
