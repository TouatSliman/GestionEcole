<?php
class deleteBulletin
{
    private $id;
    public function __construct($id)
    {
        $this->id = $id;
        $this->delete();
    }
    public function delete()
    {
        require_once "db/conn.php";
        $sql = "DELETE FROM note WHERE id = $this->id";
        if ($conn->query($sql) === TRUE) {
            header("Location: ./bulletin");
        } else {
            include_once "views/partials/head.php";
            include_once "views/partials/nav.php";
            $message = "data not deleted , please try again";
            include_once "views/error.php";
            include_once "views/partials/footer.php";
            die();
        }
    }
}