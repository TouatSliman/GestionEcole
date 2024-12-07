<?php
include_once "./db/conn.php";
$result = $conn->query("SELECT * FROM univercity");
echo "<div class='container'>";
echo "<table style='text-align: center'><tr><th>id</th><th>name</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td></tr>";
}
echo "</table> </div>";
