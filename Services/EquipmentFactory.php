<?php

class EquipmentFactory
{
    public function equipments(array $equipments) : array {
        $equips = [];
        foreach($equipments as $equipment) {
            $name = $equipment['name'] ?? "";
             $equips[] = new Equipment($equipment['id'], $name, $equipment['type'], $equipment['available']);
        }
        return  $equips;
    }
}