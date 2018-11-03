<div class="jumbotron jumbotron-fluid bg-gray text-green ">
  <div class="container">
    <h1 class="display-4">Send Invitations</h1>
    <p class="lead">Please send invitations to any of the people below.</p>
  </div>
</div>

<div class="jumbotron jumbotron-fluid">
<div class="container">
<?php
echo validation_errors("<div class='errors'>", "</div>");

echo form_open();//produces <form>
echo "<table class='form'>";
echo "<tr class='".((strlen(form_error('EventName'))>0)?"fieldError":"")."'>";
	echo "<td>";
		echo form_label("EventName", "eventname");
	echo "</td>";
	echo "<td>";
		echo form_dropdown("eventname", $userEvents, set_value('eventname'), array('id'=>'eventname'));
	echo "</td>";
echo "</tr>";
/***************************************************************************/
$options = "";
echo "<tr class='".((strlen(form_error('invite'))>0)?"fieldError":"")."'>";
	echo "<td>";
		echo form_label("Who do you want to invite?", "invite");
	echo "</td>";
	echo "<td>";
		echo form_multiselect("invite", $allUsers, set_value('invite'), array('id'=>'invite'));
	echo "</td>";
echo "</tr>";
/***************************************************************************/
echo "<tr>";
	echo "<td></td><td>";
		echo form_submit("MySubmit", "Send the iInvites!");
echo "</tr>";
echo "</table>";

echo form_close();//produces </form>
?>