<?php
ini_set('memory_limit', '-1');
ini_set('max_execution_time', 300); //300 seconds = 5 minutes
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Admin Panel</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Associe le bon titre à la miniature et obtiens un maximum de points !">
    <meta http-equiv="last-modified" content="2016-09-10@14:20:38">
    <link rel="icon" href="../images/favicon.ico" />

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.10/semantic.min.css"/>

	<script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
	<link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">

    <style type="text/css">     
    body {
      height: calc(100% - 7em) !important;
      background: #fcfef5;
    }
    .dont-show {
      display: none;
    }
    #userbutton {
      font-size: .88em;
    }
    #userbutton i {
      font-size: 1rem;
    }
    #maincontent {
      margin-top: 7em;
      margin-bottom: -7em;
    }
    #maincontent .ribbon {
      margin-bottom: 1.3em;
      cursor: default;
    }
    </style>
  </head>
  <body>
     <div class="ui fixed  menu">
      <div class="ui container">
        <a href="#" class="header item">
          <i class="bar chart icon"></i>
          Admin Panel
        </a>

        <a href="#" class="active item">Hjem</a>

        <div class="right menu">
          <div class="borderless item">
            <button id="userbutton" class="ui right labeled icon teal button"><i class="caret down icon"></i> Tormod
            </button>
          </div>
        </div>
      </div>
    </div>

    <div id="maincontent" class="ui main container">
      <div class="ui stackable grid">
        <div class="seven-teen wide column">
          <div id="regInnkommende" class="ui stacked segment">
            <div class="ui form">
              <div>
                <div class="field">
                  <select class="ui fluid dropdown" name="session">
                    <?php 
                      foreach (scandir("/var/www/nathanchevalier/urbex/sessions") as $key => $file)
                      {
                          if(sizeof(explode('.',$file)[1]) == 0)
                            echo "<option value='".$file."'>".$file."</option>";
                      }
                    ?>
                  </select>
                </div>
        				<form action="upload.php" class="dropzone"></form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>    
	<script src="../assets/js/semantic.min.js"></script>
    <script>
    $('#file').change(function() {
      $('#form').submit();
    });

    $(function() {

	    var bar = $('.bar');
	    var percent = $('.percent');
	    var status = $('#status');

	    $('form').ajaxForm({
	        beforeSend: function() {
	            status.empty();
	            var percentVal = '0%';
	            bar.width(percentVal);
	            percent.html(percentVal);
	        },
	        uploadProgress: function(event, position, total, percentComplete) {
	            var percentVal = percentComplete + '%';
	            bar.width(percentVal);
	            percent.html(percentVal);
	        },
	        complete: function(xhr) {
	            status.html(xhr.responseText);
	        }
	    });
	}); 
    </script>
  </body>
</html>