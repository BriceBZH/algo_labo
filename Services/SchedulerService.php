<?php

class SchedulerService
{
    public function getStartTime(DateTimeImmutable $technicianHourAvailable, ?DateTimeImmutable $equipmentHourAvailable, DateTimeImmutable $sampleArrivalTime) : DateTimeImmutable {
        return max($technicianHourAvailable, $equipmentHourAvailable, $sampleArrivalTime);
    }

    public function getEndTime(DateTimeImmutable $startAnalys, int $analysisTime) : DatetimeImmutable {
        $addTime = $analysisTime.'minutes';
        return $startAnalys->add(DateInterval::createFromDateString($addTime));
    }

    public function getStartAnalys() {

    }

}