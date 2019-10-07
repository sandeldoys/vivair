<?php

if(isset($_POST['book_search'])){

	$book_no = $MySQLiconn->real_escape_string($_POST['booking_number']);
	$SQL = $MySQLiconn->query("SELECT * FROM itinerary WHERE booking_no='".$book_no."'");
	if($SQL->num_rows ==  0){
		$booking = 0;
		echo "<p>Booking number not found.</p>";
	}else{
		$getBookingDetails = $SQL->fetch_array();
		if($getBookingDetails['cancelled']==1){
			echo "<p>Booking number not found.</p>";
		}else{
		 	$booking = 1;
		 	$SQL2 = $MySQLiconn->query("SELECT * FROM flight WHERE flight_no='".$getBookingDetails['flight_no']."'");
		 	$flightBookingDetails = $SQL2->fetch_array();
		}
	}
}

if(isset($_GET['checkin'])){
	 $SQL = $MySQLiconn->query("UPDATE itinerary SET check_in=1 WHERE booking_no='".$_GET['checkin']."'");
	 echo "<p>You are now checked in. For cancellation, call Customer Support (123-2123-3123)</p>";
}

if(isset($_GET['cancel'])){
	 $SQL = $MySQLiconn->query("UPDATE itinerary SET cancelled=1 WHERE booking_no='".$_GET['cancel']."'");
	echo "<p>Booking has been cancelled. For other information, call Customer Support (123-2123-3123)</p>";
}

?>