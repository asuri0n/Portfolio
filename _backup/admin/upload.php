<?php
ini_set('memory_limit', '-1');
ini_set('max_execution_time', 300); //300 seconds = 5 minutes

$path = "/var/www/nathanchevalier/urbex/";

if(isset($_FILES['file'])/* and !empty($_POST['session'])*/)
{
	//$session = $_POST['session'];
	$delete = (isset($_POST['delete'])) ? true : false;
	$error = false;

	if($delete)
	{
		$files = glob($path+'sessions/annimaux/images/fulls/*'); // get all file names
		foreach($files as $file){ // iterate files
		  if(is_file($file))
		    unlink($file); // delete file
		}
		$files = glob($path+'sessions/annimaux/images/thumbs/*'); // get all file names
		foreach($files as $file){ // iterate files
		  if(is_file($file))
		    unlink($file); // delete file
		}
  		echo '<script>alert("Photos de la session '.$session.' supprimées !")</script>'; 
	}

  	foreach ($_FILES["file"]["error"] as $key => $error) 
  	{
	    if ($error == UPLOAD_ERR_OK) 
	    {
	      	list($width, $height, $type, $attr) = getimagesize($_FILES["file"]["tmp_name"][$key]);
	      	$infosfichier = pathinfo($_FILES["file"]['name'][$key]);
	      	$extension_upload = $infosfichier['extension'];
	      	$dest = $path+'sessions/annimaux/images/fulls/'.$_FILES["file"]['name'][$key];
	      	if(move_uploaded_file($_FILES["file"]['tmp_name'][$key], $dest))
	        	$error = true;

	      	$new_width = $width/20;
	      	$new_height = $height/20;
	      	$t = imagecreatefromjpeg($dest);
	      	$s = imagecreatetruecolor($new_width, $new_height);
	      	$x = imagesx($t);
	      	$y = imagesy($t);
	     	imagecopyresampled($s, $t, 0, 0, 0, 0, $new_width, $new_height, $x, $y);
	      	if(imagejpeg($s, $path+'sessions/annimaux/images/thumbs/'.$_FILES["file"]['name'][$key]))
	        	$error = true;
	    } else 
	        echo '<script>alert("Erreur Upload : "'+$error+')</script>'; 
  	}

  	if($error)
  		echo '<script>alert("ERREUR ajout photos !")</script>'; 
  	else
  		echo '<script>alert("Photos ajoutées !")</script>'; 
}
?>