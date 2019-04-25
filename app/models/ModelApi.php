<?php

namespace models;

use core\Model;

/**
 * Description of ModelApi
 *
 * @author web
 */
class ModelApi extends Model {

    public function __construct() {
	parent::__construct();
	$this->table = 'questions';
    }
}
