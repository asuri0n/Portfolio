<?php

if(!isset($_GET['c']) or ($_GET['c'] != 'urbex' and $_GET['c'] != 'landscapes' and $_GET['c'] != 'animals')) header('location: index.html');

$images = 'images/'.$_GET['c'].'/fulls';


$subtitle = "Une photographie, c'est un fragment de temps qui ne reviendra pas - Martine Franck";

if($_GET['c'] == 'urbex') {
    $title = "Exploration Urbaine";
} else if($_GET['c'] == 'landscapes') {
    $title = "Paysages";
} else {
    $title = "Photographies Animalière";
}

?>
<!DOCTYPE HTML>
<html lang="fr">
	<head>
		<title>Catégorie <?php echo $_GET['c'] ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload-0 is-preload-1 is-preload-2">

		<!-- Main -->
			<div id="main">

				<!-- Header -->
					<header id="header">
						<h1 style="text-transform: capitalize"><?php echo $title ?></h1>
						<p><?php echo $subtitle ?></p>
						<ul class="icons">
							<li><a href="https://www.instagram.com/nathanchevalierphotos/" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						</ul>
					</header>

				<!-- Thumbnail -->
					<section id="thumbnails">
                        <?php foreach (new DirectoryIterator($images) as $fileInfo) { if($fileInfo->isDot()) continue; ?>
                            <article>
                                <a class="thumbnail" href="images/<?php echo $_GET['c'] ?>/fulls/<?php echo $fileInfo->getFilename() ?>"><img src="images/<?php echo $_GET['c'] ?>/thumbs/<?php echo $fileInfo->getFilename() ?>" alt="" /></a>
                            </article>
                        <?php } ?>
					</section>

				<!-- Footer -->
					<footer id="footer">
						<ul class="copyright">
							<li>&copy; Untitled.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a>.</li>
						</ul>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
