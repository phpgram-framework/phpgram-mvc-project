<?php
/**
 * phpgram mvc
 *
 * This File is part of the phpgram mvc framework
 *
 * Web: https://gitlab.com/grammm/php-gram/phpgram-mvc-project
 *
 * @license https://gitlab.com/grammm/php-gram/phpgram-mvc-projectblob/master/LICENSE
 *
 * @author Jörn Heinemann <joernheinemann@gmx.de>
 */

namespace App\Core\Factories;

use Gram\Project\Lib\Authenticate\Login;
use Gram\Project\Lib\Authenticate\LoginCookie;
use Gram\Project\Lib\Cookie\Psr7CookieInterface;
use Gram\Project\Lib\Cookie\Psr7SimpleCookie;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class LoginFactory extends Factories
{
	/** @var Login */
	private static $_instance=null;

	/**
	 * @return Login
	 */
	public static function login()
	{
		if(!isset(self::$_instance)){
			self::$_instance = new Login(SessionFactory::getSession(),UserFactory::getUser());
		}

		return self::$_instance;
	}

	/**
	 * @param ServerRequestInterface $request
	 * @param ResponseInterface|null $response
	 * @param Psr7CookieInterface|null $cookie
	 * @return Login|LoginCookie
	 */
	public static function loginCookie(
		ServerRequestInterface $request,
		ResponseInterface $response=null,
		Psr7CookieInterface $cookie=null
	){
		if($cookie===null){
			$cookie = new Psr7SimpleCookie();
		}

		return new LoginCookie(SessionFactory::getSession(),UserFactory::getUser(),$request,$response,$cookie);
	}
}