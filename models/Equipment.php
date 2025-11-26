<?php

class Equipment {

    public function __construct(public string $id, public ?string $name, public string $type, public bool $available, public ?DateTimeImmutable $availableFrom) {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->available = $available;
        $this->availableFrom = $availableFrom;
    }

    public function setAvailableFrom(DatetimeImmutable $endAnalys) {
        $this->availableFrom = $endAnalys;
    }

}