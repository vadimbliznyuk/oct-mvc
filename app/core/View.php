<?php

namespace core;

class Views {

    public function render($content_view, $template_view = 'template_main_view') {
	include_once 'app'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.$template_view.'.php';
    }

}
