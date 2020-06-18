<?php

namespace App\Model;

use App\Model\ActiveRecordEntity;

class Department extends ActiveRecordEntity
{
    protected $name;


    public function getName(): string
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    protected static function getTableName(): string
    {
        return 'department';
    }
}