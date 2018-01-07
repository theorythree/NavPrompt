# NavPrompt

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Total Downloads][ico-downloads]][link-downloads]

## Description
> A simple solution for a simple problem. This package marks HTML elements with a CSS `is-active` class based on the current URI. Although this package was originally conceived to be used on navigation, it can be used in your templates anywhere you need to mark an HTML element with the `is-active` class.

## How to Install

##### Step 1: Via Composer

``` bash
$ composer require theorythree/navprompt
```

##### Step 2: Define the service provider and alias in your Laravel project

This package takes advantage of the new _auto-discovery_ feature found in Laravel 5.5+. If you're using that version of Laravel, then you may skip this step.

Add NavPrompt Service Provider to `config/app.php`.
``` php
'providers' => [

  /*
   * Application Service Providers...
   */

  TheoryThree\NavPrompt\NavPromptServiceProvider::class,
];
```

Define the NavPrompt Alias to `config/app.php`.
``` php
'aliases' => [

  /*
   * Aliases
   */
  'Nav' => TheoryThree\NavPrompt\NavPromptFacade::class,
];
```

##### 3. Publish the plugin config file (Optional)

Publish the configuration file to override the package defaults. The package is setup by default to work with [Bulma][link-bulma] - which uses an active class name of `is-active`, however if your project is using **Bootstrap**, you'll want to override the default active class name to `active`. To do this, publish the config file used by this plugin and set the override for the `active_class` value to `active`.

`$ php artisan vendor:publish --tag=navprompt`
This command will generate a config file in `config/navprompt.php`.

``` php
return [

    'active_class' => 'is-active',  // change to 'active' for Bootstrap
];
```

## Usage
This package uses the alias `Nav::` to access the plugin class in your project template files. You can use any of the following methods to check your routes against:

1. routeIsNamed()     // checks URI against Laravel named route
2. routeIs()          // checks URI against full URI provided
3. routeContains()    // checks URI to see if it contains provided slug

---

#### routeIsNamed()

`String routeIsNamed( String $route )`
###### Description
> Accepts a string of the desired Laravel named route for NavPrompt to check against and returns an empty string (no match) or a string containing the name of the active class (match).

##### Example:

``` php
// Route: Route::get('/about', 'AboutController@index')->name('about');
// Current URL: http://www.mycompany.com/About

<a href="/about" class="{{ Nav::routeIsNamed('about') }}">About Us</a>
// returns 'is-active' string

```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing
All contributors welcome. If you would like to contribute to this package please feel to submit a pull request, submit an issue, or request a feature.

See our [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for more details.

## Credits

- [Dan Merfeld][link-author] - Author and Maintainer.

## Contact
Want to get in touch to discuss this package, or another one you'd like us to build? Feel free to reach out to the maintainer of this package by emailing me at [dan@theorythree.com][link-mailme], follow or @ me on Twitter [@dmerfeld][link-tweetme]. I'd really like to hear from you. Honest.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/theorythree/NavPrompt.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/theorythree/NavPrompt/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/theorythree/NavPrompt.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/theorythree/NavPrompt.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/theorythree/NavPrompt.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/theorythree/NavPrompt
[link-travis]: https://travis-ci.org/theorythree/NavPrompt
[link-scrutinizer]: https://scrutinizer-ci.com/g/theorythree/NavPrompt/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/theorythree/NavPrompt
[link-downloads]: https://packagist.org/packages/theorythree/NavPrompt
[link-author]: https://github.com/dmerfeld
[link-contributors]: ../../contributors
[link-mailme]: mailto:dan@theorythree.com
[link-tweetme]: https://twitter.com/dmerfeld
[link-bulma]: https://bulma.io
