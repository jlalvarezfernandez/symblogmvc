<?php
echo "<form action=\"".DIRURL."/blog/create\" method=\"POST\" enctype=\"multipart/form-data\">";
echo "<br>";
echo "<label for=\"author\">Autor: <input type=\"text\" name=\"author\" ></label>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<label for=\"titulo\">Titulo: <input type=\"text\" name=\"titulo\" ></label>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<label for=\"blog\">Blog: <input type=\"text\" name=\"blog\"></label>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<label for=\"image\">Imagen: <input type=\"file\" name=\"image\"></label>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<label for=\"tags\">Etiquetas: <input type=\"text\" name=\"tags\" ></label>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<input type=\"submit\" name= \"enviar\" value=\"Enviar\">";
echo "<br>";
echo "</form>";
echo "<br>";