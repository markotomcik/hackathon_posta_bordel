<?php

declare(strict_types=1);

namespace App\Router;

use Nette;
use Nette\Application\IRouter;
use Nette\Application\Routers\Route;
use Nette\Application\Routers\RouteList;


final class RouterFactory
{
	use Nette\StaticClass;

	public static function createRouter(): RouteList
	{
        $router = new RouteList;
		$router[] = new Route('<action>[/<id>]', [
            'presenter' => 'Core:Mail',
            'action' => [
                Route::VALUE => 'default',
            ],
            'id' => [
                Route::PATTERN => '\d+',
            ]
		]);
    
		return $router;
	}
}
