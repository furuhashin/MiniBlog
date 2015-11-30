<?php

class Response
{
	protected $content;
	protected $status_code = 200;
	protected $status_text = 'OK';
	protected $http_headers = array();

	public function send()
	{
		header('HTTP/1.1' . $this->status_code . ' ' . $this->status_text);
		foreach ($this->http_headers as $name => $value) {
			header($name . ':' . $value);//ex.location:/account
		}
		echo $this->content;//"$controller_class"クラスのアクション結果、viewファイルの出力結果等が格納されている
	}

	public function setContent($content)
	{
		$this->content = $content;
	}

	public function setStatusCode($status_code, $status_text ='')//Controllerクラスのredirect()で呼び出される
	{
		$this->status_code = $status_code;//send()で使う
		$this->status_text = $status_text;//send()で使う
	}

	public function setHttpHeader($name,$value)//Controllerクラスのredirect()で呼び出される
	{
		$this->http_headers[$name] = $value;//send()で使う

	}

}



