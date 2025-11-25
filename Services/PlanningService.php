<?php

class PlanningService
{
    private TechnicianService $technicianService;
    private EquipmentService $equipmentService;
    private SampleService $sampleService;
    private SchedulerService $schedulerService;

    public function __construct(TechnicianService $technicianService, EquipmentService $equipmentService, SampleService $sampleService, SchedulerService $schedulerService) {
        $this->technicianService = $technicianService;
        $this->equipmentService = $equipmentService;
        $this->sampleService = $sampleService;
        $this->schedulerService = $schedulerService;
    }

    public function generatePlanning(array $jsonDecoded) : array {
        //gestion des techniciens
        $technicians = $this->technicianService->technicians($jsonDecoded['technicians']);
        //gestion des equipements
        $equipments = $this->equipmentService->equipments($jsonDecoded['equipment']);
        //gestion des samples
        $samples = $this->sampleService->samples($jsonDecoded['samples']);

        foreach ($samples as $sample) { //on list les samples
            /******** Partie technicien ********/
            //on récupère un technicien libre
            $technician = $this->technicianService->getTechnician($technicians, $sample);
            //on change l'heure de dispo du technicien
            /**********************************/

            /******** Partie equipement *******/
            //on récupère un equipement libre 
            $equipment = $this->equipmentService->getEquipment($equipments, $sample->type);
            //l'equipement passe à plus disponible
            $equipment->setAvailable(false);
            /**********************************/

            /******** Partie scheduler ********/
            //on calcul les heures de début et de fin d'analyse
            $startAnalys = $this->schedulerService->getStartTime($technician->availableFrom, $sample->arrivalTime);
            $endAnalys = $this->schedulerService->getEndTime($startAnalys, $sample->analysisTime);
            //ajout dans le scheduler
            $scheduler = new Scheduler($sample->id, $technician->id, $equipment->id, $startAnalys->format("H:i"), $endAnalys->format("H:i"), $sample->priority);
            /**********************************/

            

            dd($startAnalys);
            //ajout planning
        }
        
        //ajout metrics

        //return
    }
}