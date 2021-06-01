<?php
echo "<h2> Añadir Nuevo Comentario";
echo "<br>";
echo "<br>";
echo "<form action='".DIRURL."/blog/".$data['id']."' method='post'>";
echo "<label for=\"comment\">Comentario: <input type=\"text\" name=\"comment\"></label>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<input type=\"submit\" value=\"Enviar\" name=\"enviar\">";
echo "<br>";
echo "<br>";
echo "</form>";
?>