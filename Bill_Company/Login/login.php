<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "bill_format";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM bill_data";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       // echo "id: " . $row["id"]. " -  	po: " . $row["po"]. " " . $row["process"]. "<br>";
       echo "Data member : ";
       echo "id: ".$row["id"]." " . $row["po"]. " Username :". $row["username"]." " . $row["password"]." ". $row["permis"]." ". $row["process"]. " " .$row["price"]. " created: " .$row["created_at"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login</title>
</head>
<body>

<form name="frmlogin" method="post" action="check_login.php">
  <fieldset>
    <legend>Personal informationlegend:</legend>
   	Username:<br>
    <input type="text" name="txtusername" id="txtusername" placeholder="Username"><br>
    Password:<br>
    <input type="text" name="txtpassword" id="txtpassword" placeholder="Password"><br><br>
    <button type="submit">Submit</button>
  </fieldset>
</form> 


</body>
</html>
