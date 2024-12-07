<?php
class addSport
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
        require_once "db/conn.php";
        $sql = "INSERT INTO sports (name) VALUES ('" . $this->name . "')";
        $conn->query($sql);
        header("Location: ./tables");
    }
}