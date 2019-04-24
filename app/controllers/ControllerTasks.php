<?php

namespace controllers;

use core\Controller;
use models\ModelTasks;

class ControllerTasks extends Controller{
    
    public function __construct() {
	parent::__construct();
	$this->model = new ModelTasks();
    }
   
    public function action_index() {
	$this->view->tasks = $this->model->all();
	$this->view->render('tasks_index_view');
    }
    
    public function action_create() {
	$this->view->tasks = $this->model->all();
	$this->view->render('tasks_create_view');
    }
    
    public function action_add() {
	$data = filter_input(INPUT_POST, 'tasks');
        var_dump($data);
    }
}
