<div class="jumbotron jumbotron-fluid bg-gray text-green ">
  <div class="container">
    <h1 class="display-4">Register</h1>
    <p class="lead">Please register your account below.</p>
  </div>
</div>

<div class="jumbotron jumbotron-fluid">
<div class="container  col-xs-12">
<?php
echo validation_errors("<div class='errors'>", "</div>");

echo form_open();//produces <form>
echo "<table class='form'>";
echo "<tr class='".((strlen(form_error('FirstName'))>0)?"fieldError":"")."'>";
	echo "<td>";
echo form_label("First Name", "FirstName");
	echo "</td>";
	echo "<td>";
echo form_input("FirstName", set_value('FirstName'), array('id'=>'FirstName'));
	echo "</td>";
echo "</tr>";

########################################################################################

$options = array(
	'name' => 'LastName',
	'id' => 'LastName',
	'value' => set_value('LastName'),
);
echo "<tr class='".((strlen(form_error('LastName'))>0)?"fieldError":"")."'>";
	echo "<td>";
echo form_label("Last Name", "LastName");
	echo "</td>";
	echo "<td>";
echo form_input($options);
	echo "</td>";
echo "</tr>";

##########################################################################################

$options['name'] = 'Username';
$options['id'] = 'Username';
$options['value'] = set_value('Username');
echo "<tr class='".((strlen(form_error('Username'))>0)?"fieldError":"")."'>";
	echo "<td>";
echo form_label("Username", "Username");
	echo "</td>";
	echo "<td>";
echo form_input($options);
	echo "</td>";
echo "</tr>";

##########################################################################################

$options['name'] = 'Email';
$options['id'] = 'Email';
$options['value'] = set_value('Email');
echo "<tr class='".((strlen(form_error('Email'))>0)?"fieldError":"")."'>";
	echo "<td>";
echo form_label("Email", "Email");
	echo "</td>";
	echo "<td>";
echo form_input($options);
	echo "</td>";
echo "</tr>";

#########################################################################################

echo "<tr class='".((strlen(form_error('Password'))>0)?"fieldError":"")."'>";
	echo "<td>";
echo form_label("Password", "Password");
	echo "</td>";
	echo "<td>";
echo form_password("Password", "", array('id'=>'Password'));
	echo "</td>";
echo "</tr>";

########################################################################################

echo "<tr class='".((strlen(form_error('PasswordConf'))>0)?"fieldError":"")."'>";
	echo "<td>";
echo form_label("Password Confirmation", "PasswordConf");
	echo "</td>";
	echo "<td>";
echo form_password("PasswordConf", "", array('id'=>'PasswordConf'));
	echo "</td>";
echo "</tr>";

#######################################################################################

echo "<tr class='".((strlen(form_error('Cap'))>0)?"fieldError":"")."'><td></td>";
echo "<td>";
echo $this->recaptcha->create_box(array('id'=>'Cap'));
echo "</td>";

#######################################################################################

echo "<tr>";
	echo "<td></td><td>";
		echo form_submit("MySubmit", "Register User");
echo "</tr>";
echo "</table>";

echo form_close();//produces </form>
?>
</div>
</div>