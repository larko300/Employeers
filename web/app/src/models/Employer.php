<?php

namespace App\Model;

use App\Exceptions\InvalidArgumentException;
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

    public static function add($input){
        if (empty($input['fname'])) {
            throw new InvalidArgumentException('First name empty');
        }

        if (empty($input['sname'])) {
            throw new InvalidArgumentException('Surname empty');
        }

        if (empty($input['pname'])) {
            throw new InvalidArgumentException('Patronymic empty');
        }
        $employer = new Employer();
        $employer->setFname($input['fname']);
        $employer->setSname($input['sname']);
        $employer->setPname($input['pname']);
        $employer->save();
    }

    public static function edit(array $input, int $id)
    {
        if (empty($input['fname'])) {
            throw new InvalidArgumentException('First name empty');
        }

        if (empty($input['sname'])) {
            throw new InvalidArgumentException('Surname empty');
        }

        if (empty($input['pname'])) {
            throw new InvalidArgumentException('Patronymic empty');
        }
        $employer = self::getById($id);
        $employer->setFname($input['fname']);
        $employer->setSname($input['sname']);
        $employer->setPname($input['pname']);
        $employer->save();
    }

    public static function search($input){
        if (empty($input['q'])) {
            throw new InvalidArgumentException('This field is require');
        }
        return static::findAllWhereLike(['fname', 'sname', 'pname'] ,$input['q']);
    }

    protected static function getTableName(): string
    {
        return 'employeer';
    }
}