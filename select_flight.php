<?php
	session_start();
	include_once 'header.php';
	if(isset($_POST['search'])){
		$arr_date = "";

		$_SESSION['flight_class'] = $MySQLiconn->real_escape_string($_POST['flight_class']);
		$_SESSION['dep_date'] = $MySQLiconn->real_escape_string($_POST['dep_date']);
		$_SESSION['flight_return']=$_POST['flight_return'];

		if($_POST['flight_return']!="oneway"){
			$_SESSION['arr_date'] = $MySQLiconn->real_escape_string($_POST['arr_date']);
			$arr_date = $MySQLiconn->real_escape_string($_POST['arr_date']);
		}

		$_SESSION['pas_no'] = $MySQLiconn->real_escape_string($_POST['pas_no']);

		$origin = $MySQLiconn->real_escape_string($_POST['origin']);
		$dest = $MySQLiconn->real_escape_string($_POST['dest']);

		$_SESSION['origin'] = $origin;
		$_SESSION['dest'] = $dest;

?>
	<div class="flight-info">
	<h1 class="select-flight"><?php echo "Flights from ".$origin." to ".$dest?></h1>
	<form action="passenger.php" method="post" id="select-flight-form">
<?php
		$sql = $MySQLiconn->query("SELECT * from flight WHERE origin='$origin' AND destination='$dest'");

		
		while($row=$sql->fetch_array()){
			$flightNumber = $row['flight_no'];
			$flightClass = $_POST['flight_class'];

			$priceQuery = $MySQLiconn->query("SELECT price from fares WHERE flight_no='$flightNumber' AND class='$flightClass'");

			$row3=$priceQuery->fetch_array();
			$price = $row3['price'];
			$_SESSION['price1'] = $price;
			

?>
			<div class='pure-g'>
			<div class='pure-u-1'>
				<h2><?php echo $row['flight_no']."(".$row['aircraft_type'].")"?></h2>
			</div>

			<div class='pure-u-1 pure-u-md-1-4'>
			<h1 class='flight-no'><?php echo $row['origin']." ".$row['dep_time']?> </h1>
			<h2>
				<?php
				$city = getFlightCode($row['origin']);
				echo $city;
				?>
			</h2>
			</div>

			<div class='pure-u-1 pure-u-md-1-4'>
			<h1 class='flight-no'><?php echo $row['destination']." ".$row['arr_time']?></h1>
			<h2>
				<?php
				$city2 = getFlightCode($row['destination']);
				echo $city2;
				?>
			</h2>
			</div>
			<div class='pure-u-1 pure-u-md-1-4'>
			<h2 class="text-center"><?php
				$flightClassfull = getflightClass($flightClass);
				echo $flightClassfull;
			?></h2>
			<h1 class='flight-no text-center price'><?php echo $price?>CAD</h1>
			</div>
			<br>
			<div class='pure-u-1 pure-u-md-1-4 text-center'>
			<h3>SELECT FLIGHT</h3>
			<label for="select_dest" class="pure-radio">
				<input class="text-center" name="select_dest" type="radio" value="<?php echo $row['flight_no'] ?>">
			</label>
			</div>
			</div>
			<br>
		<?php
		}

		if($arr_date!=""){
		?>

		<h1 class="select-flight"><?php echo "Flights from ".$dest." to ".$origin?></h1>

		<?php
			$sql2 = $MySQLiconn->query("SELECT * from flight WHERE origin='$dest' AND destination='$origin'");


			while($row2=$sql2->fetch_array()){
				$flightNumber = $row2['flight_no'];
				$flightClass = $_POST['flight_class'];

				$priceQuery = $MySQLiconn->query("SELECT price from fares WHERE flight_no='$flightNumber' AND class='$flightClass'");

				$row3=$priceQuery->fetch_array();
				$price = $row3['price'];
				$_SESSION['price2'] = $price;
				?>
				<div class='pure-g'>
				<div class='pure-u-1'>
					<h2><?php echo $row2['flight_no']."(".$row2['aircraft_type'].")"?></h2>
				</div>

				<div class='pure-u-1 pure-u-md-1-4'>
				<h1 class='flight-no'><?php echo $row2['origin']." ".$row2['dep_time']?> </h1>
				<h2>
					<?php
					$city = getFlightCode($row2['origin']);
					echo $city;
					?>
				</h2>
				</div>

				<div class='pure-u-1 pure-u-md-1-4'>
				<h1 class='flight-no'><?php echo $row2['destination']." ".$row2['arr_time']?></h1>
				<h2>
					<?php
					$city2 = getFlightCode($row2['destination']);
					echo $city2;
					?>
				</h2>
				</div>
				
				<div class='pure-u-1 pure-u-md-1-4'>
				<h2 class="text-center"><?php
					$flightClassfull = getflightClass($flightClass);
					echo $flightClassfull;
				?></h2>
				<h1 class='flight-no text-center price'><?php echo $price?>CAD</h1>
				</div>
				<br>
				<div class='pure-u-1 pure-u-md-1-4'>
				<h3>SELECT FLIGHT</h3>
				<label for="select_return" class="pure-radio">
					<input name="select_return" type="radio" value="<?php echo $row2['flight_no'] ?>">
				</label>
				</div>
				</div>
			<?php
			}
		}
	}


?>

	<button class="pure-button">Proceed</a></button>

	</form>
	</div>	

<?php
	include_once 'footer.php';
?>



