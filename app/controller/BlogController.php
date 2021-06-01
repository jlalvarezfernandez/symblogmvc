<?php
require_once('../app/controller/BaseController.php');
require_once('../app/models/Blog.php');
require_once('../app/models/Comment.php');
require_once("../views/include/funciones.php");

class BlogController extends BaseController
{

    //Mostrar todos los blog

    public function actionListBlog()
    {
        $blog = [];
        $objectBlog = Blog::getInstancia();
        $blog = $objectBlog->getAllBlogs();

        //cargar tags
        $tags = $objectBlog->getAllTags();
        $cadenaTags = "";

        //Unimos los tags por comas
        foreach ($tags as $value) {
            $cadenaTags = $cadenaTags . $value['tags'] . ",";
        }

        //convertimos en array
        $aTags = explode(",", $cadenaTags);
        array_pop($aTags);

        //contamos cada tags
        $contTags = array();

        foreach ($aTags as $tag) {
            if (array_key_exists($tag, $contTags)) {
                $contTags[$tag] += 1;
            } else {
                $contTags[$tag] = 1;
            }
        }
        $data = array($blog, $contTags);

        $this->renderHtml('../views/index_view.php', $data);
    }

    // Mostar solo unblog
    public function showBlog($id)
    {

        $objectBlog = Blog::getInstancia();
        $blog = $objectBlog->get($id);


        $this->renderHtml('../views/showBlog_view.php', $blog);
    }

    // crear un blog
    public function actionCreateBlog()
    {
        $arrayBlog = [];
        $blog = array('CrearBlog' => 'Blog');

        $procesaFormulario = false;

        $titulo = "";
        $author = "";
        $blog = "";
        $tags = "";

        if (isset($_POST['enviar'])) {
            $procesaFormulario = true;
            $titulo = limpiarDatos(($_POST['titulo']));
            $author = limpiarDatos(($_POST['author']));
            $blog = limpiarDatos(($_POST['blog']));

            //Subida archivos

            $allowedExts = array("gif", "jpeg", "jpg", "png");
            $temp = explode(".", $_FILES["image"]["name"]);
            $extension = end($temp);
            if ((($_FILES["image"]["type"] == "image/gif")
                    || ($_FILES["image"]["type"] == "image/jpeg")
                    || ($_FILES["image"]["type"] == "image/jpg")
                    || ($_FILES["image"]["type"] == "image/pjpeg")
                    || ($_FILES["image"]["type"] == "image/x-png")
                    || ($_FILES["image"]["type"] == "image/png"))
                && ($_FILES["image"]["size"] < 20000000000)
                && in_array($extension, $allowedExts)
            ) {
                if ($_FILES["image"]["error"] > 0) {
                    echo "Error: " . $_FILES["image"]["error"] . "<br/>";
                } else {
                    $imgSubida = "img" .  date("U") . "." . $extension;

                    move_uploaded_file(
                        $_FILES["image"]["tmp_name"],
                        "img/" . $imgSubida
                    );
                }
            } else {
                echo "<br></br>";
                echo "<b>Debe seleccionar una imagen</b>";
            }




            $tags = limpiarDatos(($_POST['tags']));
            if (empty($titulo)) {
                $procesaFormulario = false;
            }
            if (empty($author)) {
                $procesaFormulario = false;
            }
            if (empty($blog)) {
                $procesaFormulario = false;
            }
            if (empty($imgSubida)) {
                $procesaFormulario = false;
            }
            if (empty($tags)) {
                $procesaFormulario = false;
            }

            if ($procesaFormulario) {
                var_dump($_POST);
                $user = Blog::getInstancia();
                $user->setTitle($titulo);
                $user->setAuthor($author);
                $user->setBlog($blog);
                $user->setImage($imgSubida);
                $user->setTags($tags);
                $user->set();
                header('location: ' . DIRURL . '/blog/list');
            }
        }


        $this->renderHtml('../views/createBlog_view.php', $arrayBlog);
    }

    public function actionShowOneBlog($url)
    {
        $expresionRegular = "/.+\/(\d+)$/";
        preg_match($expresionRegular, $url, $matches);
        $id = $matches['1'];

        if (isset($_POST['enviar'])) {
            $comment = Comment::getInstancia();
            $comment->setBlog_id($id);
            $comment->setUser($_SESSION['email']);
            $comment->setApproved(0);
            $comment->setComment($_POST['comment']);
            $comment->setCreated("01/01/2020");
            $comment->setUpdated("01/01/2020");
            $comment->set();
        }


        if (isset($_POST['aprobar'])) {
            foreach ($_POST as $key => $value) {
                $comment = Comment::getInstancia();
                $comment->validar($key);
            }

            header('location: ' . DIRURL . '/blog/list');
        }
        $objectBlog = Blog::getInstancia();
        $blog = $objectBlog->get($id);

        $this->renderHtml('../views/showBlog_view.php', $blog[0]);
    }
}
