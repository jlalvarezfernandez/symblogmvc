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
echo "<a href=\"#\">Contact</a>";
echo "</li>";
if ($_SESSION['perfil'] == 'usuario') {
    echo "<li>";
    echo "<a href=\"#\">Dashboard</a>";
    echo "</li>";
    
}
echo "</ul>";

echo "</nav>";
