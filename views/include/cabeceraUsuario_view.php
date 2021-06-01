<?php
echo "Usted esta como " . $_SESSION['perfil'];
if ($_SESSION['perfil'] == 'invitado') {
    echo "<form action=\"http://localhost/symblog/public/index.php/user/login\" method=\"post\">";
    echo "<label for=\"email\">";
    echo "<input type=\"text\" name=\"email\" placeholder=\"Email\">";
    echo "</label>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<label for=\"password\">";
    echo "<input type=\"text\" name=\"password\" placeholder=\"Password\">";
    echo "</label>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<input type=\"submit\" name=\"enviar\" value=\"enviar\">";
    echo "</form>";
    echo "No tienes cuenta?";
    echo "<a href=\"".DIRURL."/registro\">REGISTRATE</a>";
} else {
    echo "<a href=\"http://localhost/symblog/public/index.php/user/logout\"><h3>LogOut</h3></a>";
}
