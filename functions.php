<?php
	function getName($n) { 
	    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
	    $randomString = ''; 
	  
	    for ($i = 0; $i < $n; $i++) { 
	        $index = rand(0, strlen($characters) - 1); 
	        $randomString .= $characters[$index]; 
	    } 
	  
	    return $randomString; 
	}


	function checkBooking($MySQLiconn, $book_no){
		$SQL = $MySQLiconn->query("SELECT booking_no FROM itinerary WHERE booking_no='".$book_no."'");

			if ($SQL->num_rows>0){
				return 1;
			}else return 0;
	}

	function getFlightCode($flight_code){

		switch($flight_code){
			case "YVR":
				$city = "Vancouver(YVR)";
				break;

			case "YYC":
				$city = "Calgary(YYC)";
				break;
			
			case "YWG":
				$city = "Winnipeg(YWG)";
				break;

			case "YYZ":
				$city = "Toronto(YYZ)";
				break;
		}

		return $city;
	}

	function getflightClass($flight_class){
		if($flight_class=="eco"){
			return "Economy";
		}else if($flight_class=="biz"){
			return "Business";
		}
	} 

?>