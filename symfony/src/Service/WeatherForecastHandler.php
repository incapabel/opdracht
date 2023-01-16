<?php

namespace App\Service;

use App\Repository\WeatherForecastRepository;

class WeatherForecastHandler
{
    public function __construct(
        private readonly WeatherForecastRepository $weatherForecastRepository
    ) {}

    public function exportTemps(string $timestamp = null): array
    {
        if($timestamp == null) {
            return $this->weatherForecastRepository->getTemps();
        }
        return $this->weatherForecastRepository->getTempsByTimestamp($timestamp);
    }

    public function exportRain(string $timestamp = null): array
    {
        if($timestamp == null) {
            return $this->weatherForecastRepository->getRain();
        }
        return $this->weatherForecastRepository->getRainByTimestamp($timestamp);
    }

    public function exportFog(string $timestamp = null): array
    {
        if($timestamp == null) {
            return $this->weatherForecastRepository->getFog();
        }
        return $this->weatherForecastRepository->getFogByTimestamp($timestamp);
    }
}
