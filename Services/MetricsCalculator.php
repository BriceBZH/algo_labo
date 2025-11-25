<?php

class MetricsCalculator
{
    public function calculateMetrics(int $totalAnalyse, DateTimeImmutable $startPlanning, DateTimeImmutable $endAnalys, array $technicians, array $equipments) : Metrics {
        $totalTime = ($endAnalys->getTimestamp() - $startPlanning->getTimestamp()) / 60;
        dump($totalAnalyse.' '.$totalTime);
        $efficenty = round(($totalTime / $totalAnalyse)*100);
        $metrics = new Metrics($totalTime, $efficenty, 0);
        return $metrics;
    }
}