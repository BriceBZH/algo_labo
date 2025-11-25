<?php

class PlanningService
{
    private MetricsCalculator $metricsCalculator;
    private TechnicianService $technicianService;
    private EquipmentService $equipmentService;
    private SampleService $sampleService;
    private SchedulerService $schedulerService;

    public function __construct(MetricsCalculator $metricsCalculator, TechnicianService $technicianService, EquipmentService $equipmentService, SampleService $sampleService, SchedulerService $schedulerService) {
        $this->technicianService = $technicianService;
        $this->equipmentService = $equipmentService;
        $this->sampleService = $sampleService;
        $this->schedulerService = $schedulerService;
        $this->metricsCalculator = $metricsCalculator;
    }

    public function generatePlanning(array $jsonDecoded) : array {
        //gestion des techniciens
        $technicians = $this->technicianService->technicians($jsonDecoded['technicians']);
        //gestion des equipements
        $equipments = $this->equipmentService->equipments($jsonDecoded['equipment']);
        //gestion des samples
        $samples = $this->sampleService->samples($jsonDecoded['samples']);

        $schedule = [];
        $startPlanning = "";
        $totalAnalyse = 0;
        foreach ($samples as $sample) { //on liste les samples
            /******* Selection tech & equip ***/
            //on récupère un technicien libre
            $technician = $this->technicianService->getTechnician($technicians, $sample);
            //on récupère un equipement libre 
            $equipment = $this->equipmentService->getEquipment($equipments, $sample->type);
            /**********************************/

            /*** Calcul des heures d'analyse **/
            //on calcul les heures de début et de fin d'analyse
            $startAnalys = $this->schedulerService->getStartTime($technician->availableFrom, $sample->arrivalTime);
            $endAnalys = $this->schedulerService->getEndTime($startAnalys, $sample->analysisTime);
            /**********************************/

            /****** Calcul des metrics ********/
            $totalAnalyse += $sample->analysisTime;
            /**********************************/

            /****** Mise à jour de champs *****/
            //on change l'heure de dispo du technicien
            $technician->setAvailableFrom($endAnalys);
            //l'equipement passe à plus disponible
            $equipment->setAvailable(false);
            $equipment->setAvailable(true);
            /**********************************/

            /******** Partie scheduler ********/     
            //ajout dans le scheduler
            $schedule[] = new Scheduler($sample->id, $technician->id, $equipment->id, $startAnalys->format("H:i"), $endAnalys->format("H:i"), $sample->priority);
            /**********************************/

            /******** Valeurs pour metrics ****/
            if(!$startPlanning) {
                $startPlanning = $startAnalys;
            }
            $endPlanning = $endAnalys;
            /**********************************/
        }
        $metrics = $this->metricsCalculator->calculateMetrics($totalAnalyse, $startPlanning, $endAnalys, $technicians, $equipments);
        
        return [
            "schedule" => $schedule,
            "metrics" => $metrics
        ];
    }
}