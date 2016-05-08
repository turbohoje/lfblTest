<?php

$CONFIG_FILE = "config.ini";
$config = parse_ini_file($CONFIG_FILE, true);

header("Access-Control-Allow-Origin: ".$config['server']['host_url']);

//TODO: check for incomplete config files and alarm
?><!doctype html>
<head>
<title><?php echo $config['project']['display_name']; ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="lfbl.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/star-rating.css" media="all" rel="stylesheet" type="text/css" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<script>
var NO_OF_REVIEWS = <?php echo $config['defaults']['reviews_to_show']; ?>;
</script>
</head>
<body>

  	<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?php echo $config['project']['display_name']; ?></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li id="homeButton" class="active"><a href="#">Home</a></li>
            <li id="aboutButton"><a href="#about">About</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
  
    <div class="container-fluid">
		<form role="form" action="">
			<div class="row">
				<div class="checkbox-inline">
			      <label><input id="internal_on" type="checkbox" value="1" <?php echo $config['defaults']['internal_on'] ? "checked='checked'":'' ?> />Internal</label>
			    </div>
			    <div class="checkbox-inline">
			      <label><input id="yelp_on" type="checkbox" value="1" <?php echo $config['defaults']['yelp_on'] ? "checked='checked'":'' ?> >Yelp</label>
			    </div>
			    <div class="checkbox-inline">
			      <label><input id="google_on" type="checkbox" value="1" <?php echo $config['defaults']['google_on'] ? "checked='checked'":'' ?> >Google</label>
			    </div>
	
			    <div class="checkbox-inline" id="input-star">
			    <input id="star_threshold" type="number" class="rating" data-min="0" data-max="5" data-size="sm" data-step="1" data-show-clear="false" data-show-caption="true" value="<?php echo $config['defaults']['threshold'] ?>">
				</div>
			</div>
		</form>
		
		<div id="bis_info"></div>
		<div id="reviews"></div>
      
    </div><!-- /.container -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/star-rating.js" type="text/javascript"></script>
<script src="lfbl.js"></script>
</body>
</html>
