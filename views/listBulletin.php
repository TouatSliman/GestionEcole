<?php

require_once "db/conn.php";

$result = $conn->query("SELECT * FROM note");

if ($result->num_rows > 0) {
    echo "<style>table {font-family: arial, sans-serif; font-size: 13px; border-collapse: collapse; width: 100%;}td, th {border: 1px solid #dddddd; text-align: left; padding: 8px;}tr:nth-child(even) {background-color: #dddddd;}</style>";
    echo "<table><tr><th>ID</th><th>Civilite</th><th>Nom</th><th>Field</th><th>Module</th><th>Code</th><th>Coff</th><th>Note</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["civilite"] . "</td>";
        echo "<td>" . $row["nom"] . "</td>";
        require_once "db/conn.php";
        $sql2 = "SELECT field.name FROM field, students WHERE field.id = " . $row["field"];
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) {
            $row2 = $result2->fetch_assoc();
            echo  "<td>" . $row2["name"] . "</td>";
        }
        $sql3 = "SELECT module.codeModule FROM module,students WHERE module.id = " . $row["module"];
        $result3 = $conn->query($sql3);
        if ($result3->num_rows > 0) {
            $row3 = $result3->fetch_assoc();
            echo  "<td>" . $row3["codeModule"] . "</td>";
        }
        echo "<td>" . $row["code"] . "</td>";
        echo "<td>" . $row["coff"] . "</td>";
        echo "<td>" . $row["note"] . "</td>";

        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
