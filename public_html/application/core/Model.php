<?php

namespace public_html\application\core;

// use public_html\application\core\DB;
// use public_html\application\core\DBDriver;

abstract class Model
{
    private $db;
    private $dbDriver;
    private $errors;

    public function __construct()
    {
        $this->db = DB::getConnect();
        $this->dbDriver = new DBDriver($this->getDb());

    }

    public function getDb()
    {
        return $this->db;
    }

    public function getDBDriver()
    {
        return $this->dbDriver;
    }

    public function errorsRecording($error)
    {
        $this->errors = $error;
    }

    public function errorsReporting()
    {
        return $this->errors;
    }

    public function postsCount()
    {

        $this->getDBDriver()->column('SELECT COUNT(id) FROM posts');
    }

    public function getAll($route)
    {

        $max = 10;
        $params = [
            'max' => $max,
            'start' => ((($route['page'] ?? 1) - 1) * $max),
        ];
        return $this->getDBDriver()->select('SELECT * FROM users ORDER BY id DESC LIMIT :start, :max', $params);
    }

    public function Add($post)
    {
        $params = [];
        $dataPost = $_POST;
        foreach ($dataPost as $key => $data) {
            $params[$key] = $data;
        }
        return $this->getDBDriver()->insert('users',$params);

    }

    public function isRecordExists($id)
    {
        $db = DB::getConnect();
        $dbDriver = new DBDriver($db);
        $params = [
            'id' => $id,
        ];
        return $this->getDBDriver()->column('SELECT id FROM users WHERE id = :id',$params);

    }

    public function getOne($id)
    {
        $db = DB::getConnect();
        $dbDriver = new DBDriver($db);
        $params = [
            'id' => $id,
        ];
        return $this->getDBDriver()->select('SELECT * FROM users WHERE id = :id', $params);
    }

    public function recordUpdate($id)
    {
        $params = [];
        $dataPost = $_POST;
        foreach ($dataPost as $key => $data) {
            $params[$key] = $data;
        }
        $this->getDBDriver()->update('users',$params,
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
        $this->getDBDriver()->delete('users',$where);
    }


}