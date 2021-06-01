<?php

require_once('DBAbstractModel.php');

class Registro extends DBAbstractModel
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

    private $email;
    private $password;
    private $perfil;
    private $created_at;
    private $updated_at;

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }


    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of perfil
     */
    public function getPerfil()
    {
        return $this->perfil;
    }

    /**
     * Set the value of perfil
     *
     * @return  self
     */
    public function setPerfil($perfil)
    {
        $this->perfil = $perfil;

        return $this;
    }

    // Hacemos los metodos del CRUD (create o set, read o get, update o edit, delete)

    // metodo set o create
    public function set()
    {
        $this->query = "INSERT INTO users (email, password, perfil) VALUES (:email, :password, :perfil)";

        $this->parametros['email'] = $this->email;
        $this->parametros['password'] = $this->password;
        $this->parametros['perfil'] = $this->perfil;
        $this->get_results_from_query();
        $this->mensaje = "Usuario añadido ";
    }

    // metodo get o read
    //necesitamos parametro siempre 
    public function get($id = '')
    {
        // si el id no esta vacio se hace la consulta

    }

    // Método update o edit

    public function edit($id = '')
    {
    }

    //Médodo delete

    public function delete($id = '')
    {
    }

   
}
