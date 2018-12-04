<script type="text/javascript">

function confirmChange(form) 
{
	if (confirm('You are about to change your user permissions.\nSome pages may become unavaiblable.\nDo you wish to continue?')) {
		form.submit("logout");
	}
	else {
		alert("You decided to not submit the form!");
	}
}
</script>

<p> This is a test view.
<br /><br />
<? 
$c = 0;
foreach ($Names as $val)
	{
		if ($c == 0)
		{
			echo 'Your user roles include: '.$val;
		}
		if ($c > 0)
		{
			echo ', '.$val;
		}
	};?>
</p>

<?
	echo form_open();
	echo form_label("User", "user");
	echo form_checkbox("user","accept", $user);
	echo form_label("Trainer", "trainer");
	echo form_checkbox("trainer","accept", $trainer);
	echo form_label("Administrator", "admin");
	echo form_checkbox("admin","accept", $admin);
	$js = 'onClick="confirmChange(this.form)"';
	echo form_submit("logout", "Change Permissions!");
	echo form_close();
?>