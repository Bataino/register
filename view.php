<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "demo";

$conn = new mysqli($servername, $username, $password, $dbname);
?>
<script>
    var person = prompt("Please enter The secret Key");
    while(person != "password"||person == null) {
    var person = prompt("Please enter the secret Key");
    } 
</script>
<?php
$sql = "SELECT * FROM demo";
$result = $conn->query($sql);
?>

<table style="padding: 3px;">	
	<tr>
		<th>
			id
		</th>
		<th>
			Username
		</th>
		<th>
			password
		</th>
	</tr>
<?php
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>

	<tr style="border: 2px solid lightgrey;padding: 5px;">
<?php
    echo "<td>" . $row["id"]. "</td><td>" . $row["username"]. "</td><td> " . $row["password"]. "</td></tr>";
  }
} 
else {
  echo "0 results";
}
?>
</table>

<?php
$conn->close();