<?php

declare(strict_types = 1);

namespace App\Controller;

use App\EarthTime\UTC;
use App\MarsTime\MartianDateTimeConverter;
use App\MarsTime\MartianDateTimeFormatter;
use App\SpaceTime\ConverterFactory;
use App\SpaceTime\FormatterFactory;
use App\SpaceTime\SpaceTimeError;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
            $converterFactory = new ConverterFactory(
                new MartianDateTimeConverter(UTC::getUTC($earthtime))
            );

            $formatterFactory = new FormatterFactory(
                new MartianDateTimeFormatter($converterFactory)
            );
            
            $response = new Response(
                $formatterFactory->getFormattedOutputAsJsonString(),
                self::STATUS_CODE_OK,
                $this->responseHeader
            );
        } catch (\Exception $e) {
            $response = new Response(
                SpaceTimeError::getErrorOutputAsJsonString($e),
                self::STATUS_CODE_BAD_REQUEST,
                $this->responseHeader
            );
        }
        
        return $response;
    }

    /**
     * This is only to use in tests to check if the service is alive
     */
    public function statusCheck(Request $request): Response
    {
        return new Response("OK");
    }
}
