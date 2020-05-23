<?php

declare(strict_types = 1);

namespace App\Controller;

use App\EarthTime\UTC;
use App\MarsTime\MartianDateTimeConverter;
use App\MarsTime\MartianDateTimeFormatter;
use App\SpaceTime\ConverterFactory;
use App\SpaceTime\FormatterFactory;
use App\SpaceTime\SpaceTimeError;
use Swagger\Annotations as SWG;
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
     * @Route("/convert/{earthtime}", name="spacetime_convert", methods={"GET"})
     * 
     * @SWG\Tag(name="Space Time Conversion")
     * 
     * @SWG\Get(
     *      summary="Converts UTC on Earth to Mars Sol Date and Martian Coordinated Time.",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="earthtime", 
     *          in="path", 
     *          type="string", 
     *          default="now", 
     *          description="Formats accepted: 'DD.MM.YYYY', 'DD-MM-YYYY', 'DD.MM.YYYY HH:MM:SS', UNIX timestamp, 'now'"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="OK",
     *          @SWG\Schema(
     *              type="object",
     *              properties={
     *                  @SWG\Property(property="mars_sol_date", type="string"),
     *                  @SWG\Property(property="martian_coordinated_time", type="string")
     *              }
     *          )
     *      ),
     *      @SWG\Response(
     *          response=400,
     *          description="Bad request",
     *          @SWG\Schema(
     *              type="object",
     *              properties={
     *                  @SWG\Property(property="error", type="string")
     *              }
     *          )
     *      )
     * )
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
}
