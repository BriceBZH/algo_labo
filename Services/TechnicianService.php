<?php

class TechnicianService
{
    public function technicians(array $technicians) : array {
        $techs = [];
        foreach($technicians as $technician) {
            $name = $technician['name'] ?? "";
            $techs[] = new Technician($technician['id'], $name, $technician['speciality'], new DateTime($technician['startTime']), new DateTime($technician['endTime']), new DateTime());
        }
        return $techs;
    }

    public function getTechnician(array $technicians, Sample $sample) : ?Technician {
        $sampleType = $sample->type;
        $sampleArrivalTime = $sample->arrivalTime;
        foreach($technicians as $technician) {
            if(($technician->speciality === $sampleType || $technician->speciality === "GENERAL") && $technician->availableFrom <= $sampleArrivalTime && $technician->endTime > $sampleArrivalTime) {
                return $technician;
            }
        }
        return null;
    }
}