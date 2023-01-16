<?php

namespace App\Entity;

use App\Repository\WeatherForecastRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WeatherForecastRepository::class)]
class WeatherForecast
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $tmax = null;

    #[ORM\Column]
    private ?int $tmin = null;

    #[ORM\Column]
    private ?int $rain = null;

    #[ORM\Column]
    private ?int $fog = null;

    #[ORM\Column]
    private ?int $timestamp = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTmax(): ?int
    {
        return $this->tmax;
    }

    public function setTmax(int $tmax): self
    {
        $this->tmax = $tmax;

        return $this;
    }

    public function getTmin(): ?int
    {
        return $this->tmin;
    }

    public function setTmin(int $tmin): self
    {
        $this->tmin = $tmin;

        return $this;
    }

    public function getRain(): ?int
    {
        return $this->rain;
    }

    public function setRain(int $rain): self
    {
        $this->rain = $rain;

        return $this;
    }

    public function getFog(): ?int
    {
        return $this->fog;
    }

    public function setFog(int $fog): self
    {
        $this->fog = $fog;

        return $this;
    }

    public function getTimestamp(): ?int
    {
        return $this->timestamp;
    }

    public function setTimestamp(int $timestamp): self
    {
        $this->timestamp = $timestamp;

        return $this;
    }
}
