<?php
	session_start();
	$_SESSION['flight_no_dest'] = $_POST['select_dest'];
	if($_SESSION['flight_return']!="oneway"){
		$_SESSION['flight_no_return'] = $_POST['select_return'];
		// echo "HELLO".$_POST['select_return'];
		// echo $_SESSION['arr_date']."<br>";
	}
	// echo $_SESSION['flight_class']."<br>";
	// echo $_SESSION['dep_date']."<br>";
	
	// echo $_SESSION['pas_no']."<br>";
	echo $_SESSION['price1'];
	include_once 'header.php';

?>

	<div class="flight-info">
	<div class="pure-g">
		<div class="pure-u-3-4">
			<h1 class="select-flight">PASSENGER INFO</h1>
		</div>
		<div class="pure-u-1-4">
			<h2>FARE DETAILS</h2>
		</div>
	</div>

	<div class="pure-g">
		<div class="pure-u-3-4">
		<form method="post" action="payment.php" class="pure-form pure-form-stacked">
				<div class="pure-g">
					<div class="pure-u-1 pure-u-md-1-3 pure-u-lg-1-3">
						<label for="first_name">First Name: </label><input type="text" name="first_name" required>
					</div>

					<div class="pure-u-1 pure-u-md-1-3 pure-u-lg-1-3">
						<label for="middle_name">Middle Name: </label><input type="text" name="middle_name" required>
					</div>

					<div class="pure-u-1 pure-u-md-1-3 pure-u-lg-1-3">
						<label for="last_name">Last Name: </label><input type="text" name="last_name" required>
					</div>
					<div class="pure-u-1 pure-u-md-2-3 pure-u-lg-2-3">
						<label for="passport_no">Passport Number: </label><input type="text" name="passport_no" required>
					</div>
					<div class="pure-u-1 pure-u-md-1-3 pure-u-lg-1-3">
						<label for="nationality">Nationality: </label><input type="text" name="nationality" required>
					</div>

					<div class="pure-u-1 pure-u-md-1-3 pure-u-lg-1-3">
						<label for="bday">Birthday: </label><input type="text" name="bday" id="bday" required>
					</div>

					<div class="pure-u-1 pure-u-md-1-3 pure-u-lg-1-3">
						<label for="email">Email: </label><input type="email" name="email" required>
					</div>

					<div class="pure-u-1 pure-u-md-1-3 pure-u-lg-1-3">
						<label for="phone">Phone: </label><input type="number" name="phone" required>
					</div>
					<div class="pure-u-1">
						<label for="address">Address: </label>
						<textarea name="address" class="pure-input-1-2" required>

						</textarea>
					</div>
					<div class="pure-u-1">
						<input type="submit" name="passenger_sub" value="PROCEED TO PAYMENT" class="pure-button">
					</div>
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