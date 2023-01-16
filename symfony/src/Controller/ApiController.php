<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\WeatherForecastHandler;

class ApiController extends AbstractController
{
    private WeatherForecastHandler $weatherForecastService;

    public function __construct(WeatherForecastHandler $weather_service)
    {
        $this->weatherForecastService = $weather_service;
    }

    public function weatherForecastsTemps(): Response
    {
        $json_data = $this->weatherForecastService->exportTemps();
        return $this->json($json_data);
    }

    public function weatherForecastsRain(): Response
    {
        $json_data = $this->weatherForecastService->exportRain();
        return $this->json($json_data);
    }

    public function weatherForecastsFog(): Response
    {
        $json_data = $this->weatherForecastService->exportFog();
        return $this->json($json_data);
    }

    public function weatherForecastsTempsByTimestamp(String $timestamp): Response
    {
        $json_data = $this->weatherForecastService->exportTemps($timestamp);
        return $this->json($json_data);
    }

    public function weatherForecastsRainByTimestamp(String $timestamp): Response
    {
        $json_data = $this->weatherForecastService->exportRain($timestamp);
        return $this->json($json_data);
    }

    public function weatherForecastsFogByTimestamp(String $timestamp): Response
    {
        $json_data = $this->weatherForecastService->exportFog($timestamp);
        return $this->json($json_data);
    }
}
