<?php

class Router
{
	protected $routes;

	public function __construct($definitions)//MiniBlogApplicationクラスのregisterRoutes()の返り値が引数となる
	{
		$this->routes = $this->compileRoutes($definitions);
	}

	public function compileRoutes($definitions)//ルーティング定義配列を正規化して連想配列で動的な値を受け取れるようにするex.'/user/:user_name'→'/user/(?P<' . user_name . '>[^/]+)'
	{
		$routes = array();
		foreach ($definitions as $url => $params) {
			$tokens = explode('/', ltrim($url,'/'));
			foreach ($tokens as $i => $token) {
				if (0 === strpos($token, ':')){
					$name = substr($token, 1);
					$token = '(?P<' . $name . '>[^/]+)';
				}
				$tokens[$i] = $token;
			}
			$pattern = '/' . implode('/', $tokens);
			$routes[$pattern] = $params;
		}
		return $routes;
	}

	public function resolve($path_info)//Applicationクラスのrun()で呼び出されるex.'#^' . /user/(?P[^/]+) . '$#'
	{
		if ('/' !== substr($path_info,0,1)){
			$path_info = '/' . $path_info;
		}
		foreach ($this->routes as $pattern => $params) {
			if (preg_match('#^' . $pattern . '$#', $path_info,$matches)){
				$params = array_merge($params, $matches);
				return $params;
			}
		}
		return false;
	}
}



