<head>
<link rel="stylesheet" type="text/css" href="<?php echo site_url();?>/css/iEvent-profile.css">
</head>
<body>
<div class="row text-green">
  <div class="leftcolumn">
    <div class="card2 bg-gray">
      <h2>Your Public Events</h2>     
      <div><img class="cal-img" src="<?php echo site_url();?>/images/calender.jpg" alt="calender" style="height:400px;"></div>     
    </div>
	
    <div class="card2 bg-gray">
      <h2>Your Private Events</h2>     
      <div><img class="cal-img" src="<?php echo site_url();?>/images/calender.jpg" alt="calender" style="height:400px;"></div>
    </div>
  </div>
  
  <div class="rightcolumn bg-gray">
    <div class="card">
      <h2>Profile</h2>
      <div><img class="profile-img" src="<?php echo site_url();?>/images/profile-img.jpg" alt="profile-pic" width="100px" height="100px"></div>
      <?php
	  $conn = new mysqli("localhost","DBUserLemon","System","csci3300_ievent");
	if ($conn->connect_error) {
		die("Connection Failed: " . $conn->connect_error);
	}
	$id = $_SESSION['userID'];
	$result = mysqli_query($conn, "SELECT * FROM users WHERE UserID = '$id'");
	
	while($row = mysqli_fetch_array($result)){
		$username = $row['Username'];
		$email = $row['Email'];
		$fName = $row['FirstName'];
		$lName = $row['LastName'];
	}
	  ?>
	  <br>
	  <?php echo "<p>Username: " . $username . "</p>"?>
	  <?php echo "<p>Email: " . $email . "</p>"?>
	  <?php echo "<p>Name: " . $fName . " " . $lName . "</p>"?>
	  </div>
	
    <div class="card bg-gray">
      <h3>Events You May Know</h3>
	  <p>Event 1</p>
	  <p>Event 2</p>
	  <p>Event 3</p>
	  <p>Event 4</p>	  
    </div>
	
    <div class="card bg-gray">
      <h3>Contact</h3>
      <p>Email: Stuff</p>
    </div>
  </div>
</div>

<div class="footer bg-gray text-green">
  <h2>Stuff | Stuff | Stuff | Stuff</h2>
</div>

</body>
