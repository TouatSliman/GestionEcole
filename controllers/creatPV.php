<h1>PV Global</h1>
<?php

if (isset($_GET["field"])) {
    $field_id = $_GET["field"];
} else {
    $field_id = 1;
}

require_once "db/conn.php";
$res0 = $conn->query("SELECT * FROM field");
echo "<div class='field'> <select>";
while ($row0 = $res0->fetch_assoc()) {
    echo "<option";
    if ($row0["id"] == $field_id) {
        echo " selected";
    }
    echo " value='" . $row0["id"] . "' >" . $row0["name"] . "</option>";
}
echo "</select></div>";


$res1 = $conn->query("SELECT * FROM students WHERE field_id = '" . $field_id . "'");
if ($res1->num_rows > 0) {
    $row1 = $res1->fetch_assoc();
}

echo "<table style='width: 100%; margin-top: 20px' border='1' ><tr><th>N° Etudiant</th><th>Nom Etudiant</th><th>Moyenne Global</th></tr>";

while ($row1) {
    $res3 = $conn->query("SELECT AVG(note) as moy FROM note WHERE id_etud = '" . $row1["ID"] . "'");
    if ($res3->num_rows > 0) {
        $row3 = $res3->fetch_assoc();
    }
    echo "<tr style='text-align: center'>";
    echo "<td>" . $row1["ID"] . "</td>";
    echo "<td>" . $row1["fName"] . " " . $row1["lName"] . "</td>";
    echo "<td class='moy'>" . $row3["moy"] . "</td>";
    echo "</tr>";
    $row1 = $res1->fetch_assoc();
}
echo "</table>";
echo "<p>Minimum : <span id='min'></span></p>";
echo "<p>Moyenne : <span id='moyenne'></span></p>";
echo "<p>Maximum : <span id='max'></span></p>";
?>
<div class="buttons">
    <input type="button" value="Imprimer" onclick="window.print()">
</div>
<script>
    let option = document.querySelector("select");
    option.addEventListener("change", function() {
        window.location.href = "./pv?field=" + option.value;
    });

    // -------------------------

    let min = document.getElementById("min");
    let moyenne = document.getElementById("moyenne");
    let max = document.getElementById("max");
    let tab = document.getElementsByClassName("moy");
    let res = 0;
    let minimum = parseFloat(tab[0].innerHTML);
    let maximum = 0;
    for (let i = 0; i < tab.length; i++) {
        res += parseFloat(tab[i].innerHTML);
        tab[i].innerHTML = parseFloat(tab[i].innerHTML).toFixed(2);
        if (parseFloat(tab[i].innerHTML) < minimum) {
            minimum = parseFloat(tab[i].innerHTML);
        }
        if (parseFloat(tab[i].innerHTML) > maximum) {
            maximum = parseFloat(tab[i].innerHTML);
        }
    }
    min.innerHTML = minimum;
    max.innerHTML = maximum;
    moyenne.innerHTML = res / tab.length;

    // ------------------------
    function printWindow() {
        window.print();
    }
</script>