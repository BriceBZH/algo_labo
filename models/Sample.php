<?php

class Sample 
{

    public function __construct(public string $id, public string $type, public string $priority, public int $analysisTime, public Datetime $arrivalTime, public string $patientId) {
        $this->id = $id;
        $this->type = $type;
        $this->priority = $priority;
        $this->analysisTime = $analysisTime;
        $this->arrivalTime = $arrivalTime;
        $this->patientId = $patientId;
    }

    public static function sortSamples(array $samples) : array {
        function sortSamp($a, $b) {
            $prioritySample = ["STAT" => 3, "URGENT" => 2, "ROUTINE" => 1];
            return $prioritySample[$b->priority] <=> $prioritySample[$a->priority];
        }
        usort($samples, "sortSamp");
        return $samples;
    }
}