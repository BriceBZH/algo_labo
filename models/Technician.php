<?php

class Technician {

    public function __construct(public string $id, public ?string $name, public string $speciality, public DateTimeImmutable $startTime, public DateTimeImmutable $endTime, public ?DateTimeImmutable $availableFrom) {
        $this->id = $id;
        $this->name = $name;
        $this->speciality = $speciality;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
        $this->availableFrom = $startTime;
    }

    public function setAvailableFrom(DatetimeImmutable $endAnalys) {
        $this->availableFrom = $endAnalys;
    }
}