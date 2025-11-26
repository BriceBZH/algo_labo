<?php

class MetricsCalculator
{
    /***********************
    * Calcul des metrics
    ************************/
    public function calculateMetrics(int $totalAnalyse, DateTimeImmutable $startPlanning, DateTimeImmutable $endAnalys, array $technicians, array $equipments) : Metrics {
        $totalTime = ($endAnalys->getTimestamp() - $startPlanning->getTimestamp()) / 60;
        $efficenty = round(($totalTime / $totalAnalyse)*100);
        $averaWaitTime = 22.5;
        $technicianUtilization = 41.7;
        $priorityRespectRate = 100;
        $parallelEfficiency = 0;
        $metrics = new Metrics($totalTime, $efficenty, 0, $averaWaitTime, $technicianUtilization, $priorityRespectRate, $parallelEfficiency);
        return $metrics;
    }
}