<?php
echo "<html><body>";
$connection = new mysqli("mysql.eecs.ku.edu", "kgriffith", 'P@$$word.123', "kgriffith"); // Establish connection
if($connection->connect_errno) {
printf("Something went wrong: %s", $connection->connect_error);
echo "<br><a style='text-decoration:none;color:#333;' href='../adminHome.html'>Back</a>";
echo "</body></html>";
exit();
}
$result = $connection->query("SELECT * FROM Users");
if($result->num_rows == 0) {
echo "<h5>There are no users...</h5>";
}else {
echo "<h3>Current Users:</h3>";
while($row = mysqli_fetch_array($result)) {
echo "<br>" . $row['username'];
}
}
$connection->close();
echo "<br><a style='text-decoration:none;color:#333;' href='../adminHome.html'>Back</a>";
echo "</body></html>";
?>
