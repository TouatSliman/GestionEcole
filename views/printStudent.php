<style>
    .ul{
        margin: 0 0 20px 60px;

    }
</style>
<div class="container">
    <section>
        <div>
            <label for="fName">First Name :
                <b><?= $_POST["fName"] ?></b>
            </label>

            <label for="lName">Last Name :
                <b><?= $_POST["lName"] ?></b>
            </label>
        </div>
        <img class="profilePic" style="margin: 0 0 20px 0;" src="./db/img/<?= $_FILES["profile"]["name"] ?>" alt="profile">
    </section>

    <label for="dateOfBirth">Date Of Birth :
        <b><?= $_POST["dateOfBirth"] ?></b>
    </label>

    <label for="gender">Gender :
        <b><?= $_POST["gender"] ?></b>
    </label>


    <label for="address">Address :
        <b><?= $_POST["address"] ?></b>
    </label>

    <label>City :
        <b><?= $_POST["city"] ?></b>
    </label>

    <label for="PostalCode">Postal Code :
        <b><?= $_POST["postalCode"] ?></b>
    </label>

    <label for="country">Country :
        <b><?= $_POST["country"] ?></b>
    </label>

    <label>Nationality :
        <b>
            <?php
            require_once "db/conn.php";
            $sql = "SELECT nationalities.name, nationalities.code FROM nationalities, students WHERE nationalities.id = " . $_POST["nationality"];
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo  $row["name"] . " - " . $row["code"];
            }
            ?>
        </b>
    </label>

    <label for="">Field :
        <b>
            <?php
            require_once "db/conn.php";
            $sql = "SELECT field.name FROM field, students WHERE field.id = " . $_POST["field"];
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo  $row["name"];
            }
            ?>
        </b>
    </label>

    <label for="">Sport :</label>
    <?php
    require_once "db/conn.php";
    echo "<ul class='ul'>";
    foreach ($_POST["sport"] as $sport) {
        $res = $conn->query("SELECT sports.name FROM sports, students WHERE sports.id = " . $sport);
        $res = $res->fetch_assoc();
        echo  "<li>" . $res["name"] . "</li>";
    }
    echo "</ul>";
    ?>


    <label>Platform(s) : </label>
    <ul class="ul">
        <?php
        foreach ($_POST["platform"] as $platform) {
            echo "<li>$platform</li>";
        }
        ?>
    </ul>

    <label for="Applications">Applications :</label>
    <ul class="ul">
        <?php
        foreach ($_POST["applications"] as $Application) {
            echo "<li>$Application</li>";
        }
        ?>
    </ul>

    <label for=""></label>



</div>