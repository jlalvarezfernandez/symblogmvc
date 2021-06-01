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
        
        $procesaFormulario = false;
        $titulo = "";
        $descripcion = "";
        $autor = "";

        if (!empty($_POST['enviar'])) {
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $autor = $_POST['autor'];
            $procesaFormulario = true;
        } 
        if ($procesaFormulario) {
            $objectMensaje = Mensaje::getInstancia();
            $objectMensaje->setTitulo($titulo);
            $objectMensaje->setDescripcion($descripcion);
            $objectMensaje->setAutor($autor);
            $objectMensaje->set();
            header('location: ' . DIRURL . '/blog/list');

           
            
        }
        
    }

   
}
