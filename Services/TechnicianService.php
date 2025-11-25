<?php

class TechnicianService
{
    public function technicians(array $technicians) : array {
        $techs = [];
        foreach($technicians as $technician) {
            $name = $technician['name'] ?? "";
            $techs[] = new Technician($technician['id'], $name, $technician['speciality'], new DateTimeImmutable($technician['startTime']), new DateTimeImmutable($technician['endTime']), new DateTimeImmutable());
        }
        return $techs;
    }

    public function getTechnician(array $technicians, Sample $sample) : ?Technician {
        $sampleType = $sample->type;
        $sampleArrivalTime = $sample->arrivalTime;
        foreach($technicians as $technician) {
            if(($technician->speciality === $sampleType || $technician->speciality === "GENERAL") && $technician->startTime <= $sampleArrivalTime && $technician->endTime > $sampleArrivalTime) {
                return $technician;
            }
        }
        return null;
    }
}