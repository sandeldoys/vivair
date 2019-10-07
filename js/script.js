$(document).ready(function(){
	$("#oneway").on('click',function(){
		//disable the return date
		$("#return_box").prop( "disabled", true );
	});

	$("#roundtrip").on('click',function(){
		//enable the return date
		$("#return_box").prop( "disabled", false );
	});

	//shows and hides destinations in flight_search.php
	 $("#origin").change(function () {
	 	var $current_val = $(this).val();
	 	$("#dest option").show();
	 	$("#dest").find("option[value='" + $current_val + "']").hide();
	 });

	 $("#dest").change(function () {
	 	var $current_val = $(this).val();
	 	$("#origin option").show();
	 	$("#origin").find("option[value='" + $current_val + "']").hide();
	 });

	 //disables previous dates
	 var dateToday = new Date();
		var dates = $("#dep_date, #return_box").datepicker({
		    defaultDate: "+1w",
		    dateFormat: "yy-mm-dd",
		    changeMonth: true,
		    numberOfMonths: 2,
		    minDate: dateToday,
		    onSelect: function(selectedDate) {
		        var option = this.id == "dep_date" ? "minDate" : "maxDate",
		            instance = $(this).data("datepicker"),
		            date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
		        dates.not(this).datepicker("option", option, date);
		    }
		});

		var birthday = $("#bday").datepicker({
		    changeMonth: true,
      		changeYear: true,
		    dateFormat: "yy-mm-dd",
		    yearRange: '1940:2019',
 			maxDate: dateToday
		});

		var exp = $("#exp_date").datepicker({
		    changeMonth: true,
      		changeYear: true,
		    dateFormat: "mm-yy",
 			minDate: dateToday
		});

		// $('select').formSelect();
 
		//validation for flight-search.php form
		$("#flight-search-form").submit(function(){


			$flight_return = $('input[name="flight_return"]')
			$flight_return_check = $flight_return.is(':checked');

			$flight_return_value = $('input[name="flight_return"]:checked').val();

			console.log($flight_return_value);

			$origin_input = $('#origin').val();
			$dest_input = $('#dest').val();

			$dep_date_input = $('#dep_date').val();


			if(!$flight_return_check){
				console.log("FALSE");
				return false;
			}else if($origin_input=="blank"||$dest_input=="blank"){
				console.log("origin/destination blank");
				return false;
			}else if($dep_date_input==""){
				console.log("departure date is empty");
				return false;
			}else if($flight_return_value == "roundtrip"){
				$return_box = $('#return_box').val();
				if($return_box==""){
					console.log("arrival date is empty");
					return false;
				}
			}else{
				return true;
			}			
					
		});

		//validation for select-flight.php
		$("#select-flight-form").submit(function(){
			$select_flight_check = $('input[name="select_dest"]').is(':checked');

			$return_flight_check = $('input[name="select_return"]').is(':checked');

			if(!$select_flight_check){
				console.log("please check");
				return false;
			}else{
				alert('Do you want to proceed with this flight info?');
				return true;
			}
		});

});