<?php
namespace DataManager\DatabaseManager\Connection;

include_once "DataManager/DatabaseManager/Database/Functions/Attributes.php";

use DataManager\DatabaseManager\Attributes\Attr;

class classes
{
    public static function getClass($chosenClass)
    {
        $AdminClass = new Admin();
        $StudentClass = new Student();
        $AlumniClass = new Alumni();
        $RecordsClass = new Records();
        
        $returnArray = array(
            'Admin'=>$AdminClass, 
            'Student'=>$StudentClass, 
            'Alumni'=>$AlumniClass,
            'Records'=>$RecordsClass
        );

        return $returnArray[$chosenClass];
    }
    public static function getKeys()
    {
        $returnArray = array(
            'admin' => 'Admin', 
            'student' => 'Student', 
            'alumni' => 'Alumni'
        );

        return $returnArray;
    }
}

class Config
{
    private $databaseConfig = array(
        'serverName'=>'localhost',
        'username'=>'root',
        'password'=>'',
        'databaseName'=>'OnlineRecords'
    );

    public static function get()
    {
        return new self;
    }
    public function has($varName)
    {
        return $this->databaseConfig[$varName];
    }
    public function all()
    {
        return $this->databaseConfig;
    }
}

class Admin
{
    private $adminColumns = array(
        'id'=>'ID',
        'firstname'=>'FIRSTNAME',
        'middlename'=>'MIDDLENAME',
        'lastname'=>'LASTNAME',
        'address'=>'ADDRESS',
        'phone'=>'PHONE',
        'position'=>'POSITION',
        'email'=>'EMAIL',
        'admin_id'=>'Admin_ID',
        'password'=>'PASSWORD'
    );
    public function col($varName)
    {
        return $this->adminColumns[$varName];
    }
    public function all()
    {
        return $this->adminColumns;
    }
    public function attributedCol()
    {
        $adminAttr = array(
            'id'=>'ID ' . attr::has()->INT()->UNSIGNED()->AUTO_INCREMENT()->PRIMARY_KEY()->NEXT() . '',
            'firstname'=>'FIRSTNAME ' . attr::has()->VARCHAR(150)->NOT_NULL()->NEXT() . '',
            'middlename'=>'MIDDLENAME ' . attr::has()->VARCHAR(150)->NOT_NULL()->NEXT() . '',
            'lastname'=>'LASTNAME ' . attr::has()->VARCHAR(150)->NOT_NULL()->NEXT() . '',
            'address'=>'ADDRESS ' . attr::has()->VARCHAR(150)->NOT_NULL()->NEXT() . '',
            'phone'=>'PHONE ' . attr::has()->VARCHAR(150)->NOT_NULL()->NEXT() . '',
            'position'=>'POSITION ' . attr::has()->VARCHAR(150)->NOT_NULL()->NEXT() . '',
            'email'=>'EMAIL ' . attr::has()->VARCHAR(150)->NOT_NULL()->NEXT() . '',
            'admin_id'=>'Admin_ID ' . attr::has()->VARCHAR(150)->NOT_NULL()->NEXT() . '',
            'password'=>'PASSWORD ' . attr::has()->VARCHAR(150)->NOT_NULL()->END()
        );

        $string = "";
        foreach($adminAttr as $column)
        {
            $string = $string . $column;
        }
        return $string;
    }
}
class Student
{
    private $studentColumns = array(
        'id'=>'ID',
        'firstname'=>'FIRSTNAME',
        'middlename'=>'MIDDLENAME',
        'lastname'=>'LASTNAME',
        'address'=>'ADDRESS',
        'phone'=>'PHONE',
        'email'=>'EMAIL',
        'student_id'=>'Student_ID',
        'password'=>'PASSWORD',
        'syear'=>'SYEAR',
        'course'=>'COURSE'
    );
    public function col($varName)
    {
        return $this->studentColumns[$varName];
    }
    public function all()
    {
        return $this->studentColumns;
    }
    public function attributedCol()
    {
        $studentAttr = array(
            'id'=>'ID ' . attr::has()->INT()->UNSIGNED()->AUTO_INCREMENT()->PRIMARY_KEY()->NEXT(),
            'firstname'=>'FIRSTNAME ' . attr::has()->VARCHAR(150)->NOT_NULL()->NEXT(),
            'middlename'=>'MIDDLENAME ' . attr::has()->VARCHAR(150)->NOT_NULL()->NEXT(),
            'lastname'=>'LASTNAME ' . attr::has()->VARCHAR(150)->NOT_NULL()->NEXT(),
            'address'=>'ADDRESS ' . attr::has()->VARCHAR(150)->NOT_NULL()->NEXT(),
            'phone'=>'PHONE ' . attr::has()->VARCHAR(150)->NOT_NULL()->NEXT(),
            'email'=>'EMAIL ' . attr::has()->VARCHAR(150)->NOT_NULL()->NEXT(),
            'student_id'=>'Student_ID ' . attr::has()->VARCHAR(150)->NOT_NULL()->NEXT(),
            'password'=>'PASSWORD ' . attr::has()->VARCHAR(150)->NOT_NULL()->NEXT(),
            'syear'=>'SYEAR ' . attr::has()->VARCHAR(150)->NOT_NULL()->NEXT(),
            'course'=>'COURSE '  . attr::has()->VARCHAR(150)->NOT_NULL()->END(),
        );
        $string = "";
        foreach($studentAttr as $column)
        {
            $string = $string . $column;
        }
        return $string;
    }
}
class Alumni
{
    private $alumniColumns = array(
        'id'=>'ID',
        'firstname'=>'FIRSTNAME',
        'middlename'=>'MIDDLENAME',
        'lastname'=>'LASTNAME',
        'address'=>'ADDRESS',
        'phone'=>'PHONE',
        'year'=>'YEAR',
        'email'=>'EMAIL',
        'alumni_id'=>'Alumni_ID',
        'password'=>'PASSWORD',
    );
    public function col($varName)
    {
        return $this->alumniColumns[$varName];
    }
    public function all()
    {
        return $this->alumniColumns;
    }
    public function attributedCol()
    {
        $alumniAttr = array(
            'id'=>'ID ' . attr::has()->INT()->UNSIGNED()->AUTO_INCREMENT()->PRIMARY_KEY()->NEXT(),
            'firstname'=>'FIRSTNAME ' . attr::has()->VARCHAR(150)->NOT_NULL()->NEXT(),
            'middlename'=>'MIDDLENAME ' . attr::has()->VARCHAR(150)->NOT_NULL()->NEXT(),
            'lastname'=>'LASTNAME ' . attr::has()->VARCHAR(150)->NOT_NULL()->NEXT(),
            'address'=>'ADDRESS ' . attr::has()->VARCHAR(150)->NOT_NULL()->NEXT(),
            'phone'=>'PHONE ' . attr::has()->VARCHAR(150)->NOT_NULL()->NEXT(),
            'year'=>'YEAR ' . attr::has()->VARCHAR(150)->NOT_NULL()->NEXT(),
            'email'=>'EMAIL ' . attr::has()->VARCHAR(150)->NOT_NULL()->NEXT(),
            'alumni_id'=>'Alumni_ID ' . attr::has()->VARCHAR(150)->NOT_NULL()->NEXT(),
            'password'=>'PASSWORD '  . attr::has()->VARCHAR(150)->NOT_NULL()->END(),
        );
        $string = "";
        foreach($alumniAttr as $column)
        {
            $string = $string . $column;
        }
        return $string;
    }
}
class Records
{
    private $recordsColumns = array(
        'ID'=>'ID',
        'record'=>'RECORD',
        'date'=>'DATE',
        'status'=>'STATUS',
        '_ID'=>'_ID',
        'POS'=>'POS',
        'PICKUP'=>'PICKUP'
    );
    public function col($varName)
    {
        return $this->recordsColumns[$varName];
    }
    public function all()
    {
        return $this->recordsColumns;
    }
    public function attributedCol()
    {
        $recordsAttr = array(
            'ID'=>'ID ' . attr::has()->INT()->UNSIGNED()->AUTO_INCREMENT()->PRIMARY_KEY()->NEXT(),
            'record'=>'RECORD ' . attr::has()->VARCHAR(150)->NOT_NULL()->NEXT(),
            'date'=>'DATE ' . attr::has()->VARCHAR(150)->NOT_NULL()->NEXT(),
            'status'=>'STATUS '  . attr::has()->VARCHAR(150)->NOT_NULL()->NEXT(),
            '_ID'=>'_ID ' . attr::has()->INT()->UNSIGNED()->NOT_NULL()->NEXT(),
            'POS'=>'POS ' . attr::has()->VARCHAR(150)->NOT_NULL()->NEXT(),
            'PICKUP'=>'PICKUP ' . attr::has()->VARCHAR(150)->END()
        );
        $string = "";
        foreach($recordsAttr as $column)
        {
            $string = $string . $column;
        }
        return $string;
    }
}
?>