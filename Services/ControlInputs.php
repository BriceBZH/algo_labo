<?php

class ControlInputs
{
    public function controlInputsJson(?array $technicians, ?array $equipments, ?array $samples) : bool {
        if(empty($technicians) || empty($equipments) || empty($samples)) {     
            throw new \Exception("Technicians, equipments ou samples manquants !");
        }
        return true;
    }
}