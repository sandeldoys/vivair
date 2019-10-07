<?php
	session_start();
	$book_no = $_SESSION['book_no'];
	$book_no2 = $_SESSION['book_no2'];
	include_once 'header.php';
	
?>

	<div class="flight-info">
	<h2>Thank you for booking your booking number is <?php echo $book_no; if($book_no2!="") echo " and ".$book_no2?>
	</h2>
	<?php 
	session_unset(); 
	session_destroy(); 
	?>
	<p>Return to <a href="index.php">home</a></p>
	</div>
<?php
	
	
	include_once 'footer.php';
	
?>