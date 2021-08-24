<?php 
include 'header.php'; 
require 'includes/check.php';
?>

<section class="wrapper chatroom-wrapper events forum-wrapper">
<div class="page-title">
<div><span class="header">EVENT PLANNER&nbsp; <i class="far fa-calendar-alt"></i></span>
<a href="index.php" target="_self" class="events live-chat">Home</a>

<div class="reserve-seat">
	<div class="event-explain">Up coming Events!</div>
</div>

<div class="regMessage">
<div id="event_bug_msg"></div>
</div>

<fieldset class="event-planner">
	<span class="a-seat">Book a Seat!</span> 
	<div class="bg-picture"></div><br />
	<form action="events.php" method="POST">
		<legend>Enter phone number		
		<input type="number" name="phoneNumber" id="phoneNum" placeholder="Enter your mobile number" ng-model="number" onKeyPress="if(this.value.length == 18) return false;" min="0" autocomplete="off">
		</legend>
		<input type="submit" name="evenBtn" id="eventButton" class="button" value="Reserve a seat for me">
	</form>
</fieldset>

</div>
</div>

<div id="eventinfo">
	<ul><span>Up coming Event</span>
		<li><span>Event Name:</span> Alpha team summit </li>
		<li><span>Event Time:</span> 9.00 AM</li>
		<li><span>Event Date:</span> SAT, 25th May 2019 </li>
		<li><span>Event Venue:</span> Sharon Hotel & Suit Asaba, Delta State.</li>
	</ul>
	<a href="#"><div title="View on Google Map"></div>
	</a>
</div>

</section>

<script>

let elem = $("#event_bug_msg");
$("#eventButton").click(()=> {
	if($("#phoneNum").val() == ''){
		elem.html("<div class='event_error_msg'>Please enter your phone number</div>");
		return false;
	} else {
		return true;
	}
});

$(".msgBtnEvent").click(function(){
$(".regMessage").hide();
});
</script>

<?php include 'x-footer.php'; ?>