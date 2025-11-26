<?php

class SchedulerService
{
    /***********************
    * Récupération de l'heure de début de la tache
    ************************/
    public function getStartTime(?DateTimeImmutable $technicianHourAvailable, ?DateTimeImmutable $equipmentHourAvailable, DateTimeImmutable $sampleArrivalTime) : DateTimeImmutable {
        return max($technicianHourAvailable, $equipmentHourAvailable, $sampleArrivalTime);
    }

    /***********************
    * Récupération de l'heure de fin de la tache
    ************************/
    public function getEndTime(DateTimeImmutable $startAnalys, ?int $analysisTime) : DatetimeImmutable {
        $addTime = $analysisTime.'minutes';
        return $startAnalys->add(DateInterval::createFromDateString($addTime));
    }

    /***********************
    * Calcul du temps d'analyse
    ************************/
    public function calculAnalys(?float $technicienEfficiency, int $analysisTime) : ?int {
        if($technicienEfficiency <> 0) {
            $timeAnalys = round($analysisTime / $technicienEfficiency);
            return $timeAnalys;
        }
        return $analysisTime;
    }

}