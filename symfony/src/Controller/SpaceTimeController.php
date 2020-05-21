<?php

namespace App\Controller;

use App\SpaceTime\Earth\UTC;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SpaceTimeController extends AbstractController
{
    /**
     * @Route("/api/spacetime/{earth}", name="spacetime_convert")
     * @param string? $earth
     * @return Response
     */
    public function convert(string $earth = null): Response
    {
        // todo: convert UTC datetime to mars sol date (MSD)
        // todo: convert UTC datetime to martian coordinated time (MCT)
        // todo: build JsonResponse using MSD and MCT

        $utc = new UTC();
        $now = $utc->convert($earth);

        $data = ["works"=>'OK', 'now'=>$now];
        
        
        $response = new Response(json_encode($data));
        $response->headers->set('Content-Type', 'application/json');
        
        return $response;
    }
}