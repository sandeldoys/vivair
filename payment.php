<?php
	include_once 'header.php';
	session_start();
	// echo $_SESSION['flight_class']."<br>";
	// echo $_SESSION['dep_date']."<br>";
	// if($_SESSION['flight_return']!="oneway"){
	// 	echo $_SESSION['arr_date']."<br>";
	// 	echo $_SESSION['flight_no_return']."<br>";
	// }
	// echo $_SESSION['pas_no']."<br>";
	// echo $_SESSION['flight_no_dest']."<br>";
	

	$_SESSION['first_name'] = $MySQLiconn->real_escape_string($_POST['first_name']);
	$_SESSION['middle_name'] = $MySQLiconn->real_escape_string($_POST['middle_name']);
	$_SESSION['last_name'] = $MySQLiconn->real_escape_string($_POST['last_name']);
	$_SESSION['passport_no'] = $MySQLiconn->real_escape_string($_POST['passport_no']);
	$_SESSION['nationality'] = $MySQLiconn->real_escape_string($_POST['nationality']);
	$_SESSION['bday'] = $MySQLiconn->real_escape_string($_POST['bday']);
	$_SESSION['email'] = $MySQLiconn->real_escape_string($_POST['email']);
	$_SESSION['phone'] = $MySQLiconn->real_escape_string($_POST['phone']);
	$_SESSION['address'] = $MySQLiconn->real_escape_string($_POST['address']);

?>
	<div class="flight-info">
		<div class="pure-g">
			<div class="pure-u-3-4">
				<h1 class="select-flight">PAYMENT INFO</h1>
			</div>
			<div class="pure-u-1-4">
				<h2>FARE DETAILS</h2>
			</div>
		</div>
		<div class="pure-g">
			<div class="pure-u-3-4">
				<form method="post" action="process_booking.php" class="pure-form pure-form-stacked">
					<div class="pure-g">
					<div class="pure-u-1 pure-u-md-1-2 pure-u-lg-1-2">
						<label for="full_name">Full Name: </label><input type="text" name="first_name" class="pure-input-1-2">
					</div>

					<div class="pure-u-1 pure-u-md-1-2 pure-u-lg-1-2">
						<label for="address">Address: </label>
						<textarea name="address" class="pure-input-1-2">
						</textarea>
					</div>

					<div class="pure-u-1 pure-u-md-1-2 pure-u-lg-1-2">
						<label for="card_no">Card Number: </label><input type="number" name="card_no">
					</div>

					<div class="pure-u-1 pure-u-md-1-2 pure-u-lg-1-2">
						<label for="card_name">Cardholder Name: </label><input type="text" name="card_name">
					</div>

					<div class="pure-u-1 pure-u-md-1-2 pure-u-lg-1-2">
						<label for="exp_date">Expiry Date: </label><input type="text" name="exp_date" id="exp_date">
					</div>

					<div class="pure-u-1 pure-u-md-1-2 pure-u-lg-1-2">
						<label for="cvv">CVV: </label><input type="number" name="cvv">
					</div>
						<input type="submit" name="passenger_sub" value="BOOK FLIGHT" class="pure-button">

					</div>
				</form>
			</div>
			<div class="pure-u-1-4">
			<h2>DEPARTURE</h2>
			<h1><?php echo $_SESSION['origin']."-".$_SESSION['dest'];?></h1>

			<h2>ARRIVAL</h2>
			<h1><?php echo $_SESSION['origin']."-".$_SESSION['dest'];?></h1>

			<h2>TOTAL FARE: 
				<?php
					$total =  $_SESSION['price1'];

					if($_SESSION['flight_return']!="oneway"){
						$total =  $_SESSION['price1']+$_SESSION['price2'];
					}
					echo $total."CAD";
				?>
			</h2>
		</div>
		</div>
	</div>
<?php

	include_once 'footer.php';

?>