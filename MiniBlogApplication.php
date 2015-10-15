<?php

class MiniBlogApplication extends Application
{
	protected $login_action = array('account', 'signin');

	public function getRootDir()
	{
		return dirname(__FILE__);//このファイルが格納されているパスを取得
	}

	protected function registerRoutes()
	{
		return array();
	}

	protected function configure()
	{
		$this->db_manager->connect('master', array(
			'dsn' => 'mysql:dbname=mini_blog;host=localhost',
			'user' => 'root',
			'password' => 'password',
			));
	}
}