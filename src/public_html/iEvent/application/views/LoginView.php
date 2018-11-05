<div class="jumbotron jumbotron-fluid bg-gray text-green ">
  <div class="container">
    <h1 class="display-4">Login</h1>
    <p class="lead">Please login, or click register below to create an account.</p>
  </div>
</div>

<div class="jumbotron jumbotron-fluid">
<div class="container">

<?
echo validation_errors("<div class='errors'>", "</div>");

echo form_open();//produces <form>
echo "<table class='form'>";

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

#####################################################################################

echo "<tr class='".((strlen(form_error('Password'))>0)?"fieldError":"")."'>";
	echo "<td>";
echo form_label("Password", "Password");
	echo "</td>";
	echo "<td>";
echo form_password("Password", "", array('id'=>'Password'));
	echo "</td>";
echo "</tr>";

#####################################################################################

echo "<tr class='".((strlen(form_error('Cap'))>0)?"fieldError":"")."'><td></td>";
echo "<td>";
echo $this->recaptcha->create_box(array('id'=>'Cap'));
echo "</td>";

#####################################################################################

echo "<tr class='buttons'><td></td><td>";
echo form_submit("Login", "Login");
echo form_submit("createUser", "Register");
echo "</td></tr></table>";
echo form_close();//produces </form>
?>
</div>
</div>

<script>
grecaptcha.ready(function() {
grecaptcha.execute('6Ld4tXgUAAAAAPBEobjzvKU9qbtnLP2eu1nDabcE', {action: 'action_name'})
.then(function(token) {
// Verify the token on the server.
});
});
</script>