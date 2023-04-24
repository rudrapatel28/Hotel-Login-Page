<!DOCTYPE html>
<html>
<head>
    <title>Pet Owner Reservation/Stay Form</title>
        <link rel="stylesheet" href="style.css">
<script>
        function submitForm() {
     
           alert('Reservation Is Booked!');
        }
    </script>
    </head>
<body>
        <div class="container">

    <h1>Pet Owner Reservation/Stay Form</h1>
    <form action="/reserve" method="post" onsubmit="submitForm(); return false;">
        <label for="checkIn">Pet's CheckIn Date:</label>
        <input type="date" id="checkIn" name="checkIn" required>
        <br>
        <label for="checkOut">Pet's CheckOut Date</label>
        <input type="date" id="checkOut" name="checkOut" required>
        <br>
        <label for="contactDetails">Pet Owner's Address and Phone Number</label>
        <input type="text" id="contactDetails" name="contactDetails" required>
        <br>
	   <br>
        <label for="petName"> Pet's Name / Type:</label>
        <input type="text" id="petName" name="petName" required>
        <br>
        <input type="submit" value="Submit Reservation/Stay" >
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
