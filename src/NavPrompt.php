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
 	 * Checks named routes
	 *
	 * @param 	string				$route
	 * @param 	string|NULL		$active
	 * @return	string
	 */

	public function routeIsNamed($route, $active = NULL) {
		$this->setActiveClass($active);
		return ($this->request->routeIs($route) ? $this->active : '');
	}

  /**
 	 * Active Class setter
	 *
	 * @param 	string|NULL		$active
	 * @return	$this
	 */

  private function setActiveClass($active) {
    if ($active) {
			return $this->active = $active;
		} else {
			return $this->active = config('navprompt.active_class');
		}
  }

}
