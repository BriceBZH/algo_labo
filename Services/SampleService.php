<?php

class SampleService
{
    public function samples(array $samples) : array {
        $sampls = [];
        foreach($samples as $sample) {
            $patientId = $sample['patientId'] ?? "";
            $analysisType = $sample['analysisType'] ?? "";
            $sampls[] = new Sample($sample['id'], $sample['type'], $sample['priority'], $sample['analysisTime'], new DateTimeImmutable($sample['arrivalTime']), $patientId, $analysisType);
        }

        //trie des samples
        $samples = $this->sortSamples($sampls);
        return $samples;
    }

    public function sortSamples(array $samples) : array {
        function sortSamp($a, $b) {
            $prioritySample = ["STAT" => 3, "URGENT" => 2, "ROUTINE" => 1];
            return $prioritySample[$b->priority] <=> $prioritySample[$a->priority];
        }
        usort($samples, "sortSamp");
        return $samples;
    }
}