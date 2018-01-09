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
 	 * Checks a specific slug in the URI
	 *
	 * @param 	string|array		 $slugs
   * @param 	int|array		     $position
   * @param 	string|NULL		   $active
	 * @return	string
	 */

   public function routeContains($slugs, $positions = 1, $active = NULL) {
    $this->setActiveClassName($active);
    $slugs = (is_array($slugs) ? $slugs : [$slugs]);
    $positions = (is_array($positions) ? $positions : [$positions]);

    foreach ($slugs as $slug) {
       foreach ($positions as $position) {
         if ($this->request->segment($position) == $slug) return $this->active;
       }
     }
   	 return '';
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
