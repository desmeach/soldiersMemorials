<?php
class RankModel
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

    public function readRankById(int $id)
    {
        $rank = R::findOne('rank', 'id = ?', [$id]);

        return $rank;
    }
}