<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html" ; charset="utf-8" />
    <title>
        symblog

        - symblog</title>
    <!--[if lt IE 9]> <script src="" http://html5shim.googlecode.com/svn/trunk/html5.js"></head>
										</html></script><![endif]-->

    <link href='http://fonts.googleapis.com/css?family=Irish+Grover' rel='styles-heet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=La+Belle+Aurore' rel='styles-heet' type='text/css'>
    <link href="<?php echo DIRPUBLIC . "/css/screen.css" ?>" type="text/css" rel="stylesheet" />
    <link href="<?php echo DIRPUBLIC . "/css/sidebar.css" ?>" type="text/css" rel="stylesheet" />
    <link href="<?php echo DIRPUBLIC . "/css/blog.css" ?>" type="text/css" rel="stylesheet" />
    <link href="<?php echo DIRPUBLIC . "/css/web.css" ?>" type="text/css" rel="stylesheet" />

    <link rel="shortcut icon" href="img/favicon.ico" />
</head>

<body>
    <section id="wrapper">
        <header id="header">
            <div class="top">

                <?php include('include/navigation.php'); ?>

            </div>

            <h2>

                <a href="#">symblog</a>

            </h2>
            <h3>

                <a href="">creating a blog in Symfony2</a>

            </h3>

        </header>
        <div class="infoUsuario">
            <?php
            include('include/cabeceraUsuario_view.php')
            ?>

        </div>

        <article class="blog">
            <header id="header">
                <h2>Dashboard</h2>
            </header>
            <?php

            echo "Opciones del administrador: ";
            echo "<br>";
            echo "<br>";
            echo "<table>";
            echo "<tr><td>Perfil</td><td>Usuario</td></tr>";
            foreach ($data as $key => $value) {
                echo "<tr>";
                echo "<td>";
                echo $value['perfil'];
                echo "</td>";
                echo "<td>";
                echo $value['email'];
                echo "</td>";
                echo "<tr>";
            }
            echo "</table>";
            ?>

        </article>



        <aside class="sidebar">

        </aside>

        <div id="footer">
            Link Manager
        </div>
    </section>
</body>

</html>