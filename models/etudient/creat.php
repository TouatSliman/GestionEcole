<?php
class addStudent
{
    private $fName;
    private $lName;
    private $dateOfBirth;
    private $gender;
    private $address;
    private $city;
    private $postalCode;
    private $country;
    private $platform;
    private $applications;
    private $profile;
    private $nat_id;
    private $spr_id;
    private $field_id;

    public function __construct($fName, $lName, $dateOfBirth, $gender, $address, $city, $postalCode, $country, $platform, $applications, $profile, $nat_id, $spr_id, $field_id)
    {
        $this->fName = $fName;
        $this->lName = $lName;
        $this->dateOfBirth = $dateOfBirth;
        $this->gender = $gender;
        $this->address = $address;
        $this->city = $city;
        $this->postalCode = $postalCode;
        $this->country = $country;
        $this->platform = $platform;
        $this->applications = $applications;
        $this->profile = $profile;
        $this->nat_id = $nat_id;
        $this->spr_id = $spr_id;
        $this->field_id = $field_id;

        $this->add();
    }


    public function add()
    {
        require_once "db/conn.php";
        //avoid sql injection
        $fName = $conn->real_escape_string($this->fName);
        $lName = $conn->real_escape_string($this->lName);
        $dateOfBirth = $conn->real_escape_string($this->dateOfBirth);
        $gender = $conn->real_escape_string($this->gender);
        $address = $conn->real_escape_string($this->address);
        $city = $conn->real_escape_string($this->city);
        $postalCode = $conn->real_escape_string($this->postalCode);
        $country = $conn->real_escape_string($this->country);
        $platform = $conn->real_escape_string($this->platform);
        $applications = $conn->real_escape_string($this->applications);
        $profile = $conn->real_escape_string($this->profile);
        $nat_id = $conn->real_escape_string($this->nat_id);
        $spr_id = $conn->real_escape_string($this->spr_id);
        $field_id = $conn->real_escape_string($this->field_id);

        $sql = "INSERT INTO students (fName, lName, dateOfBirth, gender, address, city, postalCode, country, platform, applications, profile, nat_id , spr_id, field_id) VALUES ('$fName', '$lName', '$dateOfBirth', '$gender', '$address', '$city', '$postalCode', '$country', '$platform', '$applications', '$profile' , '$nat_id' , '$spr_id', '$field_id')";

        if ($conn->query($sql) === TRUE) {
            move_uploaded_file($_FILES["profile"]["tmp_name"], "./db/img/" . $_FILES["profile"]["name"]);
        } else {
            include_once "views/partials/head.php";
            include_once "views/partials/nav.php";
            $message = "data not inserted , please try again";
            include_once "views/error.php";
            include_once "views/partials/footer.php";
            die();
        }
        $conn->close();
    }
}
