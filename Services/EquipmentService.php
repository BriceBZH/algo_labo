<?php

class EquipmentService
{
    public function equipments(array $equipments) : array {
        $equips = [];
        foreach($equipments as $equipment) {
            $name = $equipment['name'] ?? "";
            $equips[] = new Equipment($equipment['id'], $name, $equipment['type'], $equipment['available'], null);
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