<?php

class Metrics {
    
    public function __construct(public int $totalTime = 0, public float $efficiency = 0, public int $conflicts = 0, public float $averageWaitTime, public float $technicianUtilization, public int $priorityRespectRate, public float $parallelEfficiency) {
        $this->totalTime = $totalTime;
        $this->efficiency = $efficiency;
        $this->conflicts = $conflicts;
        $this->averageWaitTime = $averageWaitTime;
        $this->technicianUtilization = $technicianUtilization;
        $this->priorityRespectRate = $priorityRespectRate;
        $this->parallelEfficiency = $parallelEfficiency;
    }

}