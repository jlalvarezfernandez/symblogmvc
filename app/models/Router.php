<?php

class Router
{
    // creamos un array donde guardaremos las rutas
    private $aRoute = array();

    // Método para añadir rutas

    public function addRoute($route)
    {
        array_push($this->aRoute, $route);
    }

    // Método para comprobar las rutas

    public function match($request)
    {
        // comprobamos si el $request esta en la ruta
        $matches = array();
        foreach ($this->aRoute as $ruta) {
            $patron = $ruta['path'];
            if (preg_match($patron, $request)) {
                $matches = $ruta;
            }
        }
        return $matches;
    }
}
