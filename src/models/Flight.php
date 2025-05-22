<?php

declare(strict_types=1);

namespace Models;

use Exception;
use DateTime;

class Flight
{
    public function __construct(
        private string $flightNumber,
        private string $origin,
        private string $destination,
        private string $departureTime,
        private string $arrivalTime,
        private string $airline
    ) {
        try {
            $this->departureTime = $this->formatDateTime($departureTime);
            $this->arrivalTime = $this->formatDateTime($arrivalTime);
        } catch (Exception $e) {
            throw new Exception("Invalid date/time format provided: " . $e->getMessage());
        }
    }

    public function __toString(): string
    {
        return "Flight " . $this->flightNumber .
            " (" . $this->airline . ") from " . $this->origin .
            " to " . $this->destination .
            " departing at " . $this->departureTime .
            " and arriving at " . $this->arrivalTime .
            ". Duration: " . $this->getDuration();
    }

    public function getFlightNumber(): string
    {
        return $this->flightNumber;
    }

    public function setFlightNumber($flightNumber): void
    {
        $this->flightNumber = $flightNumber;
    }

    public function getOrigin(): string
    {
        return $this->origin;
    }

    public function setOrigin($origin): void
    {
        $this->origin = $origin;
    }

    public function getDestination(): string
    {
        return $this->destination;
    }

    public function setDestination($destination): void
    {
        $this->destination = $destination;
    }

    public function getDepartureTime(): DateTime
    {
        return new DateTime($this->departureTime);
    }

    public function setDepartureTime($departureTime): void
    {
        try {
            $this->departureTime = $this->formatDateTime($departureTime);
        } catch (Exception $e) {
            throw new Exception("Invalid departure time format: " . $e->getMessage());
        }
    }

    public function getArrivalTime(): DateTime
    {
        return new DateTime($this->arrivalTime);
    }

    public function setArrivalTime($arrivalTime): void
    {
        try {
            $this->arrivalTime = $this->formatDateTime($arrivalTime);
        } catch (Exception $e) {
            throw new Exception("Invalid arrival time format: " . $e->getMessage());
        }
    }

    public function getAirline(): string
    {
        return $this->airline;
    }

    public function setAirline($airline): void
    {
        $this->airline = $airline;
    }

    public function getDuration(): string
    {
        $departureTime = new DateTime($this->departureTime);
        $arrivalTime = new DateTime($this->arrivalTime);

        if ($departureTime && $arrivalTime) {
            return ($departureTime->diff($arrivalTime))->format('%h hours %i minutes');
        }

        return "N/A";
    }

    private function formatDateTime(string $datetime): string
    {
        return (new DateTime($datetime))->format('Y-m-d H:i');
    }
}
