<?php
namespace DataManager\DataController;

include_once "DataManager/SessionController.php";
include_once "DataManager/DatabaseController.php";
include_once "DataManager/DatabaseManager/Database/Connection/DatabaseConfiguration.php";
include_once "DataManager/InputController.php";

use DataManager\SessionManager\Session;
use DataManager\DatabaseManager\DB;
use DataManager\DatabaseManager\Connection\classes;
use DataManager\InputManager\Data;

class DataControl
{
    private $allData = array();
    private $table = "";

    private $RecordList = [];

    public function __construct()
    {
        $this->table = classes::getKeys();
        $return = DB::do()
                    ->select()
                    ->all()
                    ->from('Records')
                    ->where('_ID')
                    ->isEqualTo(Session::get('ID'))
                    ->and('POS')
                    ->isEqualTo(Session::get('POS'))
                    ->endSelect();
        $this->allData = $return;
    }

    public static function data()
    {
        return new self;
    }
    public function set($record, $date)
    {
        $allSetterData = array($record, $date, 'Pending', Session::get('ID'), Session::get('POS'), "--//--");

        return DB::do()
            ->insert('Records')
            ->values($allSetterData)
            ->endInsert();
    }
    public function delete($id)
    {
        return DB::do()
                ->delete('Records')
                ->where("ID")
                ->isEqualTo($id)
                ->endDelete();
    }
    public function allData()
    {
        return $this->allData;
    }
    public function getCompleteData()
    {
        $return = DB::do()
            ->select()
            ->all()
            ->from('Records')
            ->endSelect();
        return $return;
    }
    public function getNonAdminUserAndData()
    {
        $studentData = DB::do()->select()->all()->from('Student')->endSelect();
        $alumniData = DB::do()->select()->all()->from('Alumni')->endSelect();

        return array_merge($studentData, $alumniData);
    }
    public function update($id, $date, $status)
    {
        $return = DB::do()->update('Records')
                ->set()
                ->thisColumn('PICKUP')->isEqualTo($date)->also()
                ->thisColumn('STATUS')->isEqualTo($status)
                ->where('ID')->isEqualTo($id)
                ->endUpdate();
        return $return;
    }
}

?>