<form action="./creatStudent" method="post" enctype="multipart/form-data">
    <div class="container">
        <section>
            <div>
                <label for="fName">First Name :</label>
                <input type="text" name="fName" id="fName" placeholder="First Name">

                <label for="lName">Last Name :</label>
                <input type="text" name="lName" id="lName" placeholder="Last Name">
            </div>
            <img class="profilePic" src="./src/img/profile.png" alt="profile">
        </section>
        <label for="dateOfBirth">Date Of Birth :</label>
        <input type="date" name="dateOfBirth" id="dateOfBirth">

        <label for="gender">Gender :</label>
        <label>
            <label class="radioName">
                <i>male</i>
                <input type="radio" name="gender" class="gender" value="male">
            </label>
            <label class="radioName">
                <i>female</i>
                <input type="radio" name="gender" class="gender" value="female">
            </label>
        </label>

        <label for="profile">Profile :</label>
        <label class="button" for="profile">&nbsp;Choose Picture</label>
        <input type="file" class="fileInput" name="profile" id="profile" accept="image/*">

        <label for="address">Address :</label>
        <input type="text" name="address" id="address" placeholder="Address">

        <label>City / Postal Code :</label>
        <section>
            <select name="city" id="city" class="city">
                <option value="">-- select city --</option>
                <option value="oran">oran</option>
                <option value="alger">alger</option>
                <option value="sidi bel abbes">sidi bel abbes</option>
                <option value="tizi ouzou">tizi ouzou</option>
                <option value="tlemcen">tlemcen</option>
                <option value="bejaia">bejaia</option>
                <option value="setif">setif</option>
                <option value="mednine">mednine</option>
                <option value="batna">batna</option>
                <option value="biskra">biskra</option>
                <option value="skikda">skikda</option>
                <option value="touggourt">touggourt</option>
                <option value="bechar">bechar</option>
                <option value="el bayadh">el bayadh</option>
                <option value="souk ahras">souk ahras</option>
                <option value="khenchela">khenchela</option>
                <option value="tipaza">tipaza</option>
                <option value="mila">mila</option>
                <option value="khemisset">khemisset</option>
                <option value="khenifra">khenifra</option>
            </select>

            <input type="number" class="postalCode" name="postalCode" id="postalCode" placeholder="Postal Code">
        </section>

        <label for="country">Country :</label>
        <select name="country" id="country">
            <option value="">-- select country --</option>
            <option value="Algeria">Algeria</option>
            <option value="Morocco">Morocco</option>
            <option value="Tunisia">Tunisia</option>
            <option value="Egypt">Egypt</option>
            <option value="Libya">Libya</option>
            <option value="Sudan">Sudan</option>
            <option value="Egypt">Egypt</option>
            <option value="Qatar">Qatar</option>
            <option value="Bahrain">Bahrain</option>
            <option value="United Arab Emirates">United Arab Emirates</option>
            <option value="Oman">Oman</option>
            <option value="Yemen">Yemen</option>
            <option value="Syria">Syria</option>
            <option value="Jordan">Jordan</option>
            <option value="Lebanon">Lebanon</option>
            <option value="Palestine">Palestine</option>
        </select>

        <label>Platform(s) : </label>
        <label>
            <label class="radioName">
                <i>apple</i>
                <input type="checkbox" name="platform[]" class="platform" value="apple">
            </label>
            <label class="radioName">
                <i>windows</i>
                <input type="checkbox" name="platform[]" class="platform" value="windows">
            </label>
            <label class="radioName">
                <i>linux</i>
                <input type="checkbox" name="platform[]" class="platform" value="linux">
            </label>
        </label>

        <label for="applications">Applications :</label>
        <select name="applications[]" id="applications" multiple>
            <option value="paw">paw</option>
            <option value="web">web</option>
            <option value="sgbd">sgbd</option>
            <option value="mobile">mobile</option>
            <option value="desktop">desktop</option>
        </select>

        <label for="nationality">Nationality :</label>
        <select name="nationality" id="nationality">
            <?php
            require_once "db/conn.php";
            $sql = "SELECT * FROM nationalities";
            $nationalities = $conn->query($sql);
            foreach ($nationalities as $nationality) {
                echo "<option value='" . $nationality['id'] . "'>" . $nationality['name'] . "</option>";
            }
            ?>
        </select>

        <label for="sport">Sport(s) :</label>
        <select name="sport[]" id="sport" multiple>
            <?php
            require_once "db/conn.php";
            $sql = "SELECT * FROM sports";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                }
            }
            ?>
        </select>

        <label for="field">Field :</label>
        <select name="field" id="field">
            <?php
            require_once "db/conn.php";
            $sql = "SELECT * FROM field";
            $fields = $conn->query($sql);
            foreach ($fields as $field) {
                echo "<option value='" . $field['id'] . "'>" . $field['name'] . "</option>";
            }
            ?>
        </select>

        <div class="buttons">
            <input type="submit" value="Register">
            <input type="submit" value="Print PHP" formaction="./printStudent">
            <input type="button" value="Print JS" id="printJS">
            <a href="./listStudent">Print List</a>
        </div>
    </div>
