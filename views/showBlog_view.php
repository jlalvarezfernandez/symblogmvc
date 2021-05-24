<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Listar Blog con sus comentarios</h1>
    <?php
    echo $data[0]['title'];
    echo "<br>";
    echo $data[0]['blog'];
    echo "<br>";
    foreach ($data[0]['comment'] as $key => $value) {
        echo $value['comment']. "<br>";
        
    }
    
    
    ?>
    
</body>
</html>