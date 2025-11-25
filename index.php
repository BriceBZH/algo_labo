<?php

require_once __DIR__ . '/vendor/autoload.php';

// $metricsCalculator = new MetricsCalculator();
$equipmentService  = new EquipmentService();
$technicianService = new TechnicianService();
$sampleService     = new SampleService();

$planningService = new PlanningService(
    // $metricsCalculator,
    $technicianService,
    $equipmentService,
    $sampleService
);

$controller = new LabController($planningService);
$controller->planifyLab();