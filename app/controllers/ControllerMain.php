<?php

namespace controllers;

use core\Controller;

class ControllerMain extends Controller {

    public function action_index() {
	echo 'Main controller action index';
    }

    public function action_create() {
	echo 'Main controller action create';
    }
}
