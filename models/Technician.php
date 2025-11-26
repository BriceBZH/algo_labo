<?php

class Technician {

    public function __construct(public string $id, public ?string $name, public array $speciality, public ?DateTimeImmutable $startTime, public ?DateTimeImmutable $endTime, public ?DateTimeImmutable $availableFrom, public ?float $efficiency) {
        $this->id = $id;
        $this->name = $name;
        $this->speciality = $speciality;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
        $this->availableFrom = $startTime;
        $this->efficiency = $efficiency;
    }

    /***********************
    * Pour mettre à jour l'heure de dispo du technicien
    ************************/
    public function setAvailableFrom(DatetimeImmutable $endAnalys) {
        $this->availableFrom = $endAnalys;
    }
}