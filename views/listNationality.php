<?php
include_once "./db/conn.php";
$result = $conn->query("SELECT * FROM nationalities");
echo "<div class='container'>";
echo "<table style='text-align: center'><tr><th>id</th><th>name</th><th>code</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["code"] . "</td></tr>";
}
echo "</table> </div>";
