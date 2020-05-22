<?php

namespace App\MarsTime;

use App\SpaceTime\Converter;
use App\SpaceTime\FormatterInterface;

final class MartianDateTimeFormatter implements FormatterInterface
{
    private Converter $converter;

    public function __construct(Converter $converter)
    {
        $this->converter = $converter;
    }

    public function getFormattedOutputAsJsonString(): string
    {
        $output = [
            'mars_sol_date' => $this->converter->getDate(),
            'martian_coordinated_time' => $this->converter->getTime(),
        ];

        return json_encode($output);
    }
}