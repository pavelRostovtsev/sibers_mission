<?php

namespace public_html\application\core;

// use public_html\application\core\DB;
// use public_html\application\core\DBDriver;

abstract class Model
{

    private $dbDriver;
    private $errors;
    private $table;

    public function __construct($dbDriver, $table)
    {
        $this->dbDriver = $dbDriver;
        $this->table = $table;
    }

    public function errorsRecording($error)
    {
        $this->errors = $error;
    }

    public function errorsReporting()
    {
        return $this->errors;
    }

    public function recordCount()
    {
        return $this->dbDriver->column("SELECT COUNT(id) FROM {$this->table}");
    }

    public function getAllRecord($route)
    {

        $max = 8;
        $params = [
            'max' => $max,
            'start' => ((($route['page'] ?? 1) - 1) * $max),
        ];

        return $this->dbDriver->select("SELECT * FROM {$this->table} ORDER BY id DESC LIMIT :start, :max", $params);
    }

    public function addRecord($post)
    {
        $params = [];
        $dataPost = $_POST;
        foreach ($dataPost as $key => $data) {
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

    public function getOne($id)
    {
        $params = [
            'id' => $id,
        ];
        return $this->dbDriver->select("SELECT * FROM {$this->table} WHERE id = :id", $params);
    }

    public function recordUpdate($id)
    {
        $params = [];
        $dataPost = $_POST;
        foreach ($dataPost as $key => $data) {
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