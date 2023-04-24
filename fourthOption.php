<?php
    $servername = "sql1.njit.edu";
    $username = "rmp32";
    $password = "Mayurbhai1!";
    $dbname = "rmp32";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $iD = $_POST['reservationID'];
            $mysqli = new mysqli($servername, $username, $password, $dbname);

            if($mysqli->connect_error) {
                die("Connection failed: " . $mysqli->connect_error);

            $query = "SELECT * FROM OwnersReservations WHERE `StayID` = $iD";

            $result = $mysqli->query($query);

            if($result->num_rows > 0) {
                exit;
            } else {
                echo "<script> alert('Reservation ID Does Not Exist, Recheck the data entered and try again!'); </script>";
            }

            $mysqli->close();
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cancel Pet's Reservation</title>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript">
        function confirmPerksRequest() {
            var reservationID = document.getElementById('reservationID').value;
            if (reservationID === '') {
                alert("All fields are required. Please fill in all the fields.");
                return false;
            } else{
                var secondConfirmation = confirm("You are about to CANCEL this Reservation for your pet. Are you sure you want to do so?");
                alert('Reservation And its Perks Deleted');
                document.getElementById("perksForm").submit();
            }
        }
    </script>
</head>
<body>
	        <div class="container">
    <h1>Cancel Pet's Reservation</h1>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <label for="reservationID">Reservation ID:</label>
        <input type="text" id="reservationID" name="reservationID" required>
        <br>
        <input type="submit" value="Submit" onclick="confirmPerksRequest()">
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
