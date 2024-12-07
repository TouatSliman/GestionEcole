<?php
class addModule
{
    private $code;
    private $designation;
    private $coff;
    private $vol;
    private $field;

    public function __construct($code, $designation, $coff, $vol, $field)
    {
        $this->code = $code;
        $this->designation = $designation;
        $this->coff = $coff;
        $this->vol = $vol;
        $this->field = $field;

        $this->add();
    }

    public function add()
    {
        require_once "db/conn.php";
        $sql = "INSERT INTO module (codeModule, designation, coff, vol, id_filiere ) VALUES ($this->code, '$this->designation', $this->coff, $this->vol, $this->field)";
        $conn->query($sql);
        header("Location: ./module");
    }
}
