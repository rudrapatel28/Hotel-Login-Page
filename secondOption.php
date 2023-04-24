<?php
    $servername = "sql1.njit.edu";
    $username = "rmp32";
    $password = "Mayurbhai1!";
    $dbname = "rmp32";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $perks = $_POST['perksNeeded'];
        $iD = $_POST['reservationID'];
            if($mysqli->connect_error) {
                die("Connection failed: " . $mysqli->connect_error);

            $query = "SELECT * FROM AdditionalPerks WHERE `PerksRequested` = '$perks' AND `PerksID` = '$iD'";

            $result = $mysqli->query($query);

            if($result->num_rows > 0) {
                exit;
            } else {
                echo "<script> alert('RESERVATION CANNOT BE FOUND. RECHECK DATA ENTERED OTHERWISE YOU NEED TO MAKE SURE A RESERVATION WAS MADE AND THAT THE OWNER HAS AN ACCOUNT.'); </script>";
            }

            $mysqli->close();
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Request Perks</title>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript">
        function confirmPerksRequest() {
            var perksNeeded = document.getElementById('perksNeeded').value;
            var reservationID = document.getElementById('reservationID').value;
            if (perksNeeded === '' || reservationID === '') {
                alert("All fields are required. Please fill in all the fields.");
                return false;
            } else{
                var firstConfirmation = confirm("Before you add perks to a reservation are you sure reservation was made? if not please make a reservation");
                var secondConfirmation = confirm("You are about to REQUEST Perks for your pet. Are you sure you want to do so?");
                var randomNumber = Math.floor(Math.random() * 1000) + 1;
                alert('Perks Added. Your Perk ID is:' + randomNumber);
                document.getElementById("perksForm").submit();
            }
        }
    </script>
</head>
<body>
<div class="container">
    <h1>Request Perks</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="perksForm">
        <label for="perksNeeded">Perks Needed:</label>
        <input type="text" id="perksNeeded" name="perksNeeded" required>
        <br>
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

      <li
</body>
</html>
