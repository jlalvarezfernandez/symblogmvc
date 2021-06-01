<?php
echo "<form action='".DIRURL."/blog/".$data['id']."' method='post'>";
foreach ($data['commentNoAprobado'] as  $value) {
    echo "Usuario:" . $value['user'];
    echo "<br>";
    echo "<br>";
    echo "Comentario:" . $value['comment'];
    echo "<br>";
    echo "<br>";
    echo "<input type=\"checkbox\" name = '".$value['id']."'>APROBAR Comentario";
    echo "<br>";
    echo "<br>";

}
echo "<input type=\"submit\" value=\"Aprobar Comentarios\" name=\"aprobar\">";
echo "<br>";
echo "<br>";
echo "</form>";
?>
