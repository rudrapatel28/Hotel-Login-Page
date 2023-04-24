<?php
    $servername = "sql1.njit.edu";
$username = "rmp32";
$password = "Mayurbhai1!";
$dbname = "rmp32";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $receptionistFirstName = $_POST['receptionistFirstName'];
        $receptionistLastName = $_POST['receptionistLastName'];
        $receptionistPassword = $_POST['receptionistPassword'];
        $receptionistID = $_POST['receptionistID'];
        $receptionistEmail = $_POST['receptionistEmail'];
        $receptionistPhoneNumber = $_POST['receptionistPhoneNumber'];

        // Connect to the MySQLi database
        $mysqli = new mysqli($servername,$username,$password,$dbname);

        // Check connection
        if($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        // Query to check if data exists in the database
        $query = "SELECT * FROM ReceptionistData WHERE `Receptionist First Name` = '$receptionistFirstName' AND `Receptionist Last Name` = '$receptionistLastName' AND `Receptionist Password` = '$receptionistPassword' AND `Receptionist ID Number` = '$receptionistID' AND `Receptionist Email` = '$receptionistEmail' AND `Receptionist Phone` = '$receptionistPhoneNumber'";

        $result = $mysqli->query($query);

        // Check if query was successful
        if($result->num_rows > 0) {
            // Data exists
		$selectedOption = $_POST['transaction'];
	// Perform the redirect based on the selected option
	if ($selectedOption == 'search') {
  	header('Location: receptionistdb.php');
	} elseif ($selectedOption == 'book') {
  	header('Location: firstOption.php');
	} elseif ($selectedOption == 'request') {
  	header('Location: secondOption.php');
	} elseif ($selectedOption == 'cancelOne') {
  	header('Location: fourthOption.php');
     }elseif ($selectedOption == 'cancelTwo') {
  	header('Location: fifthOption.php');
     }elseif ($selectedOption == 'create') {
  	header('Location: sixthOption.php');
     }elseif ($selectedOption == 'update') {
  	header('Location: thirdOption.php');
     }else {
  	// Handle invalid option
  	echo 'Invalid option selected';
  	exit;
	}		
        } else {
            // Data does not exist
            echo "failure";
        }

        // Close database connection
        $mysqli->close();
    }

    ?>

<!DOCTYPE html>
<html>
<head>
	<title>Happy Tails Hotel Receptionist Login</title>
	  <link rel="stylesheet" href="style.css">
</head>
<body>
		<div class="container">
		<h2>Happy Tails Hotel Receptionist Login</h2>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="receptionistFirstName">First Name:</label>
        <input type="text" id="receptionistFirstName" name="receptionistFirstName" required><br>
        <label for="receptionistLastName">Last Name:</label>
        <input type="text" id="receptionistLastName" name="receptionistLastName" required><br>
        <label for="receptionistPassword">Password:</label>
        <input type="password" id="receptionistPassword" name="receptionistPassword" required><br>
        <label for="receptionistID">ID:</label>
        <input type="text" id="receptionistID" name="receptionistID" required><br>
        <label for="receptionistEmail">Email:</label>
        <input type="email" id="receptionistEmail" name="receptionistEmail" required><br>
        <label for="receptionistPhoneNumber">Phone Number:</label>
        <input type="text" id="receptionistPhoneNumber" name="receptionistPhoneNumber" required><br>
			<label for="transaction"> What Do You Want To Do?</label>
			<select id="transaction" name="transaction">
				<option value="search">Search A Receptionist’s Account</option>
				<option value="book">Book a Reservation</option>
				<option value="request">Request Perks</option>
			     <option value="update">Update Perks</option>
				<option value="cancelOne">Cancel a Reservation</option>
				<option value="cancelTwo">Cancel Perks</option>
				<option value="create">Create A New Customer Account</option>
			</select>						
        		<input type="submit" value="Login">
		</form>
		</div>
</body>
</html>
