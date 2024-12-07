<?php
require_once "db/conn.php";

if (isset($_GET["ID"])) {
    $id = $_GET["ID"];

    require_once "models/bulletin/read.php";
    $row = $result->fetch_assoc();

    $civilite = $row["civilite"];
    $nom = $row["nom"];
    $field = $row["field"];
    $module = $row["module"];
    $code = $row["code"];
    $coff = $row["coff"];
    $note = $row["note"];
}
?>
<form action="./deleteStudent" method="post">

    <div class="container">

        <input type="hidden" name="ID" value="<?= $id ?>">
        <label for="civilite">civilite : </label>
        <input type="text" name="civilite" id="civilite" value="<?= $civilite ?>" readonly>
        <label for="nom">nom : </label>
        <input type="text" name="nom" id="nom" value="<?= $nom ?>" readonly>
        <label for="field">field : </label>
        <input type="text" name="field" id="field" value="<?php
            require_once "db/conn.php";
            $field = $conn->query("SELECT * FROM field WHERE id = $field");
            foreach ($field as $f) {
                echo $f['name'];
            }
        ?>" readonly>
        <label for="module">module : </label>
        <input type="text" name="module" id="module" value="<?php 
            require_once "db/conn.php";
            $module = $conn->query("SELECT * FROM module WHERE id = $module");
            foreach ($module as $m) {
                echo $m['codeModule'];
            }
         ?>" readonly>
        <label for="code">code : </label>
        <input type="text" name="code" id="code" value="<?= $code ?>" readonly>
        <label for="coff">coff : </label>
        <input type="text" name="coff" id="coff" value="<?= $coff ?>" readonly>
        <label for="note">note : </label>
        <input type="text" name="note" id="note" value="<?= $note ?>" readonly>
        
        <div class="buttons">
            <input class="buttonRed" type="submit" value="Delete">
        </div>
    </div>

</form>