<?php
class addBulletin
{
    private $id_etudient;
    private $id_module;
    private $note;

    public function __construct($id_etudient, $id_module, $note)
    {
        $this->id_etudient = $id_etudient;
        $this->id_module = $id_module;
        $this->note = $note;

        $this->add();
    }

    private function add()
    {
        require_once "db/conn.php";
        //avoid sql injection
        $id_etudient = $conn->real_escape_string($this->id_etudient);
        $id_module = $conn->real_escape_string($this->id_module);
        $note = $conn->real_escape_string($this->note);
        $sql = "INSERT INTO note (id_etud, id_module, note) VALUES ('$id_etudient', '$id_module', '$note')";
        $conn->query($sql);
        header("Location: ./bulletin");
    }
}
