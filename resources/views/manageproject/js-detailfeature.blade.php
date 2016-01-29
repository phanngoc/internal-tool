<script type="text/javascript">
	function getToday() {
		var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth()+1; //January is 0!
		var yyyy = today.getFullYear();

		if(dd<10) {
		    dd='0'+dd
		} 

		if(mm<10) {
		    mm='0'+mm
		} 
		today = yyyy+'-'+mm+'-'+dd+' '+'00:00:00';
		return today;
	}
</script>

<!-- Jquery ui     -->
<script type="text/javascript" src="{{ Asset('jquery-ui/jquery-ui.js') }}"></script>
<link rel="stylesheet" href="{{ Asset('jquery-ui/jquery-ui.css') }}"></script>

<!-- Bootstrap slider -->
<script type="text/javascript" src="{{ Asset('bootstrap-slider/bootstrap-slider.min.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ Asset('bootstrap-slider/bootstrap-slider.min.css') }}" />

<!-- Select 2 -->
<script type="text/javascript" src="{{ Asset('bootstrap/js/select2.min.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ Asset('bootstrap/css/select2.min.css') }}" />
