<?php
class updateBulletin
{
    private $etudient;
    private $module;
    private $note;

    public function __construct( $etudient, $module, $note)
    {
        $this->etudient = $etudient;
        $this->module = $module;
        $this->note = $note;
        
        $this->update();
    }

    private function update()
    {
        require_once "db/conn.php";
        
        $etudient = $conn->real_escape_string($this->etudient);
        $module = $conn->real_escape_string($this->module);
        $note = $conn->real_escape_string($this->note);

        $sql = "UPDATE note SET note = '$note' WHERE id_etud = '$etudient' AND id_module = '$module'";
        $conn->query($sql);
        header("Location: ./bulletin");
    }
}