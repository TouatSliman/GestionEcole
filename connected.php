<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/add.css">
    <title>Paw</title>
</head>

<body>

    <?php
    session_start();
    $name = $_SESSION['name'];
    $username = $_SESSION['username'];

    require_once "db/conn.php";
    $result = $conn->query("SELECT * FROM students WHERE ID = " . $_GET["etudient"]);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
    $id = $row['ID'];

    ?>
    <form action="./connected" method="get">
        <div class="container">
            <label for="">etudient
                <input type="number" name="etudient" id="">
                <input type="submit" value="search" class="buttonGreen">
            </label>
        </div>
    </form>
    <form action="" method="">
        <div class="container">
            <input type="hidden" name="etud" value="<?= $row["ID"] ?>">

            <img src="db/img/<?= $row["profile"] ?>" style="width: 100px; height: 100px ; border-radius: 50%; margin: auto; margin-bottom: 10px " alt="profile">
            <!--
        <label for="">Civilite :</label>
        <label>
            <label class="radioName">
                <i>monsieur</i>
                <input type="radio" name="civilite" class="gender" value="monsieur" readonly <?php if ($row["gender"] == "male") echo "checked" ?>>
            </label>
            <label class="radioName">
                <i>madame</i>
                <input type="radio" name="civilite" class="gender" value="madame" readonly <?php if ($row["gender"] == "female") echo "checked" ?>>
            </label>
        </label>
        -->
            <label for="">Nom/prenom
                <input type="text" name="nom" id="nom" value="<?= $row["fName"] ?> <?= $row["lName"] ?>" readonly>
            </label>

            <label for="">filiere
                <select name="field" id="filiere" readonly>
                    <?php
                    require_once "db/conn.php";
                    $filieres = $conn->query("SELECT * FROM field");
                    foreach ($filieres as $f) {
                        if ($f['id'] == $row['field_id']) {
                            $selected = "selected";
                        } else {
                            $selected = "";
                        }
                        echo "<option value='" . $f['id'] . "' $selected >" . $f['name'] . "</option>";
                    }
                    ?>
                </select>
            </label>

            <?php
            /*require 'db/conn.php';
        $sql4 = "SELECT * FROM note WHERE id_etud = '" . $id . "'";
        $row4 = $conn->query($sql4);


        foreach ($row4 as $r4) {
            $res = $conn->query("SELECT module.designation FROM module WHERE id = '" . $r4['module'] . "'");
            if ($res->num_rows > 0) {
                $row5 = $res->fetch_assoc();
            }
            echo "<h3>" . $row5['designation'] . "</h3>";
            echo "<p>";
            echo "code :" . $r4['code'];
            echo "  coff :" . $r4['coff'];
            echo "  note :" . $r4['note'];
            echo "</p>";
        }*/

            echo "<label for='' style='margin-top:20px'>Module<select name='module' id='module' readonly>";
            require_once 'db/conn.php';
            $module = $conn->query('SELECT * FROM module');
            echo "<option value=''>select</option>";
            foreach ($module as $m) {
                $note = $conn->query('SELECT * FROM note WHERE id_module = ' . $m['id'] . ' AND id_etud = ' . $id);
                if ($note->num_rows > 0) {
                    $n = $note->fetch_assoc();
                    echo "<option value=" . $m['id'] . ' data-code="' . $m['codeModule'] . '" data-coff="' . $m['coff'] . '" data-note="' . $n['note'] . '">' . $m['designation'] . '</option>';
                } else {
                    echo "<option value=" . $m['id'] . ' data-code="' . $m['codeModule'] . '" data-coff="' . $m['coff'] . '">' . $m['designation'] . '</option>';
                }
            }
            echo "</select></label>";
            /*foreach ($module as $m) {
            echo "<h3>" . $m['designation'] . "</h3>";
            echo "<label>code module</label>";
            echo "<input type='text' name='code' value='" . $m['codeModule'] . "' id='code' readonly>";

            echo "<label>coff module</label>";
            echo "<input type='text' name='coff' value='" . $m['coff'] . "' id='coff' readonly>";

            $note = $conn->query('SELECT * FROM note WHERE id_module = ' . $m['id']);
            if ($note->num_rows > 0) {
                echo '<label for="">note <input type="number" value=' . $note['note'] . 'class="note"> </label>"';
            } else {
                echo '<label for="">note <input type="number" name="note" class="note"> </label>';
            }
        }*/
            ?>
            <label for="">code :</label>
            <input type="text" name="code" id="code" readonly>

            <label for="">coff :</label>
            <input type="text" name="coff" id="coff" readonly>

            <label for="">note :</label>
            <input type="number" name="note" id="note">
            <div class="buttons">
                <a href="./listBulletin">List</a>
                <input type="submit" value="Bulletin" formaction="./tableBulletinEtud" formmethod="get">
            </div>
    </form>
    <script>
        document.querySelector('#module').addEventListener('change', function() {
            document.querySelector('#code').value = this.options[this.selectedIndex].getAttribute('data-code');
            document.querySelector('#coff').value = this.options[this.selectedIndex].getAttribute('data-coff');
            document.querySelector('#note').value = this.options[this.selectedIndex].getAttribute('data-note');
        });
    </script>

</body>

</html>