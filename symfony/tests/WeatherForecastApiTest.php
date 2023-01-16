<?php

namespace App\Tests;

use App\Repository\WeatherForecastRepository;
use App\Service\WeatherForecastHandler;
use PHPUnit\Framework\TestCase;

class WeatherForecastApiTest extends TestCase
{
    public function testSomething(): void
    {
        $repo = $this->createMock(WeatherForecastRepository::class);
        $repo->expects($this->any())
            ->method('getTemps')
            ->willReturn(array("timestamp"=>1,"tmin"=>29,"tmax"=>33));
        $repo->expects($this->any())
            ->method('getRain')
            ->willReturn(array("timestamp"=>1,"rain"=>29));
        $repo->expects($this->any())
            ->method('getFog')
            ->willReturn(array("timestamp"=>1,"fog"=>29));

        $weatherForecastHandler = new WeatherForecastHandler($repo);
        $temps = $weatherForecastHandler->exportTemps();
        $rain = $weatherForecastHandler->exportRain();
        $fog = $weatherForecastHandler->exportFog();

        $this->assertEquals(array("timestamp"=>1,"tmin"=>29,"tmax"=>33), $temps);
        $this->assertEquals(array("timestamp"=>1,"rain"=>29), $rain);
        $this->assertEquals(array("timestamp"=>1,"fog"=>29), $fog);
    }
}
