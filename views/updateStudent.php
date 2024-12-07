<?php
require_once "db/conn.php";

if (isset($_GET["ID"])) {
    $id = $_GET["ID"];

    require_once "models/etudient/read.php";
    $row1 = $result->fetch_assoc();

    $fName = $row1["fName"];
    $lName = $row1["lName"];
    $dateOfBirth = $row1["dateOfBirth"];
    $gender = $row1["gender"];
    $address = $row1["address"];
    $city = $row1["city"];
    $postalCode = $row1["postalCode"];
    $country = $row1["country"];
    $platform = $row1["platform"];
    $applications = $row1["applications"];
    $profile = $row1["profile"];
    $nat_id = $row1["nat_id"];
    $spr_id = $row1["spr_id"];
    $field_id = $row1["field_id"];

    $platforms = explode(",", $platform);
    $applications = explode(",", $applications);
    $sports_id = explode(",", $spr_id);
}
function in_table($value, $item)
{
    $i = 0;
    if ($item == $value) {
        return $i = 1;
    } else {
        return $i = 0;
    }
}
function platform($value, $item)
{
    $i = 0;
    foreach ($value as $platform) {
        if ($platform == $item) {
            echo "<input type='checkbox' name='platform[]' id='' value='" . $item . "' checked>";
            $i = 1;
            break;
        }
    }
    if ($i == 0) echo "<input type='checkbox' name='platform[]' id='' value='" . $item . "'>";
}

function application($value, $item)
{
    $i = 0;
    foreach ($value as $application) {
        if ($application == $item) {
            echo "<option style='color:red;' value='" . $item . "' selected>" . $item . "</option>";
            $i = 1;
            break;
        }
    }
    if ($i == 0) echo "<option value='" . $item . "'>" . $item . "</option>";
}

function sport($value, $item)
{
    $i = 0;
    foreach ($value as $sport) {
        if ($sport == $item['id']) {
            echo "<option style='color:red;' value='" . $item['id'] . "' selected>" . $item['name'] . "</option>";
            $i = 1;
            break;
        }
    }
    if ($i == 0) echo "<option value='" . $item['id'] . "'>" . $item['name'] . "</option>";
}
?>

