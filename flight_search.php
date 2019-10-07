<form action="select_flight.php" method="post" class="pure-form" id="flight-search-form">
	<div class="pure-g pure-form-stacked my-form-class">
		<div class="pure-u-1">	
			<input type="radio" name="flight_return" value="roundtrip" id="roundtrip">
			<label class="pure-radio my-radio">Round-trip</label>
			
			<input type="radio" name="flight_return" value="oneway" id="oneway">	
			<label class="pure-radio my-radio">One-way</label>	
		</div>

<?php
	$res1 = $MySQLiconn->query("SELECT distinct origin FROM flight");
?>
	<div class="pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">
	<label for="origin">From: </label><select name="origin" id="origin">
		<option value="blank">Select origin</option>

	<?php
	while($row=$res1->fetch_array())
	{
		echo '<option value="'.$row['origin'].'">';
		$city = getFlightCode($row['origin']);
		echo $city;
		echo '</option>';
	}
	?>

	</select>
	</div>

	<?php
	$res2 = $MySQLiconn->query("SELECT distinct destination FROM flight");
	?>
	<div class="pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">
	<label for="dest">To: </label><select name="dest" id="dest">
		<option value="blank">Select destination</option>
	<?php
	while($row=$res2->fetch_array())
	{
		echo '<option value="'.$row['destination'].'">';
		$city2 = getFlightCode($row['destination']);
		echo $city2;
		echo '</option>';
	}
	?>
	</select>
	</div>
	

	<div class="pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">
		<label for="dep_date">Departure date: </label><input type="text" name="dep_date" id="dep_date">
	</div>

	<div class="pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">
		<label for="arr_date">Return date: </label>
		<input type="text" name="arr_date" id="return_box">
	</div>

	<div class="pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">
	<label for="flight_class">Class: </label>
	<select name="flight_class" class="pure-input-1">
		<option value="eco">Economy</option>
		<option value="biz">Business</option>
	</select>
	</div>
	<div class="pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">
	</div>
	<div class="pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">
		<label for="pas_no">Passengers:</label> <input type="number" name="pas_no" min="1" max="10" value="1">
	</div>
	<div class="pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">
		<button type="submit" name="search" id="flight_search" class="pure-button pure-button-primary my-button">Search Flights</button>
	</div>
	</div>
</form>