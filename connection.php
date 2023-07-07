<?php
class database
{
    public $db;
    public function __construct()
    {
        try {
            $this->db= new PDO
            ("mysql:host=localhost;dbname=music_application","admin","welcome");
//             echo "ok";
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function query($query)
    {
        $statement = $this->db->prepare($query);
        $statement->execute($statement);

        return $statement;
    }

}
