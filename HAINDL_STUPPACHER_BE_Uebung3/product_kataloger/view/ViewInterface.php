<?php

interface ViewInterface
{
    /**
     * @param mixed $data
     */
    public function output($data): void;
}