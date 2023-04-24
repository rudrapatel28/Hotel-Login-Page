<?php
    $servername = "sql1.njit.edu";
    $username = "rmp32";
    $password = "Mayurbhai1!";
    $dbname = "rmp32";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $iD = $_POST['perksID'];
        $ownerID = $_POST['reservationID'];

        $mysqli = new mysqli($servername,$username,$password,$dbname);

        if($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        $query = "SELECT * FROM AdditionalPerks WHERE `PerksID` = '$iD' AND `Pet Owner ID` = '$ownerID' ";

        $result = $mysqli->query($query);

        if($result->num_rows > 0) {
            exit;
        } else {
            echo "<script> alert('You Have Either Entered A Wrong Reservation ID OR Perks ID, Please fix the error and try again!'); </script>";
        }

        $mysqli->close();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Request Perks</title>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript">
        function confirmPerksRequest() {
            var perksUpdated = document.getElementById("perksUpdated").value;
            var reservationID = document.getElementById("reservationID").value;
            var perksID = document.getElementById("perksID").value;

            if (perksUpdated === '' || reservationID === '' || perksID === '') {
                alert("All fields are required. Please fill in all the fields.");
                return false;
            } else {
                var confirmation = confirm("You are about to UPDATE Perks for your pet. Are you sure you want to do so?");
                if (confirmation) {
                    alert('Perks Updated!');
			 document.getElementById("perksForm").submit();
                }
            }
        }
    </script>
</head>
<body>
<div class="container">
    <h1>Update Perks Form</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="perksForm">
        <label for="perksUpdated">Updated Perks:</label>
        <input type="text" id="perksUpdated" name="perksUpdated" required>
        <br>
        <label for="reservationID">Reservation ID:</label>
        <input type="text" id="reservationID" name="reservationID" required>
        <br>
        <br>
        <label for="perksID">Pet's Perks ID:</label>
        <input type="text" id="perksID" name="perksID" required>
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
      <li><a href="https://web.njit.edu/~rmp32/sixthOption.php">Create Owner Acc</a></li>

    </ul>
</body>
</html>
