<?php

declare(strict_types = 1);

namespace App\Controller;

use App\EarthTime\UTC;
use App\MarsTime\MartianDateTimeConverter;
use App\MarsTime\MartianDateTimeFormatter;
use App\SpaceTime\Converter;
use App\SpaceTime\Formatter;
use App\SpaceTime\SpaceTimeError;
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

    private $responseHeader = ['Content-Type' => 'application/json'];

    /**
     * @Route("/convert/{earthtime}", name="spacetime_convert")
     */
    public function convert(string $earthtime = null): Response
    {
        try {
            $converter = new Converter(
                new MartianDateTimeConverter(UTC::getUTC($earthtime))
            );

            $formatter = new Formatter(
                new MartianDateTimeFormatter($converter)
            );
            
            $response = new Response(
                $formatter->getFormattedOutputAsJsonString(), 
                self::STATUS_CODE_OK, 
                $this->responseHeader
            );
        } catch(\Exception $e) {
            $response = new Response(
                SpaceTimeError::getErrorOutputAsJsonString($e),
                self::STATUS_CODE_BAD_REQUEST, 
                $this->responseHeader
            );
        }
        
        return $response;
    }
}