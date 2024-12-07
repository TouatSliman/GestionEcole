<?php
require_once "db/conn.php";

if (isset($_GET["ID"])) {
    $id = $_GET["ID"];

    require_once "models/etudient/read.php";
    $row = $result->fetch_assoc();

    $fName = $row["fName"];
    $lName = $row["lName"];
    $dateOfBirth = $row["dateOfBirth"];
    $gender = $row["gender"];
    $address = $row["address"];
    $city = $row["city"];
    $postalCode = $row["postalCode"];
    $country = $row["country"];
    $platform = $row["platform"];
    $applications = $row["applications"];
    $profile = $row["profile"];
    $nat_id = $row["nat_id"];

    $platforms = explode(",", $platform);
    $applications = explode(",", $applications);
}
?>
<form action="./deleteStudent" method="post">

    <div class="container">
        <section>
            <div>
                <label for="fName">First Name :
                    <b><?= $fName ?></b>
                </label>

                <label for="lName">Last Name :
                    <b><?= $lName ?></b>
                </label>
            </div>
            <img class="profilePic" style="margin: 0 0 20px 0;" src="./db/img/<?= $profile ?>" alt="profile">
        </section>

        <label for="dateOfBirth">Date Of Birth :
            <b><?= $dateOfBirth ?></b>
        </label>

        <label for="gender">Gender :
            <b><?= $gender ?></b>
        </label>


        <label for="address">Address :
            <b><?= $address ?></b>
        </label>

        <label>City :
            <b><?= $city ?></b>
        </label>

        <label for="PostalCode">Postal Code :
            <b><?= $postalCode ?></b>
        </label>

        <label for="country">Country :
            <b><?= $country ?></b>
        </label>

        <label for="nationality">Nationality :
            <b>
                <?php
                include_once "nationality/list.php";
                foreach ($nationalities as $nationality) {
                    if ($nationality['id'] == $nat_id) {
                        echo $nationality['name'];
                    }
                }
                ?>
            </b>
        </label>

        <label>Platform(s) : </label>
        <ul>
            <?php
            foreach ($platforms as $platform) {
                echo "<li>$platform</li>";
            }
            ?>
        </ul>

        <label for="Applications">Applications :</label>
        <ul>
            <?php
            foreach ($applications as $Application) {
                echo "<li>$Application</li>";
            }
            ?>
        </ul>
        <input type="hidden" name="ID" value="<?= $id ?>">
        <div class="buttons">
            <input class="buttonRed" type="submit" value="Delete">
        </div>
    </div>

</form>