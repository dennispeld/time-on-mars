<?php

namespace App\SpaceTime;

interface Converter
{
    public function getDate(\DateTime $utc): string;
    public function getTime(\DateTime $utc): string;
}