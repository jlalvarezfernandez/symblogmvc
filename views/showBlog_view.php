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
        <?php

        ?>


        <article class="blog">
            <div class="date"><time datetime="<?php echo $data['created_at']; ?>"></time></div>
            <header>
                <h2><a href="<?php echo DIRPUBLIC . "/index.php/blog/list" . $data['id'] ?>"><?php echo $data['title']; ?></a></h2>
            </header>

            
            <img src="<?php echo DIRPUBLIC . '/img/' . $data['image'] ?>" />
            <div class="snippet">
                <p><?php echo $data['blog'] ?></p>

            </div>

            <footer class="meta">
                <p>Comments: <a href="#"> </a></p>

                <?php
                foreach ($data['commentAprobado'] as $key => $value) {
                    echo "<h2>Autor: <b>" . $value['user'] . "</b></h2>";
                    echo $value['comment'] . "<br>";
                }


                ?>
                <br>
                <p>Posted by <span class="highlight"><?php echo $data['author'] ?></span> at </p>
                <p>Tags: <span class="highlight"><?php echo $data['tags'] ?></span></p>
            </footer>
        </article>
        <?php     ?>


        <aside class="sidebar">
            <?php

            if ($_SESSION['perfil'] != 'invitado') {
                include('include/crearComentario_view.php');
            }

            ?>

        </aside>
        <?php

        if ($_SESSION['perfil'] == 'editor' || $_SESSION['perfil'] == 'administrador') {
            include('include/showCommentNoAprobado_view.php');
        }

        ?>



        <div id="footer">
            Link Manager
        </div>
    </section>
</body>

</html>