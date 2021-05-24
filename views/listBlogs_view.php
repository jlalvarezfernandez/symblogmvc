<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Listado de blogs</h1>
    <?php
    foreach($data as $key=>$value){
        echo $value['title']."<br>";
        echo $value['author']."<br>";
        echo $value['blog']."<br>";
        echo $value['image']."<br>";
        echo $value['tags']."<br>";
    }
    ?>
    
</body>
</html>