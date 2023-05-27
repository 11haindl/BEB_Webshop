<?php
class jsonView implements ViewInterface
{
    /**
     * @param mixed $data
     */
    public function output($data): void
    {
        header("Content-Type: application/json");
        echo json_encode($data);
    }
}