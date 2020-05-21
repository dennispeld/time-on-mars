<?php

namespace App;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class StatusCheck
{
    public function check(Request $request): Response
    {
        return new Response("OK");
    }
}