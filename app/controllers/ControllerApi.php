<?php

namespace controllers;

use core\Controller;
use models\ModelApi;

class ControllerApi extends Controller{
    
    public function __construct() {
	parent::__construct();
	$this->model = new ModelApi();
    }
    public function action_index() {
	;
    }
    
    public function action_questions (){
	$questions = $this->model->all(); // return all question
	$json_text = json_encode($questions);
	header("Content-type: application/json;");
	echo $json_text;
    }
    
    public function action_addquestion (){
	//TODO должнв бытьвалидация входящих данных 
	$question = filter_input_array(INPUT_POST);
	$this->model->add($question);
    }
    
    public function action_deletequestion (){
	$question_id = filter_input_array(INPUT_POST);
	$this->model->delete($question_id);
    }
    
    public function action_addphoto (){
	var_dump($_FILES);
    }
}
