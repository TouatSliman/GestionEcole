<?php
echo "<h1 class='printer' style='text-align: center; margin-top: 20px'>Bulletin des note</h1>";
require_once "db/conn.php";
$id = $_GET["etud"];
$result0 = $conn->query("SELECT * FROM students WHERE ID = " . $id);
if ($result0->num_rows > 0) {
    $row0 = $result0->fetch_assoc();
}
$bodyMail = "";
?>
<form action="./creatBulletin" method="post">
    <div class="">
        <div style="display: flex; justify-content: space-between ;">
            <div style="width: 70%;">
                <input type="hidden" name="etud" value="<?= $row0["ID"] ?>">
                <label class="printer" for="">Civilite :</label>
                <label class="printer">
                    <label class="radioName">
                        <i>monsieur</i>
                        <input type="radio" name="civilite" class="gender" value="monsieur" readonly <?php if ($row0["gender"] == "male") echo "checked" ?>>
                    </label>
                    <label class="radioName">
                        <i>madame</i>
                        <input type="radio" name="civilite" class="gender" value="madame" readonly <?php if ($row0["gender"] == "female") echo "checked" ?>>
                    </label>
                </label>
                <label for="">Nom/prenom
                    <input type="text" name="nom" id="nom" value="<?= $row0["fName"] ?> <?= $row0["lName"] ?>" readonly>
                </label>

                <label for="">filiere
                    <select name="field" id="filiere" class="printer" readonly>
                        <?php
                        require_once "db/conn.php";
                        $filieres = $conn->query("SELECT * FROM field");
                        foreach ($filieres as $f) {
                            if ($f['id'] == $row0['field_id']) {
                                $selected = "selected";
                            } else {
                                $selected = "";
                            }
                            echo "<option value='" . $f['id'] . "' $selected >" . $f['name'] . "</option>";
                        }
                        ?>
                    </select>
                </label>
            </div>
            <img src="db/img/<?= $row0["profile"]  ?> " class="printer" style="width: 100px; height: 100px ; border-radius: 50%; margin: auto; margin-bottom: 10px " alt="profile">
        </div>

        <?php
        echo "<table style='width: 100%; margin-top: 20px' border='1' ><tr><th>Code module</th><th>Nom module</th><th>Coefficient</th><th>Note</th></tr>";
        require_once "db/conn.php";
        $sql = "SELECT * FROM note WHERE id_etud = '" . $id . "'";
        $result = $conn->query($sql);


        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $res = $conn->query("SELECT * FROM module WHERE id = '" . $row['id_module'] . "'");
                if ($res->num_rows > 0) {
                    $row2 = $res->fetch_assoc();
                }

                $res2 = $conn->query("SELECT * FROM field WHERE id = '" . $row0['field_id'] . "'");
                if ($res2->num_rows > 0) {
                    $row3 = $res2->fetch_assoc();
                }

                echo "<tr style='text-align: center'>";

                echo "<td name = 'codeModule'>" . $row2["codeModule"] . "</td>";

                echo "<td name = 'designation'>" . $row2["designation"] . "</td>";
                $bodyMail .= "<p><p>" . $row2["codeModule"] . "</p><p>" . $row2["designation"] . "</p><p>" . $row["note"] . "</p></p>";
                echo "<td class='coff' name = 'coff'>" . $row2["coff"] . "</td>";
                echo "<td class='note' name = 'note'>" . $row["note"] . "</td>";
                echo "</tr>";
            }
        }
        echo "</table> <br>";


        /*
        $sommeCoeff = $conn->query("SELECT SUM(coff) FROM note WHERE id_etud = '" . $id . "'");
        $sommeCoeff = $sommeCoeff->fetch_assoc();
        echo "la somme des coefficient est : " . $sommeCoeff["SUM(coff)"] . "<br>";

        $somme = $conn->query("SELECT SUM(note*coff) FROM note WHERE id_etud = '" . $id . "'");
        $somme = $somme->fetch_assoc();
        echo "la somme des notes est : " . $somme["SUM(note*coff)"] . "<br>";

        $moyenne = $somme["SUM(note*coff)"] / $sommeCoeff["SUM(coff)"];
        echo "la moyenne est : " . $moyenne . "<br>";
        */



        ?>
        <p>la somme des coefficient est : <span name="sommeCoeff" id="sommeCoeff"></span> </p>
        <p>la somme des notes est : <span name="somme" id="somme"></span></p>
        <p>la moyenne est : <span name="moyenne" id="moyenne"></span> </p>

        <?php
        
        echo "<input type='hidden' name='bodyMail' value='" . $bodyMail . "'>";
        ?>
        <div class="buttons printerre">
            <input type="hidden" name="etud" value="<?= $row["ID"] ?>">
            <input type="submit" value="update" class="buttonOrange" formmethod="get" formaction="./updateBulletin">
            <input type="button" value="print" onclick="printWindow()">
            <input type="submit" value="envoyer bulletin" name="bulletin" class="buttonOrange" formmethod="GET" formaction="./sendBulletin">
            <input type="submit" value="envoyer par mailer" name="mailer" class="buttonOrange" formmethod="GET" formaction="./sendBulletin">
        </div>


        <script>
            var sommeCoeff = 0;
            var somme = 0;
            var moyenne = 0;
            //turn note into number
            var note = document.getElementsByClassName("note");
            var coff = document.getElementsByClassName("coff");
            for (var i = 0; i < note.length; i++) {
                somme += Number(note[i].innerHTML) * Number(coff[i].innerHTML);
                sommeCoeff += Number(coff[i].innerHTML);
            }
            moyenne = somme / sommeCoeff;
            document.getElementById("moyenne").innerHTML = moyenne.toFixed(2);
            document.getElementById("somme").innerHTML = somme;
            document.getElementById("sommeCoeff").innerHTML = sommeCoeff;

            function printWindow() {
                //hide the class of printer
                var divs = document.getElementsByClassName("printer");
                for (var i = 0; i < divs.length; i++) {
                    divs[i].style.display = "none";
                }

                window.print();
            }
        </script>