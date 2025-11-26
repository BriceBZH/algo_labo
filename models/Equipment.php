<?php

class Equipment {

    public function __construct(public string $id, public ?string $name, public string $type, public ?bool $available, public ?DateTimeImmutable $availableFrom, public ?int $capacity, public ?int $cleaningTime) {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->available = $available;
        $this->availableFrom = $availableFrom;
        $this->capacity = $capacity;
        $this->cleaningTime = $cleaningTime;
    }

    /***********************
    * Pour mettre à jour l'heure de dispo de l'équipement
    ************************/
    public function setAvailableFrom(DatetimeImmutable $endAnalys) {
        $this->availableFrom = $endAnalys;
    }

}