<?php

class Scheduler {

    public function __construct(public string $sampleId, public string $priority, public string $technicianId, public string $equipmentId, public string $startTime, public string $endTime, public int $duration, public string $analysisType, public float $efficiency) {
        $this->sampleId = $sampleId;
        $this->technicianId = $technicianId;
        $this->equipmentId = $equipmentId;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
        $this->priority = $priority;
        $this->duration = $duration;
        $this->analysisType = $analysisType;
        $this->efficiency = $efficiency;
    }

}