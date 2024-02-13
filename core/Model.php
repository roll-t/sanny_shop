<?php
// modle lay du lieu tu database

abstract class Model extends Database
{
    protected $db;
    private $response;
    function __construct()
    {
        $this->db = new Database();
        $this->response = new Response();
    }

    //dinh nghia 1 bang
    // khởi tạo phương thức trù tượng
    abstract function tableFill();
    abstract function fiedFill();
    abstract function primaryKey();

    function all($table = '')
    {
        $tableName = $this->tableFill();
        $fiedSelect = $this->fiedFill();
        if (empty($fiedSelect)) {
            $fiedSelect = '*';
        }

        if (!empty($table)) {
            $sql = "SELECT $fiedSelect FROM $table";
        } else {
            $sql = "SELECT $fiedSelect FROM $tableName";
        }
        $query = $this->db->query($sql);
        if (!empty($query)) {
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    function list($table = '')
    {
        $tableName = $this->tableFill();
        $fiedSelect = $this->fiedFill();
        $primaryKey = $this->primaryKey();
        if (empty($fiedSelect)) {
            $fiedSelect = '*';
        }

        if (!empty($table)) {
            $sql = "SELECT $fiedSelect FROM $table ORDER BY $primaryKey DESC";
        } else {
            $sql = "SELECT $fiedSelect FROM $tableName ORDER BY $primaryKey DESC";
        }
        $query = $this->db->query($sql);
        if (!empty($query)) {
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    function find($id = '')
    {
        $tableName = $this->tableFill();
        $fiedSelect = $this->fiedFill();
        $primaryKey = $this->primaryKey();

        if (empty($fiedSelect)) {
            $fiedSelect = '*';
        }
        $sql = "SELECT $fiedSelect FROM $tableName WHERE $primaryKey='$id'";
        $query = $this->db->query($sql);
        if (!empty($query)) {
            return $query->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }


    function lastId()
    {
        return $this->db->lastId();
    }

    function add($value = [], $auto_route = true)
    {
        if (!empty($value)) {
            $success = $this->db->table($this->tableFill())->insert($value);
            if ($auto_route) {
                $this->return_front($success);
            }
        }
        return false;
    }

    function count()
    {
        return $this->db->table($this->tableFill())->count()->getValue();
    }


    function delete($id = 0, $auto_route = true)
    {
        $success = $this->db->table($this->tableFill())->where($this->primaryKey(), '=', $id)->delete();
        if ($auto_route) {
            $this->return_front($success);
        }
        return true;
    }

    function edit($value, $id, $auto_route = true)
    {
        $success = $this->db->table($this->tableFill())->where($this->primaryKey(), '=', $id)->update($value);
        if ($auto_route) {
            $this->return_front($success);
        }
    }

    function return_front($task, $mess_box = ['Success ', "Fail :(("], $delay = false)
    {
        $url_back = explode('/', App::$app->getUrl());
        $url_back = array_filter($url_back);
        $url_back = array_values($url_back);
        $url = '';
        for ($i = 0; $i < count($url_back) - 1; $i++) {
            $url .= '/' . $url_back[$i];
        }
        if ($task) {
            alert($mess_box[0]);
            if (!$delay) {
                $this->response->redirect($url);
            } else {
                $this->response->redirect($url, true);
            }
        } else {
            alert($mess_box[1]);
            $this->response->redirect($url);
        }
    }

    function current_redirect($url, $mess, $delay = false)
    {
        alert($mess);
        if (!$delay) {
            $this->response->redirect($url);
        } else {
            $this->response->redirect($url, true);
        }
    }
}
