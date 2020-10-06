<?php

namespace public_html\application\core;

abstract class Model
{

    protected $dbDriver;
    protected $errors;
    protected $table;

    public function __construct($dbDriver, $table)
    {
        $this->dbDriver = $dbDriver;
        $this->table = $table;
    }
    public function getDbDriver()
    {
        return $this->dbDriver;
    }
    public function getTable()
    {
        return $this->table;
    }

    public function recordCount()
    {
        return $this->dbDriver->column("SELECT COUNT(id) FROM {$this->table}");
    }

    public function getAllRecord($route, $parameter, $sort)
    {
        $max = 8;
        $params = [
            'max' => $max,
            'start' => ((($route['page'] ?? 1) - 1) * $max),
        ];

        return $this->dbDriver->select("SELECT * FROM {$this->table} ORDER BY {$parameter} {$sort} LIMIT :start, :max", $params);
    }

    public function addRecord($post)
    {
        $params = [];
        $dataPost = $_POST;
        foreach ($dataPost as $key => $data) {
            if ($key === 'csrf') continue;
            $params[$key] = $data;
        }
        return $this->dbDriver->insert($this->table,$params);

    }

    public function isRecordExists($id)
    {
        $params = [
            'id' => $id,
        ];
        return $this->dbDriver->column("SELECT id FROM {$this->table} WHERE id = :id",$params);

    }

    public function isRecordExists_login($login)
    {
        $params = [
            'login' => $login,
        ];
        return $this->dbDriver->column("SELECT login FROM {$this->table} WHERE login = :login",$params);

    }

    public function getOne($id)
    {
        $params = [
            'id' => $id,
        ];
        return $this->dbDriver->select("SELECT * FROM {$this->table} WHERE id = :id", $params);
    }

    public function getOne_login($login)
    {
        $params = [
            'login' => $login,
        ];
        return $this->dbDriver->select("SELECT * FROM {$this->table} WHERE login = :login", $params, 'one');
    }

    public function recordUpdate($id)
    {
        $params = [];
        $dataPost = $_POST;
        foreach ($dataPost as $key => $data) {
            if ($key === 'csrf') continue;
            if ($key === 'id') continue;
            $params[$key] = $data;
        }
        $this->dbDriver->update($this->table,$params,
            [
                'id',
                '=',
                $id
            ]);
    }

    public function recordDelete($id)
    {
        $where = [
            'id',
            '=',
            $id
        ];
        $this->dbDriver->delete($this->table,$where);
    }


}