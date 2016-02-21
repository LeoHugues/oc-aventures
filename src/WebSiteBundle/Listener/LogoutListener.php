<?php

/**
 * Created by PhpStorm.
 * User: leo
 * Date: 16/02/2016
 * Time: 18:58
 */
namespace WebSiteBundle\Listener;


use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Router;
use Symfony\Component\Security\Http\Logout\LogoutSuccessHandlerInterface;

class LogoutListener implements  LogoutSuccessHandlerInterface
{
    /**
     * @var Router
     */
    protected $router;

    public function __construct($router)
    {
        $this->router = $router;
    }

    public function onLogoutSuccess(Request $request)
    {
        $response = new RedirectResponse($this->router->generate('website_index'));
        $response->setStatusCode(401);

        return $response;
    }
}