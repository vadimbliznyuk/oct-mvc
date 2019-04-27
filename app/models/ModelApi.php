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
    
    public function add($question) {
	$query = "insert into ".$this->table." values (null, '{$question['author']}','{$question['text']}');";
	$this->db->query($query);
    }
    
    public function delete ($question_id){
	$query = "DELETE FROM ".$this->table." WHERE id = '{$question_id['id']}';";
	$this->db->query($query);
    }
}
