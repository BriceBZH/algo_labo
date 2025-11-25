<?php

class PlanningService
{
    private TechnicianFactory $technicianFactory;
    private EquipmentFactory $equipmentFactory;
    private SampleFactory $sampleFactory;

    public function __construct(TechnicianFactory $technicianFactory, EquipmentFactory $equipmentFactory, SampleFactory $sampleFactory) {
        $this->technicianFactory = $technicianFactory;
        $this->equipmentFactory = $equipmentFactory;
        $this->sampleFactory = $sampleFactory;
    }

    public function generatePlanning(array $jsonDecoded) : array {
        //gestion des techniciens
        $technicians = $this->technicianFactory->technicians($jsonDecoded['technicians']);
        //gestion des equipements
        $equipments = $this->equipmentFactory->equipments($jsonDecoded['equipment']);
        //gestion des samples
        $samples = $this->sampleFactory->samples($jsonDecoded['samples']);

        // foreach ($samples as $sample) { //parcourt des samples
        //     //on récupère un technicien libre
        //     $technician = 
        //     //un equipement libre
        //     //ajout planning
        // }
        
        //ajout metrics

        //return
    }
}