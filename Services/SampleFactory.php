<?php

class SampleFactory
{
    public function samples(array $samples) : array {
        $sampls = [];
        foreach($samples as $sample) {
            $sampls[] = new Sample($sample['id'], $sample['type'], $sample['priority'], $sample['analysisTime'], new Datetime($sample['arrivalTime']), $sample['patientId']);
        }

        //trie des samples
        $samples = $this->sortSamples($sampls);
        dd($samples);
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