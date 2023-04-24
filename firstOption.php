<?php
    $servername = "sql1.njit.edu";
    $username = "rmp32";
    $password = "Mayurbhai1!";
    $dbname = "rmp32";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $iD = $_POST['id'];

        $mysqli = new mysqli($servername,$username,$password,$dbname);

        if($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        $query = "SELECT * FROM PetOwnersData WHERE `Pet Owner First Name` = '$firstName' AND `Pet Owner Last Name` = '$lastName' AND `Pet Owners ID` = '$iD'";

        $result = $mysqli->query($query);

        if($result->num_rows > 0) {
            header('Location: furtherBooking.php');
            exit;
        } else {
            echo "<script> alert('PET OWNER CANNOT BE FOUND. RECHECK DATA ENTERED OTHERWISE YOU NEED TO CREATE AN ACCOUNT FOR PET OWNER'); </script>";
        }

        $mysqli->close();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pet Owner Reservation/Stay Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Pet Owner Reservation/Stay Form</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="firstName">Pet Owner's First Name:</label>
            <input type="text" id="firstName" name="firstName" required><br><br>
            <label for="lastName">Pet Owner's Last Name:</label>
            <input type="text" id="lastName" name="lastName" required><br><br>
            <label for="id">Pet Owner's ID:</label>
            <input type="text" id="id" name="id" required><br><br>
        		<input type="submit" value="Submit">
        </form>
    </div>
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
