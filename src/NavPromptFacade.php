<?php
namespace TheoryThree\NavPrompt;
/**
 *
 * @license MIT
 * @package NavPrompt
 */

use Illuminate\Support\Facades\Facade;

class NavPromptFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'navprompt';
    }
}
