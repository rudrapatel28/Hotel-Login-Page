<!DOCTYPE html>
<html>
<head>
	<title>Receptionist Database</title>
	<link rel="stylesheet" href="style.css">

</head>
<body>
	        <div class="container">
	<h1>Receptionist Database</h1>

	<?php
	// Connect to MySQL database
	$servername = "sql1.njit.edu";
	$username = "rmp32";
	$password = "Mayurbhai1!";
	$dbname = "rmp32";

	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT * FROM `ReceptionistData` WHERE 1";
	$result = $conn->query($sql);

	if (!$result) {
	    die("SQL query failed: " . $conn->error);
	}


	if ($result->num_rows > 0) {
	    echo "<table><tr><th>Receptionist First Name</th><th>Receptionist Last Name</th><th>Receptionist Password</th><th>Receptionist ID Number</th><th>Receptionist Phone</th><th>Receptionist Email</th></tr>";
	    while($row = $result->fetch_assoc()) {
	        echo "<tr><td>" . $row["Receptionist First Name"] . "</td><td>" . $row["Receptionist Last Name"] . "</td><td>" . $row["Receptionist Password"] . "</td><td>" . $row["Receptionist ID Number"] . "</td><td>" . $row["Receptionist Phone"] . "</td><td>" . $row["Receptionist Email"] . "</td></tr>";
	    }
	    echo "</table>";
	} else {
	    echo "0 results";
	}

	$conn->close();
	?>
</div>
</form>
<ul>
      <li><a href="https://web.njit.edu/~rmp32/receptionistdb.php">Receptionist Data</a></li>
      <li><a href="https://web.njit.edu/~rmp32/firstOption.php">Book A Reservation</a></li>
      <li><a href="https://web.njit.edu/~rmp32/secondOption.php">Request Perks</a></li>
      <li><a href="https://web.njit.edu/~rmp32/thirdOption.php">Update Perks</a></li>
      <li><a href="https://web.njit.edu/~rmp32/fourthOption.php">Cancel Pet Reservation</a></li>
      <li><a href="https://web.njit.edu/~rmp32/fifthOption.php">Cancel Pet Perks</a></li>
      <li><a href="https://web.njit.edu/~rmp32/sixthOption.php">Create Owner Account</a></li>
    </ul>
</body>
</html>
