<?php
if (isset($_POST["name"])) {
    echo "reached";
    require_once "models/field/creat.php";
    new addField($_POST["name"]);
} else {
    echo "<h2 style='text-align: center; margin-top: 20px'>Field</h2>";
    include_once "views/addField.php";
    echo "</body></html>";
}
