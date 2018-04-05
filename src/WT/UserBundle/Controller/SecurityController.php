<?php
namespace WT\UserBundle\Controller;


use FOS\UserBundle\Controller\SecurityController as FOSController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;


class SecurityController extends FOSController
{
    /*public function registerAction()
    {
        $response = parent::registerAction();

        // ... do custom stuff
        return $response;
    }*/

    private $tokenManager;

    public function __construct(CsrfTokenManagerInterface $tokenManager = null)
    {
        $this->tokenManager = $tokenManager;
    }



    public function loginmenuAction(Request $request)
    {
        /** @var $session Session */
        $session = $request->getSession();

        $authErrorKey = Security::AUTHENTICATION_ERROR;
        $lastUsernameKey = Security::LAST_USERNAME;

        // get the error if any (works with forward and redirect -- see below)
        if ($request->attributes->has($authErrorKey)) {
            $error = $request->attributes->get($authErrorKey);
        } elseif (null !== $session && $session->has($authErrorKey)) {
            $error = $session->get($authErrorKey);
            $session->remove($authErrorKey);
        } else {
            $error = null;
        }

        if (!$error instanceof AuthenticationException) {
            $error = null; // The value does not come from the security component.
        }

        // last username entered by the user
        $lastUsername = (null === $session) ? '' : $session->get($lastUsernameKey);

        $csrfToken = $this->tokenManager
            ? $this->tokenManager->getToken('authenticate')->getValue()
            : null;

        return $this->renderMenuLogin(array(
            'last_username' => $lastUsername,
            'error' => $error,
            'csrf_token' => $csrfToken,
        ));
    }

    protected function renderMenuLogin(array $data)
    {
        return $this->render('@FOSUser/Security/menuLogin.html.twig', $data);
    }


/*
    public function testAction(Request $request)
    {
       $value="1234value";

        return $this->renderTest(array(
            'value' => $value,
            'nomber' =>12,
        ));
    }


    protected function rendertest(array $data)
    {
        return $this->render('WTGalerieBundle:Galerie:test.html.twig', $data);
    }
    */
}