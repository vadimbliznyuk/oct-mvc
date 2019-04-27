<?php

namespace models;

use core\Model;
use mysqli;

class ModelTasks extends Model {

    public function __construct() {
	parent::__construct();
	$this->table = 'tasks';
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
    
    public function deleteTask ($task_id){
        $query = "DELETE FROM ".$this->table." WHERE id = '$task_id';";
	$this->db->query($query);
    }

}
