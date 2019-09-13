<?php

require_once("base.php");

class File extends Base
{
    public function __construct()
    {
        parent::__construct();
    }

    public function file_details($data)
    {
        $query = $this->db->prepare("
                INSERT INTO profiles (picture)
                VALUES (?)
            ");
        $query->execute([$data["picture"]]);

        return true;
    }
}
 ?> 