</form>

<script>
    // ------ print JS Button ------
    const fname = document.getElementById("fName");
    const lname = document.getElementById("lName");
    const date = document.getElementById("dateOfBirth");
    let gender = document.getElementsByClassName("gender");
    // check the selected gender
    for (let i = 0; i < gender.length; i++) {
        if (gender[i].checked) {
            gender = gender[i];
        }
    }
    const address = document.getElementById("address");
    const city = document.getElementById("city");
    const postalCode = document.getElementById("postalCode");
    const country = document.getElementById("country");
    const platform = document.getElementsByClassName("platform");
    let platformValue = "";
    for (let i = 0; i < platform.length; i++) {
        if (platform[i].checked) {
            platformValue += platform[i].value + " ,";
        }
    }
    let applications = document.getElementById("applications");
    applications = getSelectValues(applications);

    const applicationsValue = applications.join(",");
    const profile = document.getElementById("profile");
    const nationality = document.getElementById("nationality");



    document.getElementById("printJS").addEventListener("click", function() {
        if (
            fname.value == "" ||
            lname.value == "" ||
            date.value == "" ||
            gender.value == "" ||
            address.value == "" ||
            city.value == "" ||
            postalCode.value == "" ||
            country.value == "" ||
            platformValue == "" ||
            profile.value == "" ||
            nationality.value == ""
        ) {
            alert("Please fill all elements !");
            console.log(
                fname.value,
                lname.value,
                date.value,
                gender.value,
                address.value,
                city.value,
                postalCode.value,
                country.value,
                platformValue,
                applicationsValue,
                profile.value,
                nationality.innerHTML
            );
            return;
        }

        let data = {
            fname,
            lname,
            date,
            gender,
            address,
            city,
            postalCode,
            country,
            profile,
            nationality
        };
        alert(
            "Name: " +
            data.fname.value +
            " " +
            data.lname.value +
            "\n" +
            "Date of Birth: " +
            data.date.value +
            "\n" +
            "Gender: " +
            data.gender.value +
            "\n" +
            "Address: " +
            data.address.value +
            "\n" +
            "City: " +
            data.city.value +
            "\n" +
            "Postal Code: " +
            data.postalCode.value +
            "\n" +
            "Platform: " +
            platformValue +
            "\n" +
            "Applications: " +
            applicationsValue +
            "\n" +
            "Profile: " +
            data.profile.value +
            "\n" +
            "Nationality: " +
            data.nationality.selectedOptions[0].text
        );
    });

    function getSelectValues(select) {
        var result = [];
        var options = select && select.options;
        var opt;

        for (var i = 0, iLen = options.length; i < iLen; i++) {
            opt = options[i];

            if (opt.selected) {
                result.push(opt.value || opt.text);
            }
        }
        return result;
    }
</script>