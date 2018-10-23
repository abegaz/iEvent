<h1 style="margin-top:0px; margin-bottom:10px;"><?php echo $FirstName ?>'s Profile</h1>
<p>
This will be the future home of your profile. <br />
Currently, you can create exercises and foods (named whatever you like) and associate yourself with ones that have matching names. <br />
When you create one, it will be associated to you profile and display all of the ones that you have created under the form. <br />
If you enter one that has been created 
</p>

<table>
<tr>

	<td>
		<?
			echo "<h3>Please create a few exercises.</h3>";
		?>
	</td>
    <td>
    	<?
			echo "<h3>Please create a few foods.</h3>";
			echo "<p>
			
			Feel free to make up the macronutrients or leave them blank.
			
			</p>";
		?>
    </td>

</tr>

<tr>

	<td>
		<? 
			echo validation_errors("<div class='errors'>", "</div>");

			echo form_open();//produces <form>
			echo "<table class='form'>";
			
			$options = array(
				'Arms' => 'Arms',
				'Back' => 'Back',
				'Chest' => 'Chest',
				'Core' => 'Core',
				'Legs' => 'Legs',
				'Shoulder' => 'Shoulders',
				'Cardio' => 'Cardio',
			);
			echo "<tr class='".((strlen(form_error('muscleGroup'))>0)?"fieldError":"")."'>";
				echo "<td>";
					echo form_label("Muscle Group", "muscleGroup");
				echo "</td>";
				echo "<td>";
					echo form_dropdown("muscleGroup", $options, set_value('muscleGroup'), array('id'=>'muscleGroup'));
				echo "</td>";
			echo "</tr>";
			/***************************************************************************/
			$options['name'] = 'exerciseName';
			$options['id'] = 'exerciseName';
			$options['value'] = set_value('exerciseName');
			
			echo "<tr class='".((strlen(form_error('exerciseName'))>0)?"fieldError":"")."'>";
				echo "<td>";
					echo form_label("Exercise Name", "exerciseName");
				echo "</td>";
				echo "<td>";
					echo form_input($options);
				echo "</td>";
			echo "</tr>";
			/***************************************************************************/
			$options = array(
				'1' => '1',
				'2' => '2',
				'3' => '3',
				'4' => '4',
				'5' => '5'
			);
			echo "<tr class='".((strlen(form_error('level'))>0)?"fieldError":"")."'>";
				echo "<td>";
					echo form_label("Difficulty Level", "dLevel");
				echo "</td>";
				echo "<td>";
					echo form_dropdown("level", $options, set_value('level'), array('id'=>'dLevel'));
				echo "</td>";
			echo "</tr>";
			/***************************************************************************/
			echo "</table>";
			echo "<table class=\"buttons\">";
			echo "<tr><td>";
				echo form_submit("SubmitExercise", "Submit");
			echo "</td></table>";
			echo form_close();//produces </form>
		?>
	</td>
    
    <td>
    	<? 
			echo validation_errors("<div class='errors'>", "</div>");

			echo form_open();//produces <form>
			echo "<table class='form'>";
			
			$options['name'] = 'foodName';
			$options['id'] = 'foodName';
			$options['value'] = set_value('foodName');
			
			echo "<tr class='".((strlen(form_error('foodName'))>0)?"fieldError":"")."'>";
				echo "<td>";
					echo form_label("Food Name", "foodName");
				echo "</td>";
				echo "<td>";
					echo form_input($options);
				echo "</td>";
			echo "</tr>";
			/***************************************************************************/
			$options['name'] = 'carbCount';
			$options['id'] = 'carbCount';
			$options['value'] = set_value('carbCount');
			
			echo "<tr class='".((strlen(form_error('carbCount'))>0)?"fieldError":"")."'>";
				echo "<td>";
					echo form_label("Carbohydrates", "carbCount");
				echo "</td>";
				echo "<td>";
					echo form_input($options);
				echo "</td>";
			echo "</tr>";
			/***************************************************************************/
			$options['name'] = 'proCount';
			$options['id'] = 'proCount';
			$options['value'] = set_value('proCount');
			
			echo "<tr class='".((strlen(form_error('proCount'))>0)?"fieldError":"")."'>";
				echo "<td>";
					echo form_label("Protien", "proCount");
				echo "</td>";
				echo "<td>";
					echo form_input($options);
				echo "</td>";
			echo "</tr>";
			/***************************************************************************/
			$options['name'] = 'fatCount';
			$options['id'] = 'fatCount';
			$options['value'] = set_value('fatCount');
			
			echo "<tr class='".((strlen(form_error('fatCount'))>0)?"fieldError":"")."'>";
				echo "<td>";
					echo form_label("Fats", "fatCount");
				echo "</td>";
				echo "<td>";
					echo form_input($options);
				echo "</td>";
			echo "</tr>";
			/***************************************************************************/
			$options['name'] = 'calCount';
			$options['id'] = 'calCount';
			$options['value'] = set_value('calCount');
			
			echo "<tr class='".((strlen(form_error('calCount'))>0)?"fieldError":"")."'>";
				echo "<td>";
					echo form_label("Calories", "calCount");
				echo "</td>";
				echo "<td>";
					echo form_input($options);
				echo "</td>";
			echo "</tr>";
			/***************************************************************************/
			echo "</table>";
			echo "<table class=\"buttons\">";
			echo "<tr><td>";
				echo form_submit("SubmitFood", "Submit");
			echo "</td></table>";
			echo form_close();//produces </form>
		?>
    </td>
</tr>

<tr>
	<td>
		<?
			echo "<h3>The exercises currently associated with ".$FirstName." are:</h3>";
		?>
	</td>
    <td>
		<?
			echo "<h3>The Foods currently associated with ".$FirstName." are:</h3>";
		?>
	</td>
</tr>

<tr>
	<td>
    		<?
				foreach ($AssociatedEx as $val)
				{
					echo $val."<br />";
				}
			?>
    </td>
    <td>
    	<?
				foreach ($AssociatedFood as $val)
				{
					echo $val."<br />";
				}
			?>
    </td>
</tr>
</table>