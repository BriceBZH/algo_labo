<?php

class PlanningService
{
    private TechnicianService $technicianService;
    private EquipmentService $equipmentService;
    private SampleService $sampleService;

    public function __construct(TechnicianService $technicianService, EquipmentService $equipmentService, SampleService $sampleService) {
        $this->technicianService = $technicianService;
        $this->equipmentService = $equipmentService;
        $this->sampleService = $sampleService;
    }

    public function generatePlanning(array $jsonDecoded) : array {
        //gestion des techniciens
        $technicians = $this->technicianService->technicians($jsonDecoded['technicians']);
        //gestion des equipements
        $equipments = $this->equipmentService->equipments($jsonDecoded['equipment']);
        //gestion des samples
        $samples = $this->sampleService->samples($jsonDecoded['samples']);

        foreach ($samples as $sample) { //parcourt des samples
            //on récupère un technicien libre
            $technician = $this->technicianService->getTechnician($technicians, $sample);
            //maintenant un equipement
            $equipment = $this->equipmentService->getEquipment($equipments, $sample->type);
            dd($equipment);
            //un equipement libre
            //ajout planning
        }
        
        //ajout metrics

        //return
    }
}