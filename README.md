[![](https://gitlab.com/grammm/php-gram/phpgram/raw/master/docs/img/Feather_writing.svg.png)](https://gitlab.com/grammm/php-gram/phpgram-mvc-project)

# phpgram mvc project

[![Packagist Version](https://img.shields.io/packagist/v/phpgram/mvc)](https://packagist.org/packages/phpgram/mvc)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/phpgram/mvc)](https://gitlab.com/grammm/php-gram/phpgram-mvc-project/blob/master/composer.json)
[![Packagist](https://img.shields.io/packagist/l/phpgram/mvc)](https://gitlab.com/grammm/php-gram/phpgram-mvc-project/blob/master/LICENSE)


### A fast and lightweight Mvc framework 

#### Build on top of [phpgram](https://gitlab.com/grammm/php-gram/phpgram) micro framework

### Features
- Http Routing based on [nikic fastroute](https://github.com/nikic/FastRoute)
- [Psr 7](https://www.php-fig.org/psr/psr-7/) Request and Response with [Nyholm](https://github.com/Nyholm/psr7)
- [Psr 15](https://www.php-fig.org/psr/psr-15/) Middleware support
- [Psr 17](https://www.php-fig.org/psr/psr-17/) Factory with [Nyholm](https://github.com/Nyholm/psr7)
- Auto Dependency Injection with [Psr 11 Container](https://www.php-fig.org/psr/psr-11/). Container from [pimple](https://github.com/silexphp/Pimple)
- Php Template System
- Basic Login, Authentication and Usermanagement via Php Session (or Redis Session with plugin)
- Basic Psr 7 Cookies

## Installation

#### via [composer](https://getcomposer.org/)

`````bash
$ composer create-project phpgram/mvc
`````

## Initialize / Set up

1. copy file: env.config.php.dist and rename it to: env.config.php
2. complete the **Database** and **Path** information
	- for **ROOT_URL_PATH** = the relative Url Path (e.g.: `hello.de/my_folder/` -> `/my_folder` is the path)
3. done :) 

