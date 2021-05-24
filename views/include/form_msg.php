<?php

echo "<form action=\"".DIRURL."/mensaje\"\"method=\"POST\">";
echo "<label for=\"titulo\">Titulo: <input type=\"text\" name=\"titulo\" value=\"" . $titulo . "\"></label>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<label for=\"descripcion\">Descripcion: <input type=\"text\" name=\"descripcion\" value=\"" . $descripcion . "\" size=100></label>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<label for=\"autor\">Autor: <input type=\"text\" name=\"autor\" value=\"" . $autor . "\" size=100></label>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<input type=\"submit\" value=\"Crear Mensaje\" name=\"enviar\">";
echo "</form>";
?>
