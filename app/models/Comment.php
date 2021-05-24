<?php

require_once('DBAbstractModel.php');

class Comment extends DBAbstractModel
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
    private $blog_id;
    private $user;
    private $comment;
    private $approved;
    private $created;
    private $updated;
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
     * Get the value of blog_id
     */
    public function getBlog_id()
    {
        return $this->blog_id;
    }

    /**
     * Set the value of blog_id
     *
     * @return  self
     */
    public function setBlog_id($blog_id)
    {
        $this->blog_id = $blog_id;

        return $this;
    }
    /**
     * Get the value of user
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }
    /**
     * Get the value of comment
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set the value of comment
     *
     * @return  self
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }
    /**
     * Get the value of approved
     */
    public function getApproved()
    {
        return $this->approved;
    }

    /**
     * Set the value of approved
     *
     * @return  self
     */
    public function setApproved($approved)
    {
        $this->approved = $approved;

        return $this;
    }
    /**
     * Get the value of created
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set the value of created
     *
     * @return  self
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }
    /**
     * Get the value of updated
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set the value of updated
     *
     * @return  self
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }


    // Hacemos los metodos del CRUD (create o set, read o get, update o edit, delete)

    // metodo set o create
    public function set()
    {
        $this->query = "INSERT INTO comment (blog_id, user, comment, approved, created, updated) 
        VALUES (:blog_id, :user, :comment, :approved, :created, :updated)";

        $this->parametros['blog_id'] = $this->blog_id;
        $this->parametros['user'] = $this->user;
        $this->parametros['comment'] = $this->comment;
        $this->parametros['approved'] = $this->approved;
        $this->parametros['created'] = $this->created;
        $this->parametros['updated'] = $this->updated;
        $this->get_results_from_query();
        $this->mensaje = "Comentario añadido ";
    }

    // metodo get o read
    //necesitamos parametro siempre 
    public function get($id = '')
    {
        // si el id no esta vacio se hace la consulta
        if ($id != "") {
            $this->query = "SELECT * FROM blog WHERE id = :id";
            // cargamos los parametros
            $this->parametros['id'] = $id;

            //Ejecutamos la consulta que devuelve registros
            $this->get_results_from_query();
        }
        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $value) {
                $this->$propiedad = $value;
            }
            $this->mensaje = "comentario encontrado";
        } else {
            $this->mensaje = "comentario no encontrado";
        }
        return $this->rows;
    }

    // Método update o edit

    public function edit($id = '')
    {
        $this->query = "UPDATE comment SET blog_id=:blog_id, user=:user, comment=:comment, approved=:approved, created=:created updated=:updated WHERE id=:id";
        $this->parametros['blog_id'] = $this->blog_id;
        $this->parametros['user'] = $this->user;
        $this->parametros['comment'] = $this->comment;
        $this->parametros['approved'] = $this->approved;
        $this->parametros['created'] = $this->created;
        $this->parametros['updated'] = $this->updated;
        $this->parametros['id'] = $id;

        $this->get_results_from_query();
        $this->mensaje = "Comentario modificado";
    }

    //Médodo delete

    public function delete($id = '')
    {
        $this->query = "DELETE FROM comment WHERE id=:id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        $this->mensaje = "Comentario ELIMINADO";
    }
}
