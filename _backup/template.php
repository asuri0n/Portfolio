<?php
	if(!isset($description))
		$description = "Here is my portfolio which contains all the pictures I made. I am a beginner in photography.";

	if(!isset($keywords))
		$keywords = "Urbex Aninams Landscape Photography Photograhie Student Canon 700D";

	if(!isset($titlePage))
        $titlePage = "Home";
?>		

<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo $titlePage ?>  | <?php echo WEB_TITLE ?></title>
		<meta name="description" content="<?php echo $description; ?>">
		<meta name="keywords" content="<?php echo $keywords; ?>">
		<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">
		<script src="https://js-agent.newrelic.com/nr-1039.min.js"></script>
		<base href="" />

		<!-- Google Analytics -->
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-72622621-8', 'auto');
			ga('send', 'pageview');
		</script>
		<!-- End Google Analytics -->

        <!-- Piwik -->
		<script type="text/javascript">
			var _paq = _paq || [];
			/* tracker methods like "setCustomDimension" should be called before "trackPageView" */
			_paq.push(['trackPageView']);
			_paq.push(['enableLinkTracking']);
			(function() {
			var u="//www.nathanchevalier.fr/portfolio/piwik/";
			_paq.push(['setTrackerUrl', u+'piwik.php']);
			_paq.push(['setSiteId', '1']);
			var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
			g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
			})();
		</script>
		<!-- End Piwik Code -->

		<!-- Disabled Click -->
		<script> 
		document.oncontextmenu = new Function("return false");
		</script> 

		<!-- Load CSS file -->
		<link href="<?php WEBROOT ?>assets/css/portfolios-css-reset.css" media="screen" rel="stylesheet" type="text/css">
		<link href="<?php WEBROOT ?>assets/css/theme.css" media="screen" rel="stylesheet" type="text/css" id="theme_css">

		<!-- Load JS files -->
		<script src="<?php WEBROOT ?>assets/js/jquery.min.js" type="text/javascript"></script>
		<!--[if lt IE 9] -->
		<script src="<?php WEBROOT ?>assets/js/html5shiv.js" type="text/javascript"></script>
		<!-- [endif]-->
		<script src="<?php WEBROOT ?>assets/js/theme.js"></script>
		<script src="<?php WEBROOT ?>assets/js/swipe_js.js"></script>
		<script src="<?php WEBROOT ?>assets/js/jquery.mousewheel.js"></script>
		<script src="<?php WEBROOT ?>assets/js/jquery.unveil.min.js"></script>
	</head>
	<body>
	    <header>
	        <ul class="left">
			    <li id="headertitle">
			        <a href="/portfolio" target="_self">
			            Nathan Chevalier™
			        </a>
			    </li>
			    <li class="headercollection <?php echo ($params[0] == "urban-explorations")? "selected" : "" ?>">
			        <a href="urban-explorations" target="_self">Urban Explorations</a>
			    </li>
			    <li class="headercollection <?php echo ($params[0] == "animals")? "selected" : "" ?>">
			        <a href="animals" target="_self">Animals</a>
			    </li>
			    <li class="headercollection <?php echo ($params[0] == "landscapes")? "selected" : "" ?>">
			        <a href="landscapes" target="_self">Landscapes</a>
			    </li>
			</ul>
			<ul class="right">
			    <li><a href="about">About</a></li>
			    <li><a href="contact">Contact</a></li>
			</ul>
	    </header>
	    <main>
	      	<?php echo $content; ?>
	    </main>
	</body>
</html>