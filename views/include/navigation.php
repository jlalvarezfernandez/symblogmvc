<?php

echo "<nav>";
echo "<ul class=\"navigation\">";
echo "<li>";
echo "<a href=\"".DIRURL."/blog/list\">Home</a>";
echo "</li>";
echo "<li>";
echo "<a href=\"".DIRURL."/about\">About</a>";
echo "</li>";
echo "<li>";
echo "<a href=\"".DIRURL."/mensaje\">Contact</a>";
echo "</li>";
if ($_SESSION['perfil'] == 'administrador') {
    echo "<li>";
    echo "<a href=\"".DIRURL."/admin\">Dashboard</a>";
    echo "</li>";
    
}
if ($_SESSION['perfil'] == 'editor') {
    echo "<li>";
    echo "<a href=\"".DIRURL."/blog/create\">Crear Blog</a>";
    echo "</li>";
    
}
echo "</ul>";

echo "</nav>";
