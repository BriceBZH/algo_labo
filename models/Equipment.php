<?php

class Equipment {

    public function __construct(public string $id, public ?string $name, public string $type, public bool $available) {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->available = $available;
    }

}