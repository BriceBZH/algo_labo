<?php

class TechnicianFactory
{
    public function technicians(array $technicians) : array {
        $techs = [];
        foreach($technicians as $technician) {
            $name = $technician['name'] ?? "";
            $techs[] = new Technician($technician['id'], $name, $technician['speciality'], new DateTime($technician['startTime']), new DateTime($technician['endTime']), new DateTime());
        }
        return $techs;
    }
}