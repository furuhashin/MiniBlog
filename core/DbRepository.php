<?php

abstract class DbRepository
{
	protected $con;

	public function __construct($con)
	{
		$this->setConnection($con);
	}

	public function setConnection($con)
	{
		$this->con = $con;//conはPDOクラスのインスタンス
	}

	public function execute($sql, $params = array())
	{
		$stmt = $this->con->prepare($sql);//PDOstatementクラスのインスタンスを返す。プレースホルダを使用し、SQLを適切にエスケープする。
		$stmt->execute($params);//pearで定義されているメソッド。準備された SQL 文を実行する.$paramsはプレースホルダに入る値を指定。

		return $stmt;
	}

	public function fetch($sql,$params = array())
	{
		return $this->execute($sql,$params)->fetch(PDO::FETCH_ASSOC);
	}

	public function fetchAll($sql,$params = array())
	{
		return $this->execute($sql,$params)->fetchAll(PDO::FETCH_ASSOC);
	} 
}



