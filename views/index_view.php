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

		foreach ($data[0] as $key => $blog) { ?>


			<article class="blog">
				<div class="date"><time datetime="<?php echo $blog['created_at']; ?>"></time></div>
				<header>
					<h2><a href="<?php echo DIRPUBLIC . '/index.php/blog/' . $blog['id'] ?>"><?php echo $blog['title'] ?></a></h2>
				</header>

				</header>
				<img src="<?php echo DIRPUBLIC . '/img/' . $blog['image'] ?>" />
				<div class="snippet">
					<p><?php echo $blog['blog'] ?></p>
					<p class="continue"><a href="...">Continue reading...</a></p>
				</div>

				<footer class="meta">
					<p>Comments: <a href="#"> </a></p>
					<p>Posted by <span class="highlight"><?php echo $blog['author'] ?></span> at </p>
					<p>Tags: <a href="#" class="highlight"><?php echo $blog['tags'] ?></a></p>
				</footer>
			</article>
		<?php }	?>


		<aside class="sidebar">
			<?php
			include('include/tags_view.php');
			?>

		</aside>

		<div id="footer">
			Link Manager
		</div>
	</section>
</body>

</html>