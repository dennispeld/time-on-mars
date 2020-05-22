<?php

namespace App\MarsTime;

use App\SpaceTime\ConverterFactory;
use App\SpaceTime\FormatterInterface;

final class MartianDateTimeFormatter implements FormatterInterface
{
    private ConverterFactory $converterFactory;

    public function __construct(ConverterFactory $converterFactory)
    {
        $this->converterFactory = $converterFactory;
    }

    public function getFormattedOutputAsJsonString(): string
    {
        $output = [
            'mars_sol_date' => $this->converterFactory->getDate(),
            'martian_coordinated_time' => $this->converterFactory->getTime(),
        ];

        return json_encode($output);
    }
}