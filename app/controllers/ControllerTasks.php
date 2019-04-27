<?php

namespace controllers;

use core\Controller;
use models\ModelTasks;

class ControllerTasks extends Controller {

    public function __construct() {
        parent::__construct();
        $this->model = new ModelTasks();
    }

    public function action_index() {
        $this->view->tasks = $this->model->all();
        $this->view->render('tasks_index_view');
    }

    public function action_create() {
        $this->view->render('tasks_create_view');
    }

    public function action_add() {
        $tasks = filter_input(INPUT_POST, 'tasks');
        $massege = $this->model->validateTasks($tasks);
        if ($massege === true) {
            $this->model->addTask($tasks);
            header('Location: ' . $_SERVER['HTTP_ORIGIN'] . '/tasks');
        } else {
            $this->view->error = $massege;
            $this->view->render('tasks_create_view');
        }
    }

    public function action_update() {

        $task_id = filter_input(INPUT_POST, 'id');
        $tasks = filter_input(INPUT_POST, 'tasks');

        if ($tasks === null) {
            $task = $this->model->getTask($task_id);
            $this->view->task = $task;           
        } else {
            $massege = $this->model->validateTasks($tasks);
            if ($massege === true) {
                $this->model->updateTask($task_id, $tasks);
                header('Location: ' . $_SERVER['HTTP_ORIGIN'] . '/tasks');
            } else {
                $this->view->error = $massege;
                $this->view->render('tasks_update_view');
            }
        }
        $this->view->render('tasks_update_view');
    }

    public function action_delete() {
        $task_id = filter_input(INPUT_POST, 'id');
        $this->model->deleteTask($task_id);
        header('Location: ' . $_SERVER['HTTP_ORIGIN'] . '/tasks');
    }
}
