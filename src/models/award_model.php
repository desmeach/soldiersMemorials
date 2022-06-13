<?php
class AwardModel
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

    public function readAwardById(int $id)
    {
        $soldierAwardId = R::findOne('soldier_award', 'id_soldier = ?', [$id]);

        $soldierAward =  R::findOne('award', 'id = ?', [$soldierAwardId["id_award"]]);

        return $soldierAward;
    }
}