<?php

declare(strict_types = 1);

namespace App\Controller;

use App\EarthTime\UTC;
use App\MarsTime\MartianDateTimeConverter;
use App\SpaceTime\Converter;
use App\SpaceTime\ConverterFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/v1/spacetime")
 */
class SpaceTimeController extends AbstractController
{
    const STATUS_CODE_OK = 200;
    const STATUS_CODE_BAD_REQUEST = 400;

    /**
     * @Route("/convert/{earthtime}", name="spacetime_convert")
     */
    public function convert(string $earthtime = null): Response
    {
        try {
            $utc = new UTC();
            $factory = new ConverterFactory(new MartianDateTimeConverter(), $utc->build($earthtime));

            $data =  [
                'mars_sol_date' => $factory->getDate(),
                'martian_coordinated_time' => $factory->getTime(),
            ];
            
            $response = new Response(
                json_encode($data), 
                self::STATUS_CODE_OK, 
                ['Content-Type' => 'application/json']
            );
        } catch(\Exception $e) {
            $response = new Response(
                $e->getMessage(), 
                self::STATUS_CODE_BAD_REQUEST, 
                ['Content-Type' => 'application/json']
            );
        }
        
        return $response;
    }
}