<!DOCTYPE html>
<html>
<head>
	<title>jQuery Event Calendar Demo Page</title>

	<!-- Core CSS File. The CSS code needed to make eventCalendar works -->
	<link rel="stylesheet" href="css/eventCalendar.css">

	<!-- Theme CSS file: it makes eventCalendar nicer -->
	<link rel="stylesheet" href="css/eventCalendar_theme_responsive.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>

</head>
<body id="responsiveDemo">
				<div id="eventCalendarHumanDate" style="width:50%"></div>
				<script>
					$(document).ready(function() {
						$("#eventCalendarHumanDate").eventCalendar({
							eventsjson: 'json/event.humanDate.json.php',
							jsonDateFormat: 'human'  // 'YYYY-MM-DD HH:MM:SS'
						});
					});
				</script>
</body>

<!--script src="js/jquery.timeago.js" type="text/javascript"></script-->
<!--<script src="js/jquery.eventCalendar.min.js" type="text/javascript"></script>-->
<script src="js/jquery.eventCalendar.js" type="text/javascript"></script>




</html>