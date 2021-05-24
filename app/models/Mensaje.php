<?php

require_once('DBAbstractModel.php');

class Mensaje extends DBAbstractModel
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
    private $titulo;
    private $descripcion;
    private $autor;
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
     * Get the value of titulo
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     *
     * @return  self
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }
    /**
     * Get the value of descripcion
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }


    /**
     * Get the value of autor
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * Set the value of autor
     *
     * @return  self
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;

        return $this;
    }

    // Hacemos los metodos del CRUD (create o set, read o get, update o edit, delete)

    // metodo set o create
    public function set()
    {
        $this->query = "INSERT INTO mensaje (titulo, descripcion, autor) VALUES (:titulo, :descripcion, :autor)";

        $this->parametros['titulo'] = $this->titulo;
        $this->parametros['descripcion'] = $this->descripcion;
        $this->parametros['autor'] = $this->autor;
        $this->get_results_from_query();
        $this->mensaje = "Mensaje añadido ";
    }

    // metodo get o read
    //necesitamos parametro siempre 
    public function get($id = '')
    {
        // si el id no esta vacio se hace la consulta
        if ($id != "") {
            $this->query = "SELECT * FROM mensaje WHERE id = :id";
            // cargamos los parametros
            $this->parametros['id'] = $id;

            //Ejecutamos la consulta que devuelve registros
            $this->get_results_from_query();
        }
        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $value) {
                $this->$propiedad = $value;
            }
            $this->mensaje = "Mensaje encontrado";
        } else {
            $this->mensaje = "Mensaje no encontrado";
        }
        return $this->rows;
    }

    // Método update o edit

    public function edit($id = '')
    {
        $this->query = "UPDATE mensaje SET titulo=:titulo, descripcion=:descripcion, autor=:autor WHERE id=:id";
        $this->parametros['titulo'] = $this->titulo;
        $this->parametros['descripcion'] = $this->descripcion;
        $this->parametros['autor'] = $this->autor;
        $this->parametros['id'] = $id;

        $this->get_results_from_query();
        $this->mensaje = "Mensaje modificado";
    }

    //Médodo delete

    public function delete($id = '')
    {
        $this->query = "DELETE FROM mensaje WHERE id=:id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        $this->mensaje = "Mensaje ELIMINADO";
    }


}
