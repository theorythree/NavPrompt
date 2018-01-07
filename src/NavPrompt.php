<?php

namespace TheoryThree\NavPrompt;

use Illuminate\Http\Request;

class NavPrompt
{

  /**
  * The Request store.
  *
  * @var Illuminate\Http\Request
  */

  protected $request;

  /**
   * Construct a new NavPrompt instance
   *
   * @param Illuminate\Http\Request 		$request
   */

  public function __construct(Request $request) {
    $this->request = $request;
  }

  public function routeContains($route, $active = NULL) {
    $route = $this->trimURI($route); // removes starting and trailing slashes of provided URI
    $pathParts = explode('/',$this->request->path());
    return (in_array($route, $pathParts)) ? $this->active : '';
  }

  /**
 	 * Checks full URI Path
	 *
	 * @param 	string				$route
	 * @param 	string|NULL		$active
	 * @return	string
	 */

  public function routeIs($route, $active = NULL) {
		$this->setActiveClassName($active);
    $route = $this->trimURI($route);
    return ($this->request->path() == $route) ? $this->active : '';
	}

  /**
 	 * Checks passed string against Laravel named routes
	 *
	 * @param 	string				$route
	 * @param 	string|NULL		$active
	 * @return	string
	 */

	public function routeIsNamed($route, $active = NULL) {
		$this->setActiveClassName($active);
  		return ($this->request->routeIs($route)) ? $this->active : '';
	}



  /**
 	 * Active Class setter
	 * Sets the active class name to passed val OR config
   *
	 * @param 	string|NULL		$active
	 * @return	string
	 */

  private function setActiveClassName($active) {
    if ($active) {
			return $this->active = $active;
		} else {
			return $this->active = config('navprompt.active_class');
		}
  }

  /**
 	 * Trim URI String
	 * Removes starting and trailing slashes of provided URI
   *
	 * @param 	string		$uri
	 * @return	string
	 */

  private function trimURI($uri) {
    if (substr($uri, -1) == '/') { $uri = substr($uri, 0, -1); }
    if (substr($uri, 0,1) == '/') { $uri = substr($uri, 1); }
    return $uri;
  }

}
