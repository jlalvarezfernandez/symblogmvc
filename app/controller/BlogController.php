<?php
require_once('../app/controller/BaseController.php');
require_once('../app/models/Blog.php');

class BlogController extends BaseController
{

    //Mostrar todos los blog

    public function actionListBlog()
    {
        $blog = [];
        $objectBlog = Blog::getInstancia();
        $blog = $objectBlog->getAllBlogs();

        $this->renderHtml('../views/index_view.php', $blog);
    }

    // Mostar solo unblog
    public function showBlog($id)
    {

        $objectBlog = Blog::getInstancia();
        $blog = $objectBlog->get($id);
       
        
        $this->renderHtml('../views/showBlog_view.php', $blog);
    }
  
}
