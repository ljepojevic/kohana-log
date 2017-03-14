<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller_Application {

	public function action_index()
	{

      $content = View::factory('welcome');
      $this->template->content = $content;
	}

	public function action_hello()
	{

      $content = View::factory('hello');
      $this->template->content = $content;
	}

} // End Welcome
