<form action="./creatTeacher" method="post" enctype="multipart/form-data">
    <div class="container">
        <label for="">number :
            <input type="number" name="number" id="">
        </label>
        <label for="">
            civilite :
            <input type="text" name="civility" id="">
        </label>
        <label for="">
            name :
            <input type="text" name="name" id="">
        </label>
        <label for="">
            date of birth :
            <input type="date" name="dateOfBirth" id="">
        </label>
        <label for="">
            place of birth :
            <input type="text" name="placeOfBirth" id="">
        </label>
        <label for="">
            Address :
            <input type="text" name="address" id="">
        </label>
        <label for="">
            paye :
            <input type="text" name="paye" id="">
        </label>
        <label for="">
            grade :
            <select name="grade" id="">
                <option value="Assistant">Assistant</option>
                <option value="MAB">MAB</option>
                <option value="MAA">MAA</option>
                <option value="MCB">MCB</option>
                <option value="MCA">MCA</option>
                <option value="Profficeur">Profficeur</option>
            </select>
        </label>
        <label for="">
            spicialite :
            <select name="specialty" id="">
                <option value="Informatique">Informatique</option>
                <option value="Mathimatique">Mathimatique</option>
                <option value="Anglis">Anglis</option>
                <option value="autres">autres</option>
            </select>
        </label>
        <label for="">univercity :
            <select name="univercity">
                <?php
                require_once "db/conn.php";
                $sql = "SELECT * FROM univercity";
                $unis = $conn->query($sql);
                foreach ($unis as $uni) {
                    echo "<option value='" . $uni['id'] . "'>" . $uni['name'] . "</option>";
                }
                ?>
            </select>
        </label>
        </label>
        <div class="buttons">
            <input type="submit" value="Register">
            <a href="./listTeacher">Print List</a>
        </div>
    </div>
</form>