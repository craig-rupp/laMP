<?php 

class Router
{
	 /**
	 * Associative array of routes (routing table)
	 */
	 protected $routes = [];
	 protected $params = [];  

	 /** 
	 * Add a route to the routing table
	 * 1st $route string route (The route URL)
	 * 2nd param $params Paramerter (controller, action, etc)
	 */

	 public function add($route, $params)
	 {
	 	$this->routes[$route] = $params;
	 }

	 /* 
		*Match route to the routes in the routing table, settin $params property if route is found
		param $url is the route URL
	 */

	public function match($url)
	{
		// foreach($this->routes as $route => $params){
		// 	if($url == $route){
		// 		echo "This {$route} matches the {$url} found in {$_SERVER['QUERY_STRING']}";
		// 		$this->params = $params;
		// 		return true;
		// 	}
		// }
		// return false;
		//Match fo the fixed URL format controller/action
		$reg_exp = "/^(?P<controller>[a-z-]+)\/(?P<action>[a-z-]+)$/";

		if(preg_match($reg_exp, $url, $matches)){
			//Get name capture group values
			$params = [];
			foreach ($matches as $key => $match) {
				if(is_string($key)){
					$params[$key] = $match;
				}
			}
			$this->params = $params;
			return true;
		}
	}

	public function getParams()
	{
		return $this->params;
	}


	 public function getRoutes()
	 {
	 	return $this->routes;
	 }
}

 ?>