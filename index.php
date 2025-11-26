<?php

require_once __DIR__ . '/vendor/autoload.php';

$metricsCalculator = new MetricsCalculator();
$equipmentService  = new EquipmentService();
$technicianService = new TechnicianService();
$sampleService     = new SampleService();
$schedulerService     = new SchedulerService();
$controlInputs     = new ControlInputs();

$planningService = new PlanningService(
    $metricsCalculator,
    $technicianService,
    $equipmentService,
    $sampleService,
    $schedulerService,
    $controlInputs
);

$controller = new LabController($planningService);
$controller->planifyLab();