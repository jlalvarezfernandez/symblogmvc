<?php

require_once('DBAbstractModel.php');

class Blog extends DBAbstractModel
{

    private static $instancia; // esto es el modelo singleton

    public static function getInstancia()
    {
        if (!isset(self::$instancia)) {
            $miClase = __CLASS__;
            self::$instancia = new $miClase;
        }
        return self::$instancia;
    }

    // Funcion clone para evitar que no se pueda clonar

    public function __clone()
    {
        trigger_error("La clonación no está permitida!", E_USER_ERROR);
    }

    // VARIABLES

    private $id;
    private $title;
    private $author;
    private $blog;
    private $image;
    private $tags;
    // array que contendrá todos los comentarios que pertenecen a un blog
    private $comment = array();
    private $commentAprobado = array();
    private $commentNoAprobado = array();
    private $created_at;
    private $updated_at;


    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
    /**
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set the value of author
     *
     * @return  self
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get the value of blog
     */
    public function getBlog()
    {
        return $this->blog;
    }

    /**
     * Set the value of blog
     *
     * @return  self
     */
    public function setBlog($blog)
    {
        $this->blog = $blog;

        return $this;
    }

    /**
     * Get the value of image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of tags
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set the value of tags
     *
     * @return  self
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }


    // Hacemos los metodos del CRUD (create o set, read o get, update o edit, delete)

    // metodo set o create
    public function set()
    {
        $this->query = "INSERT INTO blog (title, author, blog, image, tags) VALUES (:title, :author, :blog, :image, :tags)";

        $this->parametros['title'] = $this->title;
        $this->parametros['author'] = $this->author;
        $this->parametros['blog'] = $this->blog;
        $this->parametros['image'] = $this->image;
        $this->parametros['tags'] = $this->tags;
        $this->get_results_from_query();
        $this->mensaje = "Blog añadido ";
    }

    // metodo get o read
    //necesitamos parametro siempre 
    public function get($id = '')
    {
        // creamos un array donde meteremos los comentarios del blog
        $rowsBlog = array();
        // si el id no esta vacio se hace la consulta
        if ($id != "") {
            $this->query = "SELECT * FROM blog WHERE id = :id";
            // cargamos los parametros
            $this->parametros['id'] = $id;

            //Ejecutamos la consulta que devuelve registros
            $this->get_results_from_query();
            // en ese array metemos el blog que nos devuelve la consulta
            $rowsBlog = $this->rows;
        }
        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $value) {
                $this->$propiedad = $value;
            }
            // Devolvemos todos los comentarios que tiene un blog
            //Llamamos al método
            $this->comment = $this->getCommentsBlog($id);
            // ahora en ese array le asignamos los comentarios que nos devuelve la consulta del metodo de los comentarios del blog
            $this->commentAprobado = $this->getApprovedCommentsBlog($id);
            $this->commentNoAprobado = $this->getNotApprovedCommentsBlog($id);
            $rowsBlog[0]['comment'] = $this->comment;
            $rowsBlog[0]['commentAprobado'] = $this->commentAprobado;
            $rowsBlog[0]['commentNoAprobado'] = $this->commentNoAprobado;

            $this->mensaje = "Blog encontrado";
        } else {
            $this->mensaje = "Blog no encontrado";
        }
        // devolvemos toods los datos 
        return $rowsBlog;
    }

    // Método update o edit

    public function edit($id = '')
    {
        $this->query = "UPDATE blog SET title=:title, author=:author, blog=:blog, image=:image, tags=:tags WHERE id=:id";
        $this->parametros['title'] = $this->title;
        $this->parametros['author'] = $this->author;
        $this->parametros['blog'] = $this->blog;
        $this->parametros['image'] = $this->image;
        $this->parametros['tags'] = $this->tags;
        $this->parametros['id'] = $id;

        $this->get_results_from_query();
        $this->mensaje = "Blog modificado";
    }

    //Médodo delete

    public function delete($id = '')
    {
        $this->query = "DELETE FROM blog WHERE id=:id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        $this->mensaje = "Blog ELIMINADO";
    }

    public function getAllBlogs()
    {
        $this->query = "SELECT * FROM blog";
        $this->get_results_from_query();
        $this->mensaje = "Todos los blog";
        return $this->rows;
    }

    public function getAllTags()
    {
        $this->query = "SELECT tags FROM blog";
        $this->get_results_from_query();
        $this->mensaje = "Todos los Tags";
        return $this->rows;
    }



    // método privado para recoger todos los comentarios que pertenecen a un blog
    private function getCommentsBlog($blog_id)
    {
        $this->query = "SELECT * FROM comment WHERE blog_id=:blog_id";
        $this->parametros['blog_id'] = $blog_id;
        $this->get_results_from_query();
        $this->mensaje = "comentarios del blog encontrados";
        return $this->rows;
    }

    private function getApprovedCommentsBlog($blog_id)
    {
        $this->query = "SELECT * FROM comment WHERE blog_id=:blog_id AND approved=1";
        $this->parametros['blog_id'] = $blog_id;
        $this->get_results_from_query();
        $this->mensaje = "comentarios del blog encontrados";
        return $this->rows;
    }

    private function getNotApprovedCommentsBlog($blog_id)
    {
        $this->query = "SELECT * FROM comment WHERE blog_id=:blog_id AND approved=0";
        $this->parametros['blog_id'] = $blog_id;
        $this->get_results_from_query();
        $this->mensaje = "comentarios del blog encontrados";
        return $this->rows;
    }


}
