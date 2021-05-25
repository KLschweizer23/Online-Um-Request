<?php
namespace DataManager\DatabaseManager;

include_once "DataManager/DatabaseManager/Database.php";
include_once "DataManager/DatabaseManager/Database/Connection/DatabaseConfiguration.php";

use DataManager\DatabaseManager\database;
use DataManager\DatabaseManager\Connection\Classes;

class DB
{
    private $table = "";
    private $sqlQuery = "";

    public static function do()
    {
        return new self;
    }
//--------------EXTRA PRIVATE FUNCTIONS-----------------//
    private function columns()
    {
        $class = Classes::getClass($this->table);
        $returnArray = $class->all();

        return $returnArray;
    }
   
    private function compileArrayToSeries($array = null, $surround = "", $arrayShift = true)
    {
        $strData = "";
        
        $data = $array == null ? $this->columns() : $array;
        if($arrayShift) array_shift($data);
        foreach ($data as $val){$strData = $strData . "," . $surround . $val . $surround;}
        $strData = "(" . substr($strData, 1) . ")";
        
        return $strData;
    }
    private function add($string)
    {
        $this->sqlQuery = $this->sqlQuery . " " . $string;
        return $this;
    }
//------------------INSERT FUNCTION---------------------//
    public function insert($table)
    {
        $this->table = $table;
        $this->add("INSERT INTO " . $table . $this->compileArrayToSeries());
        return $this;
    }
    public function values($values)
    {
        $this->add("VALUES " . $this->compileArrayToSeries($values, "'", false));
        return $this;
    }
    public function endInsert()
    {
        return database::insertData($this->table, $this->sqlQuery);
    }

//------------------DELETE FUNCTION---------------------//
    public function delete($table)
    {
        $this->table = $table;
        $this->add("DELETE FROM " . $table);
        return $this;
    }
    public function id($id)
    {
        $this->add($id);
        return $this;
    }
    public function endDelete()
    {
        return database::deleteData($this->table, $this->sqlQuery);
    }

//------------------UPDATE FUNCTION---------------------//
    public function update($table)
    {
        $this->table = $table;
        $this->add(" UPDATE " . $table);
        return $this;
    }
    public function set()
    {
        $this->add("set");
        return $this;
    }
    public function endUpdate()
    {
        return database::updateData($this->table, $this->sqlQuery);
    }
//------------------GET FUNCTION---------------------//
    public function select()
    {
        $this->add("SELECT");
        return $this;
    }
    public function all()
    {
        $this->add("*");
        return $this;
    }
    public function column($column)
    {
        $this->add($column);
        return $this;
    }
    public function from($table)
    {
        $this->table = $table;
        $this->add("FROM " . $table);
        return $this;
    }
    public function endSelect()
    {
        return database::selectData($this->table, $this->sqlQuery);
    }
//------------------EXTRA FUNCTION---------------------//
    public function isEqualTo($value)
    {
        $this->add("= '" . $value . "'");
        return $this;
    }
    public function isNotEqualTo($value)
    {
        $this->add("!= '" . $value . "'");
        return $this;
    }
    public function where($column)
    {
        $this->add(" WHERE " . $column);
        return $this;
    }
    public function and($column)
    {
        $this->add(" AND " . $column);
        return $this;
    }
    public function thisColumn($column)
    {
        $this->add($column);
        return $this;
    }
    public function also()
    {
        $this->add(",");
        return $this;
    }
}
?>