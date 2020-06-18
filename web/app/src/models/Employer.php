<?php

namespace App\Model;

use App\Model\ActiveRecordEntity;
use App\Services\UsersAuthService;

class Employer extends ActiveRecordEntity
{
    protected $fname;

    protected $sname;

    protected $pname;

    public function getFname(): string
    {
        return $this->fname;
    }

    public function setFname($fname): void
    {
        $this->fname = $fname;
    }

    public function getSname(): string
    {
        return $this->sname;
    }

    public function setSname($sname): void
    {
        $this->sname = $sname;
    }

    public function getPname(): string
    {
        return $this->pname;
    }

    public function setPname($pname): void
    {
        $this->pname = $pname;
    }

    protected static function getTableName(): string
    {
        return 'employeer';
    }
}