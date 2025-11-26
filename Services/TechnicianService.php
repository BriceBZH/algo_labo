<?php

class TechnicianService
{
    public function technicians(array $technicians) : array {
        $techs = [];
        foreach($technicians as $technician) {
            $name = $technician['name'] ?? "";
            $jsonSpeciality = $technician['speciality'] ?? $technician['specialty'] ?? null;
            $speciality = is_array($jsonSpeciality) ? $jsonSpeciality : [$jsonSpeciality];
            $techs[] = new Technician($technician['id'], $name, $speciality, new DateTimeImmutable($technician['startTime']), new DateTimeImmutable($technician['endTime']), new DateTimeImmutable());
        }
        return $techs;
    }

    public function getTechnician(array $technicians, Sample $sample) : ?Technician {
        $sampleType = $sample->type;
        $sampleArrivalTime = $sample->arrivalTime;
        foreach($technicians as $technician) {
            if((in_array($sampleType, $technician->speciality) || in_array("GENERAL", $technician->speciality)) && $technician->availableFrom <= $sampleArrivalTime && $technician->endTime > $sampleArrivalTime) {
                return $technician;
            } else if ((in_array($sampleType, $technician->speciality) || in_array("GENERAL", $technician->speciality)) && $technician->endTime > $sampleArrivalTime) {
                return $technician;
            }   
        }
        return null;
    }
}

