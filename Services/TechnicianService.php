<?php

class TechnicianService
{
    /***********************
    * Création des objet technicien
    ************************/
    public function technicians(array $technicians) : array {
        $techs = [];
        foreach($technicians as $technician) {
            $name = $technician['name'] ?? "";
            $jsonSpeciality = $technician['speciality'] ?? $technician['specialty'] ?? null;
            $speciality = is_array($jsonSpeciality) ? $jsonSpeciality : [$jsonSpeciality];
            $startTime = isset($technician['startTime']) ? new DateTimeImmutable($technician['startTime']) : null;
            $endTime = isset($technician['endTime']) ? new DateTimeImmutable($technician['endTime']) : null;
            $efficiency = $technician['efficiency'] ?? null;
            $techs[] = new Technician($technician['id'], $name, $speciality, $startTime, $endTime, new DateTimeImmutable(), $efficiency);
            
        }
        return $techs;
    }

    /***********************
    * Sélection d'un technicien en fonction de plusieurs critères
    ************************/
    public function getTechnician(array $technicians, Sample $sample) : ?Technician {
        $sampleType = $sample->type;
        $sampleArrivalTime = $sample->arrivalTime;
        foreach($technicians as $technician) {           
            if((in_array($sampleType, $technician->speciality) || in_array("GENERAL", $technician->speciality)) && ($technician->availableFrom === null || $technician->availableFrom <= $sampleArrivalTime) && ($technician->endTime > $sampleArrivalTime || $technician->endTime === null)) {
                return $technician;
            } else if ((in_array($sampleType, $technician->speciality) || in_array("GENERAL", $technician->speciality)) && ($technician->endTime > $sampleArrivalTime || $technician->endTime === null)) {
                return $technician;
            }
        }
        return null;
    }
}

