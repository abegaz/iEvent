<head>
<link rel="stylesheet" type="text/css" href="<?php echo site_url();?>/css/iEvent-events.css">
<head>
<div class="jumbotron jumbotron-fluid bg-gray text-green ">
  <div class="container">
    <h1 class="display-4">Upcoming Events!</h1>
    <p class="lead">Listed below are the events that you are currently planning to attend.</p>
	<div class="row">

		<div class="events-list">
			<div class="card2">
				<h2 id="events-list-head">Events List</h2>     
					<div class="list">
					<ul>
					<?php
					$conn = new mysqli("localhost","DBUserLemon","System","csci3300_ievent");
					if ($conn->connect_error) {
						die("Connection Failed: " . $conn->connect_error);
					}
					
					$result = mysqli_query($conn, "SELECT EventID, EventName FROM events WHERE Privacy = '0'");
	
					while($row = mysqli_fetch_array($result)){
						echo "<li><button  class=\"buttons\" name = \"button\" onclick=\"displayFunc(" . $row['EventID']. ")\">" . $row['EventName'] . "</button></li>";
					}
					?>					
					</ul>
				</div>
			</div>
		</div>
		<?php
		echo "hello world";
		function displayFunc($eventID){
			$conn = new mysqli("localhost","DBUserLemon","System","csci3300_ievent");
					if ($conn->connect_error) {
						die("Connection Failed: " . $conn->connect_error);
					}
					$id = $eventID;
					$result = mysqli_query($conn, "SELECT EventName,Owner,AttendeeCount,StartTime,EndTime,Summary FROM events WHERE EventID = $id");
					while($row = mysqli_fetch_array($result)){
					$eventName = $row['EventName'];
					$owner = $row['Owner'];
					$attend = $row['AttendeeCount'];
					$sTime = $row['StartTime'];
					$eTime = $row['EndTime'];
					$description = $row['Summary'];
					}
					echo"hello worlddd";
		
		echo "<div class=\"event-selected\">
				<div class=\"card\">
				<h2 id=\"event-name-head\">" . $eventName . "</h2>
					<table id=\"myTable\" style=\"width:50%\" align=\"center\">
						<tr id=\"topRow\">
							<th>Owner</th>
							<th>Attendence Count</th> 
							<th>Start Time</th>
							<th>End Time</th>
						</tr>
						<tr>
							<td id=\"id-name\">" . $owner . "</td>
							<td>" . $attend . "</td>
							<td>" . $sTime . "</td>
							<td>" . $eTime . "</td>
						</tr>
					</table>
					<br>
						<div class=\"description\">
						<br>
						<h3>Event Description:</h3>
						<p>" . $description . "</p>
						</div>			
					</div>
				</div>";
				echo"hello world";
		}
	?>
		
		
	</div>
 </div>
</div>

