<?php

class jsonView
{

    public function output($employee)
    {
        header("Content-Type: application/json");
        echo json_encode($employee);
    }
}