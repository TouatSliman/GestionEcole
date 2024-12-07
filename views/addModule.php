<form action="./creatModule" method="post">
    <div class="container">
        <label for="">code module :
            <input type="number" name="code" class="form-control" id="">
        </label>
        <label for="">desgnation module :
            <input type="text" name="designation" class="form-control" id="designation">
        </label>
        <label for="">coffecient module :
            <input type="number" name="coff" class="form-control" id="coffecient">
        </label>
        <label for="">volume horaire module :
            <input type="number" name="vol" class="form-control" id="volume_horaire">
        </label>
        <label for="">field :
            <select name="field" id="field">
                <?php
                require_once "db/conn.php";
                $field = $conn->query("SELECT * FROM field");
                foreach ($field as $f) {
                    echo "<option value='" . $f['id'] . "'>" . $f['name'] . "</option>";
                }
                ?>
            </select>
        </label>
        <div class="buttons">
            <input type="submit" value="Add">
            <a href="./listModule">Print List</a>
        </div>
    </div>
</form>