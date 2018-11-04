<h1>All Current Users</h1>

<table border=1 Style="border:thin">
<tr>
	<td>UserID</td>
    <td>Full Name</td>
    <td>Username</td>
    <td>Email Address</td>
</tr>
<?

	for($i=0; $i < count($Name); $i++)
	{
		echo "<tr>";
		echo "<td>".$UserID[$i]."</td>";
		echo "<td>".$Name[$i]."</td>";
		echo "<td>".$Username[$i]."</td>";
		echo "<td>".$Email[$i]."</td>";
		echo "</tr>";
	}

?>
</table>
