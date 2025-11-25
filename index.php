<?php

require_once __DIR__ . '/vendor/autoload.php';

// $metricsCalculator = new MetricsCalculator();
$equipmentFactory  = new EquipmentFactory();
$technicianFactory = new TechnicianFactory();
$sampleFactory     = new SampleFactory();

$planningService = new PlanningService(
    // $metricsCalculator,
    $technicianFactory,
    $equipmentFactory,
    $sampleFactory
);

$controller = new LabController($planningService);
$controller->planifyLab();