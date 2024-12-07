<?php
class addNationality
{
    private $name;
    private $code;

    public function __construct($name, $code)
    {
        $this->name = $name;
        $this->code = $code;
        $this->add();
    }

    private function add()
    {
        require_once "db/conn.php";

        $name = $conn->real_escape_string($this->name);
        $code = $conn->real_escape_string($this->code);
        $sql = "INSERT INTO nationalities (name , code) VALUES ('$name' , '$code')";

        if ($conn->query($sql) === TRUE) {
            header("Location: ./tables");
        } else {
            include_once "views/partials/head.php";
            include_once "views/partials/nav.php";
            $message = "data not inserted , please try again";
            include_once "views/error.php";
            include_once "views/partials/footer.php";
            die();
        }
    }
}
