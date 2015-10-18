<?php

class UserRepositry extends DbRepository
{
	public function insert($user_name, $password)
	{
		$password = $this->hashPassword($password);
		$now = new DateTime();//定義済みクラス

		$sql = "INSERT INTO user (user_name, password, created_at) VALUES(:user_name, :password, :created_at)";
		$stmt = $this->execute($sql, array(
			':user_name' => $user_name,
			':password' => $password,
			':created_at' => $now->format('Y-m-d H:i:s'),
			));
	}

	public function hashPassword($password)
	{
		return sha1($password . 'SecretKey');
	}

	public function fetchByUserName($user_name)
	{
		$sql = "SELECT * FROM user WHERE user_name = :user_name";
		return $this->fetch($sql, array(':user_name' => $user_name));
	}

	public function isUniqueUserName($user_name)
	{
		$sql = "SELECT COUNT(id) as count FROM user WHERE user_name = :user_name"

		$row = $this->fetch($sql, array(':user_name' => $user_name));
		if ($row['count'] === '0') {
			return true;
		}
		return false;
	}
}