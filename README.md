# NavPrompt

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Total Downloads][ico-downloads]][link-downloads]

## Description
> A simple solution for a simple problem. This package marks HTML elements with a CSS `is-active` class based on the current URI. Although this package was originally conceived to be used on navigation, it can be used anywhere you need to mark elements with an active class name.

## How to Install

### Step 1: Via Composer

``` bash
$ composer require theorythree/navprompt
```

### Step 2: Define the service provider and alias in your Laravel project

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

### Step 3. Publish the plugin config file (Optional)

Publish the configuration file to override the package defaults. The package is setup by default to work with [Bulma][link-bulma] - which uses an active class name of `is-active`, however if your project is using **Bootstrap**, you'll want to override the default active class name to `active`. To do this, publish the config file used by this plugin and set the override for the `active_class` value to `active`.

`$ php artisan vendor:publish --tag=navprompt`
This command will generate a config file in `config/navprompt.php`.

``` php
return [

    'active_class' => 'is-active',  // change to 'active' for Bootstrap
];
```

### Usage
This package uses the alias `Nav::` to access the plugin class in your project template files. You can use any of the following methods to check your routes against:

1. routeIsNamed()     // checks URI against Laravel named route
2. routeIs()          // checks URI against full URI provided
3. routeContains()    // checks URI to see if it contains provided slug

---

### routeIsNamed()

`String routeIsNamed( String $route, String $active=NULL )`

#### Description
> Accepts a string of the desired Laravel named route for NavPrompt to check against and returns an empty string (no match) or a string containing the name of the active class (match).

#### Parameters

###### $route
String: The Laravel route name to test against

###### $active
String | NULL (OPTIONAL): The name of the CSS class that should be returned if a URI match occurs

#### Example

``` php
// Route 1: Route::get('/about', 'AboutController@index')->name('about');
// Current URL: http://www.mycompany.com/about

<a href="/about" class="{{ Nav::routeIsNamed('about') }}">About Us</a>
// returns 'is-active' string

// result:
<a href="/about" class="is-active">About Us</a>

```

---

### routeIs()

`String routeIs( String $route, String $active=NULL )`

#### Description
> This method is designed to be used in cases when testing the full URI path is needed. For example, if you have several, similar links that you need to test.

> Accepts a string of the full URI for NavPrompt to check against and returns an empty string (no match) or a string containing the name of the active class (match). This method is designed to be used in cases where

#### Parameters

###### $route
String: The full URI route to test against

###### $active
String | NULL (OPTIONAL): The name of the CSS class that should be returned if a URI match occurs

#### Example

``` php
// Current URL: http://www.mycompany.com/about/team/dan-merfeld/

<a href="/about/team/dan" class="{{ Nav::routeIs('/about/team/dan') }}">About Dan</a>
// returns 'is-active' string

// result:
<a href="/about/team/dan" class="is-active">About Dan</a>

```

---

### routeContains()

`String routeContains( String $route, Int $position, String $active=NULL )`

#### Description
> This method is designed to be used in cases when you need to check for the existence of a specific URI slug.

> Accepts a string of the URI slug, and an optional position, for NavPrompt to check against and returns an empty string (no match) or a string containing the name of the active class (match). This method is designed to be used in cases where

#### Parameters

###### $route
String: The URI slug to test against

###### $position
Int | NULL (OPTIONAL): The position of the URI slug in relation to the full URI.

###### $active
String | NULL (OPTIONAL): The name of the CSS class that should be returned if a URI match occurs

#### Example

Basic Example:
``` php
// Current URL: http://www.mycompany.com/about/team/dan/

<a href="/about/team/dan" class="{{ Nav::routeContains('team') }}">About Dan</a>
// returns 'is-active' string

// result:
<a href="/about/team/dan" class="is-active">About Dan</a>
```
Position Example:
```
// position 1 = "about"
// position 2 = "team"
// position 3 = "dan"

<a href="/about/team/dan" class="{{ Nav::routeContains('team',1) }}">About Dan</a>
// returns '' string

// result:
<a href="/about/team/dan" class="">About Dan</a>

```

---

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
