<?php

class Scheduler {

    public function __construct(public string $sampleId, public string $technicianId, public string $equipmentId, public string $startTime, public string $endTime, public string $priority) {
        $this->sampleId = $sampleId;
        $this->technicianId = $technicianId;
        $this->equipmentId = $equipmentId;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
        $this->priority = $priority;
    }

}