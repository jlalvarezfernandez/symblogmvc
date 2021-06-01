<?php
$tags = $data[1];


foreach ($tags as $key => $value) {
   echo "<span style ='font-size: ".(16+$value*3)."px'>".$key."</span>";
}

?>