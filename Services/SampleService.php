<?php

class SampleService
{
    /***********************
    * Création des objet sample
    ************************/
    public function samples(array $samples) : array {
        $sampls = [];
        foreach($samples as $sample) {
            $patientId = $sample['patientId'] ?? "";
            $analysisType = mb_convert_encoding($sample['analysisType'] ?? '', 'UTF-8', 'UTF-8');
            $sampls[] = new Sample($sample['id'], $sample['type'], $sample['priority'], $sample['analysisTime'], new DateTimeImmutable($sample['arrivalTime']), $patientId, $analysisType);
        }

        //trie des samples
        $samples = $this->sortSamples($sampls);
        return $samples;
    }

    /***********************
    * Trie des samples en fonction des priorités
    ************************/
    public function sortSamples(array $samples) : array {
        function sortSamp($a, $b) {
            $prioritySample = ["STAT" => 3, "URGENT" => 2, "ROUTINE" => 1];
            return $prioritySample[$b->priority] <=> $prioritySample[$a->priority];
        }
        usort($samples, "sortSamp");
        return $samples;
    }
}