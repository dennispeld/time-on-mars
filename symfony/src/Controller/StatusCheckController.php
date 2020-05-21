<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class StatusCheckController
{
    public function check(Request $request): Response
    {
        return new Response("OK");
    }
}