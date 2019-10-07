<?php
	include_once 'header.php';
	
?>
<h1>Vivair Airlines</h1>

<div class="flight-info">
<h1 class="select-flight">MANAGE BOOKING</h1>
<form method="post" action="manage_flight.php" class="pure-form">
	<label for="booking_number">Insert Booking Number: </label><input type="text" name="booking_number">
	<input type="submit" name="book_search" value="SEARCH BOOKING" class="pure-button">
</form>

<?php
	$booking = 0;
	include_once 'book_search_crud.php';
	if($booking==1){
		if($getBookingDetails['cancelled']==0){
			echo "<h2>BOOKING NUMBER: ".$getBookingDetails['booking_no']."</h2>";
?>
	<h2>ITINERARY:</h2>
<?php
			echo "<h3>FLIGHT NUMBER: ".$getBookingDetails['flight_no']."</h3>";

?>

			<div class='pure-u-1 pure-u-md-1-4'>
			<h1 class='flight-no'><?php echo $flightBookingDetails['origin']." ".$flightBookingDetails['dep_time']?> </h1>
			<h2>
				<?php
				$city = getFlightCode($flightBookingDetails['origin']);
				echo $city;
				
				?>
			</h2>
			<h3><?php echo $getBookingDetails['book_dep_date'];?></h3>
			</div>

			<div class='pure-u-1 pure-u-md-1-4'>
			<h1 class='flight-no'><?php echo $flightBookingDetails['destination']." ".$flightBookingDetails['arr_time']?></h1>
			<h2>
				<?php
				$city2 = getFlightCode($flightBookingDetails['destination']);
				echo $city2;
				?>
			</h2>
			<h3><?php echo $getBookingDetails['book_arr_date'];?></h3>
			</div>
<?php
		if($getBookingDetails['check_in']==0){

?>
	<div class='pure-u-1'>
	<a href="?checkin=<?php echo $getBookingDetails['booking_no'] ?>" onclick="return confirm('Would you like to check-in flight?'); " class="pure-button" >Check In</a>

	<a href="?cancel=<?php echo $getBookingDetails['booking_no'] ?>" onclick="return confirm('Would you like to cancel your booking'); " class="pure-button button-warning" >Cancel Booking</a>

<?php
			}else if($getBookingDetails['check_in']==1){
				echo "<p>You are already checked in. For cancellation, call Customer Support (123-2123-3123)</p>";
			}
		}
	}
?>
</div>
</div>
<?php
	include_once 'footer.php';
?>