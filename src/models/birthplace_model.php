<?php
class BirthplaceModel
{
    private $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function openConnection()
    {
        $this->database->openConnection();
    }

    public function closeConnection()
    {
        $this->database->closeConnection();
    }

    public function readBirthplaceById(int $id)
    {
        try
        {
            $birthplace = R::findOne('birthplace', 'id = ?', [$id]);

            return $birthplace;
        }
        catch(Exception $e)
        {
            echo 'Error: ' . $e->getMessage();
        }
    }
}