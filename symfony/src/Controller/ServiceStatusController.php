<?php

declare(strict_types = 1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ServiceStatusController extends AbstractController
{

    /**
     * This is only to use in tests to check if the service is alive
     */
    public function check(Request $request): Response
    {
        return new Response("OK");
    }
}
