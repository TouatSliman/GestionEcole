<?php
require_once "db/conn.php";

$result = $conn->query("SELECT * FROM teacher");

if ($result->num_rows > 0) {
    echo "<style>table {font-family: arial, sans-serif; font-size: 13px; border-collapse: collapse; width: 100%;}td, th {border: 1px solid #dddddd; text-align: left; padding: 8px;}tr:nth-child(even) {background-color: #dddddd;}</style>";
    echo "<table><tr><th>ID</th><th>Name</th><th>Number</th><th>Date Of Birth</th><th>Place Of Birth</th><th>Civilite</th><th>Address</th><th>Paye</th><th>Grade</th><th>Speciality</th><th>University</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["number"] . "</td>";
        echo "<td>" . $row["dateOfBirth"] . "</td>";
        echo "<td>" . $row["placeOfBirth"] . "</td>";
        echo "<td>" . $row["civilite"] . "</td>";
        echo "<td>" . $row["address"] . "</td>";
        echo "<td>" . $row["paye"] . "</td>";
        echo "<td>" . $row["grade"] . "</td>";
        echo "<td>" . $row["spicialite"] . "</td>";
        require_once "db/conn.php";
        $sql2 = "SELECT univercity.name FROM univercity, students WHERE univercity.id = " . $row["id_univer"];
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
