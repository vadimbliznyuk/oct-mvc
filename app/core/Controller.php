<?php

namespace core;

abstract class Controller {
    
    protected $model;
    protected $view;
    
    public function __construct() {
	$this->view = new Views();
    }


    abstract public function action_index();
}
