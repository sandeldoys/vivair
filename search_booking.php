<?php
	include_once 'header.php';
	include_once 'book_search_crud.php';
	if($booking==1){
	if($getBookingDetails['cancelled']==0){
		echo $getBookingDetails['booking_no']."<br>";
		echo $getBookingDetails['flight_no']."<br>";
		echo $getBookingDetails['book_dep_date']."<br>";
		echo $getBookingDetails['book_arr_date']."<br>";

		if($getBookingDetails['check_in']==0){

?>
	<a href="?checkin=<?php echo $getBookingDetails['booking_no'] ?>" onclick="return confirm('Would you like to check-in flight?'); " >Check In</a>

	<a href="?cancel=<?php echo $getBookingDetails['booking_no'] ?>" onclick="return confirm('Would you like to cancel your booking'); " >Cancel Booking</a>

<?php
		}else if($getBookingDetails['check_in']==1 || $_GET['checkinstatus']==1){
			echo "<p>You are now checked in. For cancellation, call Customer Support (123-2123-3123)</p>";
		}
	}else if($_GET['cancelstatus']==1){
		echo "<p>Booking has been cancelled.</p>";
	}
	}
	include_once 'footer.php';
?>