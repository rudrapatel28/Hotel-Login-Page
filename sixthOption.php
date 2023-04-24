<?php
    $servername = "sql1.njit.edu";
    $username = "rmp32";
    $password = "Mayurbhai1!";
    $dbname = "rmp32";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $firstname = $_POST['firstName'];
        $lastname = $_POST['lastName'];
        $ownerID = $_POST['ownerID'];

        $mysqli = new mysqli($servername,$username,$password,$dbname);

        if($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        $query = "SELECT * FROM PetOwnersData WHERE `Pet Owner First Name` = '$firstname' AND `Pet Owner Last Name` = '$lastname' AND `Pet Owners ID` = '$ownerID'";

        $result = $mysqli->query($query);

        if($result->num_rows > 0) {
            echo "<script> alert('The Owner Already Has An Account!'); </script>";
        }
        $mysqli->close();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Account</title>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript">
    function confirmPerksRequest() {
        var firstName = document.getElementById("firstName").value.trim();
        var lastName = document.getElementById("lastName").value.trim();
        var ownerID = document.getElementById("ownerID").value.trim();

        if (firstName === '' || lastName === '' || ownerID === '') {
            alert("All fields are required. Please fill in all the fields.");
            return false;
        } else {
            alert('Pet Owner Account Created!');
            document.getElementById("perksForm").submit();
            return true;
        }
    }
</script>

</head>
<body>
<div class="container">
    <h1>Create Account</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="perksForm">
        <label for="firstName">Pet Owner's First Name</label>
        <input type="text" id="firstName" name="firstName" required>
        <br>
        <label for="lastName">Owner's Last Name</label>
        <input type="text" id="lastName" name="lastName" required>
        <br>
        <br>
        <label for="ownerID">Owner's ID Number</label>
        <input type="text" id="ownerID" name="ownerID" required>
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
