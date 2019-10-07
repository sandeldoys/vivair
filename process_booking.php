<?php
	//INSERT INTO PASSENGER AND FLIGHT TABLES
	session_start();
	$class = $_SESSION['flight_class'];
	$dep_date = $_SESSION['dep_date'];
	$arr_date = $_SESSION['arr_date'];
	$flight_no_dest = $_SESSION['flight_no_dest'];
	$flight_no_return = $_SESSION['flight_no_return'];

	$fn = $_SESSION['first_name'];
	$mn = $_SESSION['middle_name'];
	$ln = $_SESSION['last_name'];
	$passport_no = $_SESSION['passport_no'];
	$nat = $_SESSION['nationality'];
	$bday = $_SESSION['bday'];
	$email = $_SESSION['email'];
	$phone = $_SESSION['phone'];
	$address = $_SESSION['address'];

	include_once 'connect.php';
	include_once 'functions.php';

	$sqlQueryPas = "INSERT INTO passenger(passport_no,first_name,middle_name,	last_name,birthday,nationality,email,phone,address) VALUES('$passport_no','$fn','$mn','$ln','$bday','$nat','$email','$phone','$address')";

	$SQL = $MySQLiconn->query($sqlQueryPas);

	$book_checker = 1;

	$n=6; 

	while($book_checker==1){
		$book_no = getName($n);
		$book_checker = checkBooking($MySQLiconn, $book_no);
	}

	if($book_checker == 0){ //if booking number not existing
		$book_date = $dep_date;


		$sqlQueryIti = "INSERT INTO itinerary(booking_no,flight_no,passport_no,book_dep_date,book_arr_date,check_in,cancelled) VALUES('$book_no','$flight_no_dest','$passport_no','$book_date','$book_date',0,0)";

		$SQL = $MySQLiconn->query($sqlQueryIti);

		if($_SESSION['flight_no_return']!= ""){
			$book_checker = 1;
			while($book_checker==1){
				$book_no2 = getName($n);
				$book_checker = checkBooking($MySQLiconn, $book_no2);
			}

			if($book_checker == 0){
			$book_date = $arr_date;
			echo $book_date;
			$sqlQueryIti = "INSERT INTO itinerary(booking_no,flight_no,passport_no,book_dep_date,book_arr_date,check_in,cancelled) VALUES('$book_no2','$flight_no_return','$passport_no','$book_date','$book_date',0,0)";

			$SQL = $MySQLiconn->query($sqlQueryIti);
			}
		}

	}

	$_SESSION['book_no'] = $book_no;
	$_SESSION['book_no2'] = $book_no2;
	header("Location: book_flight.php");
?>