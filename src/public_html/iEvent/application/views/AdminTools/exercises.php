<h1>All Current Exercises</h1>

<table border=1 Style="border:thin">
<tr>
	<td>Exercise ID</td>
    <td>Exercise Name</td>
    <td>Muscle Group</td>
    <td>Difficulty Level</td>
</tr>
<?

	for($i=0; $i < count($Name); $i++)
	{
		echo "<tr>";
		echo "<td>".$ExerciseID[$i]."</td>";
		echo "<td>".$Name[$i]."</td>";
		echo "<td>".$MuscleGroup[$i]."</td>";
		echo "<td>".$Level[$i]."</td>";
		echo "</tr>";
	}

?>
</table>
