<?php
class addTeacher
{
    private $number;
    private $name;
    private $civil;
    private $addr;
    private $grade;
    private $spiciality;
    private $dateOfBirth;
    private $placeOfBirth;
    private $paye;
    private $univer;

    public function __construct($number, $civil, $name, $addr, $paye, $grade, $spiciality, $dateOfBirth, $placeOfBirth, $univer)
    {
        $this->number = $number;
        $this->civil = $civil;
        $this->name = $name;
        $this->addr = $addr;
        $this->paye = $paye;
        $this->grade = $grade;
        $this->spiciality = $spiciality;
        $this->dateOfBirth = $dateOfBirth;
        $this->placeOfBirth = $placeOfBirth;
        $this->univer = $univer;


        $this->add();
    }


    public function add()
    {
        require_once "db/conn.php";
        //avoid sql injection
        $number = $conn->real_escape_string($this->number);
        $name = $conn->real_escape_string($this->name);
        $civil = $conn->real_escape_string($this->civil);
        $addr = $conn->real_escape_string($this->addr);
        $paye = $conn->real_escape_string($this->paye);
        $grade = $conn->real_escape_string($this->grade);
        $spiciality = $conn->real_escape_string($this->spiciality);
        $dateOfBirth = $conn->real_escape_string($this->dateOfBirth);
        $placeOfBirth = $conn->real_escape_string($this->placeOfBirth);
        $univer = $conn->real_escape_string($this->univer);

        $sql = "INSERT INTO teacher (number, name, civilite, address,paye, grade, spicialite, dateOfBirth , placeOfBirth , id_univer) VALUES ('$number', '$name', '$civil', '$addr', '$paye', '$grade', '$spiciality', '$dateOfBirth' , '$placeOfBirth' , '$univer')";


        if ($conn->query($sql) === TRUE) {
        } else {
            include_once "views/partials/head.php";
            include_once "views/partials/nav.php";
            $message = "data not inserted , please try again" . "<center>" . $conn->error . "</center>";
            include_once "views/error.php";
            include_once "views/partials/footer.php";
            die();
        }
        $conn->close();
    }
}
