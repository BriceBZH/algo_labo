<?php

class EquipmentService
{
    public function equipments(array $equipments) : array {
        $equips = [];
        foreach($equipments as $equipment) {
            $name = $equipment['name'] ?? "";
             $equips[] = new Equipment($equipment['id'], $name, $equipment['type'], $equipment['available']);
        }
        return  $equips;
    }

    public function getEquipment(array $equipments, string $sampleType) : ?Equipment {
        foreach($equipments as $equipment) {
            if($equipment->type === $sampleType && $equipment->available) {
                return $equipment;
            }
        }
        return null;
    }
}