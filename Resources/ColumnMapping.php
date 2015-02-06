<?php namespace Resources;


class ColumnMapping {
    public $ColumnId;
    public $Value;

    function __construct($ColumnId, $Value)
    {
        $this->ColumnId = $ColumnId;
        $this->Value = $Value;
    }
}