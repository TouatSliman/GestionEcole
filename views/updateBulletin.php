<?php
require_once "db/conn.php";

if (isset($_GET["etud"])) {
    $id = $_GET["etud"];
    $result = $conn->query("SELECT * FROM note WHERE id_etud = '" . $id . "'");
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc();) {
            $res = $conn->query("SELECT * FROM module WHERE id = '" . $row['id_module'] . "'");
            if ($res->num_rows > 0) {
                $row2 = $res->fetch_assoc();
            }

            $res2 = $conn->query("SELECT * FROM field WHERE id = '" . $row0['field_id'] . "'");
            if ($res2->num_rows > 0) {
                $row3 = $res2->fetch_assoc();
            }

            echo "<label>N°etudient : <input type='number' name='id_etud' value='" . $row["id_etud"] . "' readonly></label><br>";
            echo "<input type='hidden' name='module' value='" . $row["id_module"] . "' ><br>";
            echo "<label>Filiere : " . $row3["name"] . "</label><br>";
            echo "<label>Code module : " . $row2["codeModule"] . "</label><br>";
            echo "<label>Designation module : " . $row2["designation"] . "</label><br>";
            echo "<label>Coefficient module : " . $row2["coff"] . "</label><br>";
            echo "<label>Note module : <input type='number' name='note' value='" . $row["note"] . "'>²</label><br>";
            
        }
    }
} else {
    $message = "ID not found";
    require_once "views/error.php";
    die();
}

?>