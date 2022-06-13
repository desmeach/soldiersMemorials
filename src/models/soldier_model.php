<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/soldiers/src/models/birthplace_model.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/soldiers/src/models/status_model.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/soldiers/src/models/enlistment_model.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/soldiers/src/models/military_unit_model.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/soldiers/src/models/award_model.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/soldiers/src/models/rank_model.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/soldiers/src/models/retire_model.php";

class SoldierModel
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

    public function readSoldierById($id)
    {
        return $this->readSoldierBy("id", $id);
    }

    public function readSoldierBySurname($surname)
    {
        return $this->readSoldierBy("surname", $surname);
    }

    private function readSoldierBy(string $field, $value)
    {
        $soldier = R::findOne('soldiers', $field . ' = ?', [$value]);

        $soldier["birthplace"] = new BirthplaceModel($this->database);
        $soldier["birthplace"] = $soldier["birthplace"]->readBirthplaceById($soldier["id_birthplace"]);

        $soldier["status"] = new StatusModel($this->database);
        $soldier["status"] = $soldier["status"]->readStatusById($soldier["id_status"]);

        $soldier["enlistment"] = new EnlistmentModel($this->database);
        $soldier["enlistment"] = $soldier["enlistment"]->readEnlistmentById($soldier["id_enlistment"]);
        
        $soldier["militaryUnit"] = new MilitaryUnitModel($this->database);
        $soldier["militaryUnit"] = $soldier["militaryUnit"]->readMilitaryUnitById($soldier["id_military_unit"]);

        $soldier["award"] = new AwardModel($this->database);
        $soldier["award"] = $soldier["award"]->readAwardById($soldier["id"]);

        $soldier["rank"] = new RankModel($this->database);
        $soldier["rank"] = $soldier["rank"]->readRankById($soldier["id_rank"]);

        $soldier["retire"] = new RetireModel($this->database);
        $soldier["retire"] = $soldier["retire"]->readRetireById($soldier["id_retire"]);

        return $soldier;
    }
}