<?php

require_once('DBAbstractModel.php');

class Auth extends DBAbstractModel{

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

     // Hacemos los metodos del CRUD (create o set, read o get, update o edit, delete)

    // metodo set o create
    public function set()
    {
        
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

    public function login($email, $pass)
    {
        
        $this->query = "SELECT * FROM users WHERE email=:email and password=:password";
        $this->parametros['email'] = $email;
        $this->parametros['password'] = $pass;
        $this->get_results_from_query();
        //autenticacion

        return $this->rows;
    }
}