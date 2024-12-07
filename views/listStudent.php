<?php
require_once "db/conn.php";

$result = $conn->query("SELECT * FROM students");

if ($result->num_rows > 0) {
    echo "<style>table {font-family: arial, sans-serif; font-size: 13px; border-collapse: collapse; width: 100%;}td, th {border: 1px solid #dddddd; text-align: left; padding: 8px;}tr:nth-child(even) {background-color: #dddddd;}</style>";
    echo "<table><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Date Of Birth</th><th>Gender</th><th>Address</th><th>City</th><th>Postal Code</th><th>Country</th><th>Platform</th><th>Applications</th><th>Nationality</th><th>Sports</th><th>Field</th><th>Profile</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["ID"] . "</td>";
        echo "<td>" . $row["fName"] . "</td>";
        echo "<td>" . $row["lName"] . "</td>";
        echo "<td>" . $row["dateOfBirth"] . "</td>";
        echo  "<td>" . $row["gender"] . "</td>";
        echo  "<td>" . $row["address"] . "</td>";
        echo  "<td>" . $row["city"] . "</td>";
        echo  "<td>" . $row["postalCode"] . "</td>";
        echo  "<td>" . $row["country"] . "</td>";
        echo  "<td>" . $row["platform"] . "</td>";
        echo  "<td>" . $row["applications"] . "</td>";
        require_once "db/conn.php";
        $sql2 = "SELECT nationalities.name, nationalities.code FROM nationalities, students WHERE nationalities.id = " . $row["nat_id"];
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) {
            $row2 = $result2->fetch_assoc();
            echo  "<td>" . $row2["name"] . " - " . $row2["code"] . "</td>";
        }
        $sprs = explode(",", $row["spr_id"]);
        echo  "<td>";
        foreach ($sprs as $spr) {
            $sql3 = "SELECT sports.name FROM nationalities, sports WHERE sports.id = " . $spr;
            $result3 = $conn->query($sql3);
            if ($result3->num_rows > 0) {
                $row3 = $result3->fetch_assoc();
                echo $row3["name"] . ", ";
            }
        }
        echo "</td>";

        require_once "db/conn.php";
        $sql2 = "SELECT field.name FROM field, students WHERE field.id = " . $row["field_id"];
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) {
            $row2 = $result2->fetch_assoc();
            echo  "<td>" . $row2["name"] . "</td>";
        }

        echo "<td>" . "<img width='100px' src='./db/img/" . $row["profile"] . "'>" . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
