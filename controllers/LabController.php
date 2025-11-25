<?php

class LabController extends AbstractController
{
    
    private PlanningService $planningService;

    public function __construct(PlanningService $planningService)
    {
        parent::__construct();
        $this->planningService = $planningService;
    }

    public function planifyLab()
    {
        $inputJson = $_POST['inputJson'] ?? null;
        $data = [
            "inputJson" => $inputJson
        ];

        if ($inputJson) {
            $decoded = json_decode($inputJson, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                $planning = $this->planningService->generatePlanning($decoded);
                $result = $planning->getPlanning();
            } else {
                $data["error"] = "JSON invalide : " . json_last_error_msg();
            }
        }
        $result = isset($result) ? $result : NULL;
        $this->render("home.html.twig", [
            "result" =>  $result
        ]);
    }
}
