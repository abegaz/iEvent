<script>
  $( function() {
    $( "#datepicker" ).datepicker();
	$( "#datepicker2" ).datepicker();
  } );
</script>

<div class="jumbotron jumbotron-fluid bg-gray text-green ">
  <div class="container">
    <h1 class="display-4">Register</h1>
    <p class="lead">Please register your account below.</p>
  </div>
</div>

<div class="jumbotron jumbotron-fluid">
<div class="container">
<?
echo validation_errors("<div class='errors'>", "</div>");

echo form_open();//produces <form>
echo "<table class='form'>";
echo "<tr class='".((strlen(form_error('EventName'))>0)?"fieldError":"")."'>";
	echo "<td>";
echo form_label("Event Name", "EventName");
	echo "</td>";
	echo "<td>";
echo form_input("EventName", set_value('EventName'), array('id'=>'EventName'));
	echo "</td>";
echo "</tr>";
/***************************************************************************/

$options = array(
	 '1' => 'Public',
	'2' => 'Private'
);
echo "<tr class='".((strlen(form_error('privacy'))>0)?"fieldError":"")."'>";
	echo "<td>";
		echo form_label("Privacy", "privacy");
	echo "</td>";
	echo "<td>";
		echo form_dropdown("privacy", $options, set_value('privacy'), array('id'=>'privacy'));
	echo "</td>";
echo "</tr>";
/***************************************************************************/
$attributes = 'id="datepicker" placeholder="Start Date"';
echo "<tr>";
echo "<td></td><td>";
echo form_input('StartDate', set_value('StartDate'), $attributes);

echo "<script type='text/javascript'>
$(function() {
    $('#StartDate').datepicker();
});
</script>";
echo "</td>";
echo "</tr>";
/***************************************************************************/
$attributes = 'id="datepicker2" placeholder="End Date"';
echo "<tr>";
echo "<td></td><td>";
echo form_input('EndDate', set_value('EndDate'), $attributes);

echo "<script type='text/javascript'>
$(function() {
    $('#EndDate').datepicker();
});
</script>";
echo "</td>";
echo "</tr>";

/***************************************************************************/
$attributes = 'id="Summary" placeholder="Enter a summary of the event" Style="width:100%; height:150px;"';
echo "<tr>";
echo "<td></td><td>";
	echo form_textarea('Summary', set_value('Summary'), $attributes);
echo "</td>";
echo "</tr>";
/***************************************************************************/
echo "<tr>";
	echo "<td></td><td>";
		echo form_submit("MySubmit", "Create Event!");
echo "</tr>";
echo "</table>";

echo form_close();//produces </form>
?>
</div>
</div>
