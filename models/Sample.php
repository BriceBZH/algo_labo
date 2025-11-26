<?php

class Sample 
{

    public function __construct(public string $id, public string $type, public string $priority, public int $analysisTime, public DateTimeImmutable $arrivalTime, public ?string $patientId, public string $analysisType) {
        $this->id = $id;
        $this->type = $type;
        $this->priority = $priority;
        $this->analysisTime = $analysisTime;
        $this->arrivalTime = $arrivalTime;
        $this->patientId = $patientId;
        $this->analysisType = $analysisType;
    }

    
}