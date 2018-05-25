<?php
namespace lib;

require_once "autoload.php";
// require_once "ConnectToDb.php";


class Brigade
{
    use ConnectToDb;
    private $connect;

    // public function __construct()
    // {
    //     $this->listOfEmployees = $listOfEmployees;
    //     $this->description = $description;
    // }

    public function getOllBrigadier()
    {
        $this->connect = $this->connectToDb();
        return $this->sortInformationDb();
    }

    public function getBrigadeByIDBrigadier($id)
    {
        $this->connect = $this->connectToDb();
        $arrayWorker = $this->getListWorker($this->getIdWorker($id));
        return $arrayWorker;
    }
  
    private function sortInformationDb()
    {
        $sort = $this->connect->query("SELECT `id`, `name`  FROM `brigadier` WHERE 1");
        foreach ($sort as $key => $value) {
                $mas[] = $value;
        }
        return $mas;
    }
    
    private function getIdWorker($id)
    {
        $conn = $this->connect;
        foreach ($conn->query("SELECT `id`, `name`, `description`, `dailySalary`, `position`, `idWorker`, `changeDate`, `daysWorked` FROM `brigadier` WHERE `id`='$id'") as $value) {
                    $id = $value["idWorker"];
        }
        return $id;
    }
    
    private function getListWorker($id)
    {
        $res = $this->connect->query("SELECT `id`, `Name`, `listOfTools`, `position`, `dailySalary`, `changeDate`, `daysWorked` FROM `worker` WHERE `idBrigadier`='$id'");
        foreach ($res as $key => $value) {
                $arrayWorker[] = $value;
        }
        return $arrayWorker;
    }
}
