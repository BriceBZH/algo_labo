<?php

class SampleFactory
{
    public function samples(array $samples) : array {
        $sampls = [];
        foreach($samples as $sample) {
            $sampls[] = new Sample($sample['id'], $sample['type'], $sample['priority'], $sample['analysisTime'], new Datetime($sample['arrivalTime']), $sample['patientId']);
        }
        dd($sampls);
        return $sampls;
    }
}