<?php
require_once "db/conn.php";

$result = $conn->query("SELECT * FROM module");

if ($result->num_rows > 0) {
    echo "<style>table {font-family: arial, sans-serif; font-size: 13px; border-collapse: collapse; width: 100%;}td, th {border: 1px solid #dddddd; text-align: left; padding: 8px;}tr:nth-child(even) {background-color: #dddddd;}</style>";
    echo "<table><tr><th>ID</th><th>Code Module</th><th>Designation</th><th>Coff</th><th>Hours</th><th>filiere</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["codeModule"] . "</td>";
        echo "<td>" . $row["designation"] . "</td>";
        echo "<td>" . $row["coff"] . "</td>";
        echo "<td>" . $row["vol"] . "h </td>";
        require_once "db/conn.php";
        $sql2 = "SELECT field.name FROM field, students WHERE field.id = " . $row["id_filiere"];
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) {
            $row2 = $result2->fetch_assoc();
            echo  "<td>" . $row2["name"] . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
