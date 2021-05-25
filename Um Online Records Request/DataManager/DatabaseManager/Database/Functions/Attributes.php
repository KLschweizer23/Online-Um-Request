<?php
namespace DataManager\DatabaseManager\Attributes;

class attr
{
    private $attrStr = "";

    public static function has()
    {
        return new self;
    }

    private function add($string)
    {
        $this->attrStr = $this->attrStr . " " . $string;
    }
//---------------DB ATTRIBUTES--------------//
    public function INT()
    {
        $this->add("INT");
        return $this;
    }
    public function VARCHAR($val)
    {
        $this->add("VARCHAR(" . $val . ")");
        return $this;
    }
    public function UNSIGNED()
    {
        $this->add("UNSIGNED");
        return $this;
    }
    public function AUTO_INCREMENT()
    {
        $this->add("AUTO_INCREMENT");
        return $this;
    }
    public function PRIMARY_KEY()
    {
        $this->add("PRIMARY KEY");
        return $this;
    }
    public function NOT_NULL()
    {
        $this->add("NOT NULL");
        return $this;
    }
    public function NEXT()
    {
        $this->add(",");
        return $this->attrStr;
    }
    public function END()
    {
        return $this->attrStr;
    }
}
?>