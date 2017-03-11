$('#signupform-region').change(function(){
	
	var regionval = $('#signupform-region').val();
	selectCity(regionval);
});

function selectCity(regionval){
	var city = $('#signupform-city');

	$('#signupform-city').prop('disabled',false);
	clear(city);
}