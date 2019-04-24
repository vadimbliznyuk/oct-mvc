<?php

namespace models;

use core\Model;
use mysqli;

class ModelTasks extends Model {

    /**
     *
     * @var mysqli 
     */
    protected $db;

    public function __construct() {
        $this->db = new mysqli(DB_HOST, DB_USER, DB_PWD, DB_NAME);
    }

    public function all() {
        $query = "SELECT * FROM tasks;";
        $result = $this->db->query($query);
        if (!$result) {
            return false;
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function validateTasks($tasks) {
        if (empty($tasks)) {
            $massages = 'Задача не введена';
        } else {
            return true;
        }
        return $massages;
    }

    public function addTask($tasks) {
        $query = "INSERT INTO tasks VALUES (NULL, '" . $tasks . "')";
        $this->db->query($query);
    }

}