<form action="./updateStudent" method="post" enctype="multipart/form-data">
    <input type="hidden" name="ID" value="<?= $id ?>">
    <div class="container">
        <section>
            <div>
                <label for="fName">First Name :</label> <!-- first name ----------------------------------------->
                <input type="text" name="fName" id="fName" placeholder="First Name" value="<?= $fName ?>">

                <label for="lName">Last Name :</label> <!-- last name ------------------------------------------>
                <input type="text" name="lName" id="lName" placeholder="Last Name" value="<?= $lName ?>">
            </div>
            <img class="profilePic" src="./db/img/<?= $profile ?>" alt="profile"> <!-- profile picture -->
        </section>
        <label for="dateOfBirth">Date Of Birth :</label> <!-- date of birth -------------------------------------->
        <input type="date" name="dateOfBirth" id="dateOfBirth" value="<?= $dateOfBirth ?>">

        <label for="gender">Gender :</label> <!-- gender ----------------------------------------------------->
        <label>
            <label class="radioName">
                <i>male</i>
                <input type="radio" name="gender" id="" value="male" <?php if ($gender == "male") echo "checked" ?>>
            </label>
            <label class="radioName">
                <i>female</i>
                <input type="radio" name="gender" id="" value="female" <?php if ($gender == "female") echo "checked" ?>>
            </label>
        </label>

        <label for="profile">Profile :</label> <!-- profile ------------------------------------------------------>
        <label class="button" for="profile">&nbsp;Choose Picture</label>
        <input type="file" class="fileInput" name="newProfile" id="profile" accept="image/*">
        <input type="hidden" name="profile" value="<?= $profile ?>">

        <label for="address">Address :</label> <!-- address ------------------------------------------------------->
        <input type="text" name="address" id="address" placeholder="Address" value="<?= $address ?>">

        <label>City :</label> <!-- city ----------------------------------------------------------->
        <section>
            <select name="city" id="city" class="city">
                <?php
                $cities = ["oran", "alger", "sidi bel abbes", "tizi ouzou", "tlemcen", "bejaia", "biskra", "setif", "tizi gheni", "touggourt", "bechar", "el bayadh", "souk ahras", "khenchela", "tipaza", "mila", "khemisset", "khenifra"];

                foreach ($cities as $item) {
                    if (in_table($city, $item)) {
                        echo "<option value='$item' selected>$item</option>";
                    } else {
                        echo "<option value='$item'>$item</option>";
                    }
                }
                ?>
            </select>
            <!-- postal code ------------------------------------------------------------------>
            <input type="text" class="postalCode" name="postalCode" id="PostalCode" placeholder="Postal Code" value="<?= $postalCode ?>">
        </section>


        <label for="country">Country :</label> <!-- country ------------------------------------------------------>
        <select name="country" id="country">
            <?php
            $countries = ["Algeria", "Morocco", "Tunisia", "Egypt", "Libya", "Sudan", "Qatar", "Bahrain", "United Arab Emirates", "Oman", "Yemen", "Syria", "Jordan", "Lebanon", "Palestine"];
            foreach ($countries as $item) {
                if (in_table($country, $item)) {
                    echo "<option value='$country' selected>$country</option>";
                } else {
                    echo "<option value='$item'>$item</option>";
                }
            }
            ?>
        </select>

        <label>Platform(s) : </label> <!-- platforms ---------------------------------------------------->
        <label>
            <label class="radioName">
                <i>apple</i>
                <?php
                platform($platforms, "apple");
                ?>
            </label>
            <label class="radioName">
                <i>windows</i>
                <?php
                platform($platforms, "windows");
                ?>
            </label>
            <label class="radioName">
                <i>linux</i>
                <?php
                platform($platforms, "linux");
                ?>
            </label>
        </label>


        <label for="applications">Applications :</label> <!-- applications ----------------------------------------------------->
        <select class="applications" name="applications[]" id="" multiple>
            <?php
            application($applications, "paw");
            application($applications, "web");
            application($applications, "sgbd");
            application($applications, "mobile");
            application($applications, "desktop");
            ?>
        </select>

        <label for="nationality">Nationality :</label> <!-- nationality ------------------------------------------------------>
        <select name="nationality" id="nationality">
            <?php
            require_once "db/conn.php";
            $nationalities = $conn->query("SELECT * FROM nationalities");
            foreach ($nationalities as $nationality) {
                if ($nationality['id'] == $nat_id) {
                    echo "<option value='" . $nationality['id'] . "' selected>" . $nationality['name'] . "</option>";
                }
                echo "<option value='" . $nationality['id'] . "'>" . $nationality['name'] . "</option>";
            }
            ?>
        </select>

        <label for="sport">Sports :</label> <!-- sports ------------------------------------------------------>
        <select name="sport[]" id="sport" multiple>
            <?php
            $sport = $conn->query("SELECT * FROM sports");
            foreach ($sport as $s) {
                sport($sports_id, $s);
            }

            ?>
        </select>

        <label for="field">Field :</label> <!-- field ------------------------------------------------------>
        <select name="field" id="field">
            <?php
            $field = $conn->query("SELECT * FROM field");
            foreach ($field as $f) {
                if ($f['id'] == $field_id) {
                    echo "<option value='" . $f['id'] . "' selected>" . $f['name'] . "</option>";
                }
                echo "<option value='" . $f['id'] . "'>" . $f['name'] . "</option>";
            }
            ?>
        </select>

        <div class="buttons">
            <input type="submit" value="update" class="buttonOrange">
        </div>
    </div>
</form>