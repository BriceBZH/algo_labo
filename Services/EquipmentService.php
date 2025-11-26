<?php

class EquipmentService
{
    public function equipments(array $equipments) : array {
        $equips = [];
        foreach($equipments as $equipment) {
            $name = $equipment['name'] ?? "";
            $available = $equipment['available'] ?? true;
            $capacity = $equipment['capacity'] ?? null;
            $cleaningTime = $equipment['cleaningTime'] ?? null;
            $equips[] = new Equipment($equipment['id'], $name, $equipment['type'], $available, null, $capacity, $cleaningTime);
        }
        return  $equips;
    }

    public function getEquipment(array $equipments, Sample $sample) : ?Equipment {
        $sampleType = $sample->type;
        $sampleArrivalTime = $sample->arrivalTime;
        foreach($equipments as $equipment) {  
            if($equipment->type === $sampleType && $equipment->available && ($equipment->availableFrom === null || $equipment->availableFrom <= $sampleArrivalTime)) {
                return $equipment;
            } else if ($equipment->type === $sampleType && $equipment->available) {
                return $equipment;
            }
        }
        return null;
    }
}