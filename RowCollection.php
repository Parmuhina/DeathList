<?php

class RowCollection
{
    private array $table;

    public function __construct(array $table)
    {
        foreach ($table as $row){
            $this->add($row);
        }
    }

    public function add (Row $row):void
    {
        $this->table[]=$row;
    }
}