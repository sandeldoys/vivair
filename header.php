<?php
	include_once 'connect.php';
	include_once 'functions.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Vivair Airlines</title>	
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/pure-min.css" integrity="sha384-oAOxQR6DkCoMliIh8yFnu25d7Eq/PHS21PClpwjOTeU2jRSq11vu66rf90/cZr47" crossorigin="anonymous">
	 <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/grids-responsive-min.css">
	<link rel="stylesheet" type="text/css" href="jquery-ui/jquery-ui.min.css">
	<link rel="stylesheet" type="text/css" href="jquery-ui/jquery-ui.structure.min.css">
	<link rel="stylesheet" type="text/css" href="jquery-ui/jquery-ui.theme.min.css">
	<link rel="stylesheet" type="text/css" href="css/vivair.css">
</head>
<body>

	<header class="header">
	    <div class="home-menu pure-menu pure-menu-horizontal pure-menu-fixed">
	        <a class="pure-menu-heading" href="index.php"><img src="images/logo.svg" alt="logo" height=30px><span class="header-font">VIVAIR</span></a>

	        <ul class="pure-menu-list">
	            <li class="pure-menu-item"><a href="manage_flight.php" class="pure-menu-link">Manage Booking</a></li>
	        </ul>
	    </div>
	</header>